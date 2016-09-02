<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2015/12/23
 * Time: 19:30
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class HelloWorld extends MY_Controller
{
    public function __construct ()
    {
        parent::__construct ();
    }

    public function  index ()
    {
        $this->load->view('helloworld'); //视图名称
    }

    public  function  demo()
    {
        echo "This is a demo!";
    }

    public  function  showtips($name,$age)
    {
        echo 'My name is'.$name.'i\'m'.$age;
    }
}