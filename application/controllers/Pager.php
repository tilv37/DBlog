<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-13
 * Time: 下午9:31
 */

class Pager extends CI_Controller
{

    /**
     * Pager constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Accounts_model');
    }

    public function index()
    {
        $config['base_url']=site_url('accounts/index');
        $config['total_rows']=100;//数据总条数
        $config['per_page']=5;//每页显示条数
        $this->pagination->initialize($config);//以上参数被 $this->pagination->initialize 方法传递
        $data['pagination']=$this->pagination->create_links();//创建分页变量给$pagination

        $arr['num']=$config['per_page'];
        $arr['offset']=1;

        $data['accounts'] = $this->Accounts_model->getAccounts($arr);//获取数据


        // Load template view
        $this->load->view('assets_template',$data);
    }
}