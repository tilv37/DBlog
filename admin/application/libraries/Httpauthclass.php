<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/3/28
 * Time: 20:50
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Httpauthclass {

    private $_secrect_key;
    protected $CI;

    public function __construct()
    {
        $this->_secrect_key='dsxby897301231bdasdashyr32';
        $this->CI =& get_instance();
        $this->CI->load->helper('cookie');
        $this->CI->load->library('session');
    }

    public function isUserValid($cookie)
    {
        $obj=get_cookie('erdao_content');
        if($obj)
        {
            $obj=$this->unserializeUserData($obj);
            if(is_array($obj))
            {
                if(isset($obj['logintime']) and isset($obj['username']) and isset($obj['keepalivetime']) and isset($obj['status']))
                {
                    $nowTime=time();
                    if($nowTime>($obj['logintime']+$obj['keepalivetime']))
                    {
                        return json_encode(array(
                            'msg'=>urlencode('超过登录保持时间'),
                            'flag'=> false
                        ));
                    }
                    else
                    {
                        return $this->isUserOk($obj['username'],$obj['status']);
                    }
                }
                else
                {
                    return json_encode(array(
                        'msg'=>urlencode('cookie中缺少指定信息'),
                        'flag'=> false
                    ));
                }
            }
            else
            {
                return json_encode(array(
                    'msg'=>urlencode('cookie信息格式错误'),
                    'flag'=> false
                ));
            }
        }
        else
        {
            return json_encode(array(
                'msg'=>urlencode( '未取得指定cookie信息'),
                'flag'=> false
            ));
        }
    }

    public function setLoginInfo($username)
    {
        $time=time();
        $cookieInfo=array(
            'logintime'=>$time,
            'username'=>$username,
            'keepalivetime'=>86400,
            'status'=>true
        );

        $sessionInfo=array(
            'Lastlogintime'=>$time,
            'status'=>true
        );

        //设置cookie
        $infoStr=$this->serializeUserData($cookieInfo);
        set_cookie('erdao_content',$infoStr,86400);

        //设置session
        $infoStr=$this->serializeUserData($sessionInfo);
        $this->CI->session->set_userdata($username, $infoStr);
        $this->CI->session->mark_as_temp($username, 86400);
        $this->CI->session->set_userdata('LoginUser', $username);
    }

    public function setLogoutInfo()
    {
        set_cookie('erdao_content','',0);
    }

    /**
     * 序列化用户信息，待存入cookie
     * @param $obj
     * @return string
     */
    public function serializeUserData($obj)
    {
        $info = base64_encode(serialize($obj));
        return $this->encrypt($info);
    }

    public function showdebug()
    {
        echo 'Http验证类库';
    }

    /**
     * 反序列化cookie信息，转成用户信息
     * @param $cookie
     */
    public  function unserializeUserData($cookie)
    {
        $obj =$this->decrypt($cookie);
        $obj = unserialize(base64_decode($obj));
        return $obj;
    }

    /**
     * 加密方法
     * @param string $str
     * @return string
     */
    public function encrypt($str){
        //AES, 128 ECB模式加密数据
        $screct_key = $this->_secrect_key;
        $screct_key = base64_decode($screct_key);
        $str = trim($str);
        $str = $this->addPKCS7Padding($str);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128,MCRYPT_MODE_ECB),MCRYPT_RAND);
        $encrypt_str =  mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $screct_key, $str, MCRYPT_MODE_ECB, $iv);
        return base64_encode($encrypt_str);
    }

    /**
     * 解密方法
     * @param string $str
     * @return string
     */
    public function decrypt($str){
        //AES, 128 ECB模式加密数据
        $screct_key = $this->_secrect_key;
        $str = base64_decode($str);
        $screct_key = base64_decode($screct_key);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128,MCRYPT_MODE_ECB),MCRYPT_RAND);
        $encrypt_str =  mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $screct_key, $str, MCRYPT_MODE_ECB, $iv);
        $encrypt_str = trim($encrypt_str);
        $encrypt_str = $this->stripPKSC7Padding($encrypt_str);
        return $encrypt_str;

    }

    /**
     * 填充算法
     * @param string $source
     * @return string
     */
    function addPKCS7Padding($source){
        $source = trim($source);
        $block = mcrypt_get_block_size('rijndael-128', 'ecb');
        $pad = $block - (strlen($source) % $block);
        if ($pad <= $block) {
            $char = chr($pad);
            $source .= str_repeat($char, $pad);
        }
        return $source;
    }
    /**
     * 移去填充算法
     * @param string $source
     * @return string
     */
    function stripPKSC7Padding($source){
        $block =mcrypt_get_block_size('rijndael-128', 'ecb');
        $char=substr($source,-1,1);
        $num=ord($char);
        if($num>8)
        {
            return $source;
        }
        $len=strlen($source);
        for($i=$len-1;$i>=$len-$num;$i--)
        {
            if(ord(substr($source,$i,1))!=$num)
            {
                return $source;
            }
        }
        $source=substr($source,0,-$num);
        return $source;
    }

    private function isUserOk($userName,$status)
    {
        $obj=$this->CI->session->userdata($userName);
        if($obj)
        {
            $obj=$this->unserializeUserData($obj);
            if($obj['status']==$status)
            {
                return json_encode(array(
                    'msg'=> urlencode('用户验证成功'),
                    'flag'=> true
                ));
            }
            else
            {
                return json_encode(array(
                    'msg'=> urlencode('当前用户登录已经失效'),
                    'flag'=> false
                ));
            }
        }
        else
        {
            return json_encode(array(
                'msg'=>urlencode( '服务器未查询到当前用户的登录信息'),
                'flag'=> false
            ));
        }
    }
}