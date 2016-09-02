<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/3/20
 * Time: 17:52
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{


    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

//        echo base_url();
        $this->load->view("home");
    }
}