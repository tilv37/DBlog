<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/13
 * Time: 14:08
 */

class Category extends MY_Controller
{

    /**
     * Catrgory constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model','category',TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Category_model','category',TRUE);
    }

    public function index($mid=FALSE)
    {
        if($mid)
        {

        }
        else
        {
            $data=array(
                'categories'=>$this->category->get_categories()
            );
            $this->load->view("category_manage",$data);
        }
    }

    //新建文章页面
    public  function create()
    {
        $this->load->view('category_add');
    }

    public function add_category()
    {
        $this->form_validation->set_rules('name', '分类名称', 'trim|required',
            array
            (
                'required' => '必须填写分类名称!'
            )
        );

        if($this->form_validation->run()===FALSE)
        {
            $this->load->view('category_add');
//            $data=$this->input->post();
//            var_dump($data);
        }
        else
        {
            //POST成功后，获取文章相关内容，进行数据库写入操作
            $data=array
            (
                'category'=>$this->input->post('name'),
                'slug'=>$this->input->post('slug'),
                'postcount'=>0,
                'description'=>$this->input->post('description'),
                'parent'=>$this->input->post('parent'),
            );

            $query=$this->category->insert_category($data);
            if($query)
            {
               echo '分类目录插入成功';
            }
        }
    }
}