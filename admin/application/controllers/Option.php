<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/14
 * Time: 15:10
 */

class Option extends MY_Controller
{

    /**
     * Option constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('options-general');
    }
}