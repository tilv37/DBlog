<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/28
 * Time: 11:05
 */

class Login extends CI_Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','user',TRUE);
        $this->load->library('Operateclass');
        $this->load->library('Httpauthclass');
    }

    public function index()
    {
        if($this->check_login())
        {
            redirect('home');exit();
        }
        $this->load->library('form_validation');
        $data =$this->input->method();
        if('post'===$data)
        {
            $data1=$this->input->post();
            if(array_key_exists("inputEmail",$data1) and array_key_exists("inputPassword",$data1))
            {
                $user=$this->check_user($data1['inputEmail']);
                if($user)
                {
                    $user=$this->operateclass->object_to_array($user);
                    $isVaild=$this->check_pwd($data1['inputPassword'],$user['password']);
                    if($isVaild)
                    {
                        $this->httpauthclass->setLoginInfo($data1['inputEmail']);
			$this->session->unset_userdata('msg');
                        redirect('home');
                    }
                    else
                    {
                        $this->session->set_userdata('msg','密码错误');
                        $this->load->view('login');
                    }
                }
                else
                {
                    $this->session->set_userdata('msg','没有这个用户');
                    $this->load->view('login');
                }

            }
            else
            {
                $this->session->set_userdata('msg','不要乱抓数据，我记住你了！');
                $this->load->view('login');
            }

        }
        else
        {
            $this->session->unset_userdata('msg');
            $this->load->view('login');
        }
    }

    public function log_out()
    {
        $this->session->sess_destroy();
        $this->httpauthclass->setLogoutInfo();
//        redirect('/login');
        $this->index();
    }

    private function check_pwd($pwd,$hash_pwd)
    {
        if (password_verify($pwd,$hash_pwd))
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }

    private function check_user($user)
    {
       $userinfo=$this->user->get_user(array('name'=>$user));
        if(count($userinfo)==1 and (!is_null($userinfo)))
        {
            return $userinfo;
        }
        else
        {
            return FALSE;
        }
    }

    protected function check_login()
    {
        if($this->session->has_userdata('LogStatus') and ($this->session->LogStatus==='login') )
        {
//            echo '已经登录';
            return true; //已经登录
        }
        else
        {
//            echo '未登录';
            return false;
        }
    }


}