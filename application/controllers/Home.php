<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-10
 * Time: 下午7:30
 */

class Home extends CI_Controller
{

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index($cat=FALSE)
    {
        if($cat)
        {

        }
        else
        {
//            echo $_SERVER['HTTP_HOST'];
//            echo '<br>';
//            echo site_url();
//            echo '<br>';
//            echo $_SERVER['SERVER_ADDR'];
//            echo '<br>';
//            echo $_SERVER['SCRIPT_NAME'];
//            echo '<br>';
//            var_dump(isset($_SERVER['SERVER_ADDR']));
//            exit();
            $this->load->view('home');
        }
    }
}