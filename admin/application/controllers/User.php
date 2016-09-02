<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/5
 * Time: 17:11
 */

class User extends MY_Controller
{
    var $_pwd;
    /**
     * Amdin constructor.
     */
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('User_model','user',TRUE);
    }

    public function index()
    {
        $data=array(
            'users'=>$this->user->get_user()
        );

        if(is_null($data['users']))
        {
            //todo 这里加载新建用户的界面，虽然这种情况不一定会出现
        }
        else
        {
            $this->load->view('user_list',$data);
        }
    }

    public function edit_user()
    {
        $uid=$this->uri->segment(3);

        $usrInfo=$this->user->get_user($uid);
        if(!is_null($usrInfo))
        {
            $data=array(
                'user'=>array(
                    'uid'=>$usrInfo->uid,
                    'name'=>$usrInfo->name,
                    'mail'=>$usrInfo->mail,
                    'screenname'=>$usrInfo->screenname
                )
            );
            $this->load->view('user_edit',$data);
        }
        else
        {
            echo '什么情况';
            //todo 这里加载新建用户的界面，虽然这种情况不一定会出现
        }
    }


    public function update_user()
    {
        $uid=$this->uri->segment(3);
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('mail', 'mail', 'required',
                array
            (
                'required' => '必须填写邮箱地址!'
            )
        );
        $this->form_validation->set_rules('pwd', '密码','callback_get_pwd');
        $this->form_validation->set_rules('pwd-ack', '密码确认','callback_pwd_ack_check');

        if ($this->form_validation->run() == FALSE)
        {
            $this->edit_user();
        }
        else
        {
            $data=$this->input->post();
            $data['uid']=$uid;
            $options = array(
                'cost' => 12,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
            );
            $data['hash_pwd']=password_hash($data['pwd'], PASSWORD_BCRYPT, $options);

            $ack=$this->user->updata_user($data);
            if($ack)
            {
                echo '用户信息修改成功';
                redirect('login/log_out');
            }
            else
            {
                echo '用户信息修改失败';
            }

        }
    }

    public function get_pwd($str)
    {
        $this->_pwd=$str;
    }

    public function pwd_ack_check($str)
    {
        if($str<>$this->_pwd)
        {
            $this->form_validation->set_message('pwd_ack_check', '两次输入的密码不一致');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}