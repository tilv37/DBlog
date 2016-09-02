<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-11
 * Time: 下午10:22
 */

class About extends  CI_Controller
{

    /**
     * About constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model','article');
    }

    public function index()
    {
       // var_dump($this->article->check_exist('about',-1,'page'));exit();
        if($this->article->check_exist('about',-1,'page'))
        {
            $page=$this->article->get_about_page();
            $data=array(
                'title'=>'关于',
                'content'=>$page[0]['content']
            );
            $this->load->view('about',$data);
        }
    }
}