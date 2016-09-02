<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-2-24
 * Time: 下午9:45
 */

class Test extends CI_Controller
{
    /**
     * Article constructor.
     */
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('Article_model','article',TRUE);
        $this->load->model('Category_model','category',TRUE);
        $this->load->model('Relation_model','rela',TRUE);
        $this->load->model('User_model','user',TRUE);
        $this->load->helper(array('text','form','cookie'));
        $this->load->library('HttpAuthclass');
        $this->load->library('Operateclass');
        $this->load->helper('cookie');
    }

    public function index()
    {
        $options = array(
            'cost' => 12,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        );
        echo password_hash("sdasdad", PASSWORD_BCRYPT, $options)."\n";
        echo '<br>';
        if (password_verify('dasdas','$2y$12$9pxtNusM/EbHXqmpkJvMp.A3RCbg9bfqCoeCl7ZvWsodF1gyCpEWK')) {
            echo "密码正确";
        } else {
            echo "密码错误";
        }

        echo '<br/>';
        $obj=array(
            'username'=>'danbai',
            'logtime'=>'44444444'
        );
//        $obj111=$this->httpauthclass->serializeUserData($obj);
//        $obj222=$this->httpauthclass->unserializeUserData($obj111);
        $this->httpauthclass->setLoginInfo('dasdsad');
//        $obj333=$this->httpauthclass->isUserValid(get_cookie('erdao_content'));
//        var_dump($obj333);
//        var_dump(is_array($obj222));
//        if(isset($obj222['username']))
//        {
//            echo '该值存在';
//            var_dump(time());
//        }

    }

    public function cookie()
    {
        $data=$this->input->cookie('erdao_content');
//        $obj222=$this->httpauthclass->unserializeUserData($data);
        var_dump($data);
    }

    public function setc()
    {
        $this->input->set_cookie('aaaaaa', 'dingshuo2222', 86400);
    }

    public function getc()
    {
        var_dump(get_cookie('aaaaaa'));
    }

    public function deen()
    {
        $obj='m8Db1/OVHhljF1XsRc3qcojKXwp9g70jxQCmJqQ+JQGP9t1A6GggbYb/Tfq7cgvrAF67f1XGt+wQeaxLt0//nLq9E=';
        $obj222=$this->httpauthclass->unserializeUserData($obj);
        var_dump($obj222);
    }

    public function clearc()
    {
        delete_cookie('aaaaaa');
    }
}
