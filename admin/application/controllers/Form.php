<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2015/12/25
 * Time: 17:00
 */

class  Form extends MY_Controller
{
    public function index()
    {
        echo '数据库状态';
       $flag=$this->db->reconnect();
        var_dump($flag);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username','required|callback_username_check');
        $this->form_validation->set_rules('password', 'Password');
        $this->form_validation->set_rules('passconf', 'Password Confirmation');
        $this->form_validation->set_rules('email', 'Email');

        $flag=$this->form_validation->run();


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
//            $this->load->view('formsuccess');
            //$this->page_skip('准备跳转了','article/add_new_article');
        }
    }

    protected function  show_info()
    {
        echo 'showinfo';
    }

    public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}