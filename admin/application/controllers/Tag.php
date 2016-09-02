<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/13
 * Time: 19:20
 */

class Tag extends MY_Controller
{

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('tag_manage');
    }

}