<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/3/20
 * Time: 17:52
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends  CI_Controller
{

    /**
     * MY_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Httpauthclass');
        if(!$this->check_login())
        {
            redirect('/login/');
        }
    }

    /**
     * 定时跳转至指定页面
     *
     * @param string $tips 提示
     * @param string $url  跳转网址
     * @param string $interval  跳转等待间隔
     */
    protected function page_skip($tips="",$url="/",$interval="3")
    {
        echo '1221';
        $data=array(
            'tips'=>$tips,
            'url'=>$url,
            'interval'=>$interval
        );
        $this->load->view('page_skiper',$data);
    }

    protected function check_login()
    {
        $cookie=get_cookie('erdao_content');
        $resultJson=json_decode($this->httpauthclass->isUserValid($cookie),true);

        if($resultJson['flag'])
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