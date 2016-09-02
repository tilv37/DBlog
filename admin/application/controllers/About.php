<?php
ini_set('date.timezone','Asia/Shanghai');
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/2/28
 * Time: 20:04
 */

class About extends MY_Controller
{

    /**
     * About constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model','article',TRUE);
        $this->load->model('Category_model','category',TRUE);
        $this->load->model('Relation_model','rela',TRUE);
        $this->load->helper(array('text','form'));
    }

    public function index()
    {
        $data=array(
            'pages'=>$this->article->get_type_articles('page','about')
        );


        if(count($data['pages']) and count($data['pages'])==1)
        {
            $this->load->view('about_list',$data);
        }
        else
        {
            $this->load->view('about_create');
        }
//
//
//        echo  '<pre>';
//        print_r($data['pages']);
//        echo  '</pre>';
//
//        echo count($data['pages']);
    }

    public function add_new_page()
    {
        //先查询数据库，如果已经存在about，则跳转到更新方法，否则执行插入方法
        $num=$this->article->get_articles_count('page','about');
        if($num)
        {
            $data=array
            (
//                    'title'=>$this->input->post('title'),
                'title'=>'about',
                'posttime'=>date('Y-m-d H:i:s'),
                'author'=>'ErDao',
                'content'=>$this->input->post('contents'),
                'type'=>'page'
            );

            $this->edit_page(false,$data);
        }
        else
        {
            $this->load->library('form_validation');

//            $this->form_validation->set_rules('title', '文章标题', 'trim|required',
//                array
//                (
//                    'required' => '必须填写文章标题!'
//                )
//            );
            $this->form_validation->set_rules('contents', '文章内容', 'required',
                array
                (
                    'required' => '必须填写文章内容!'
                )
            );

            if($this->form_validation->run()===FALSE)
            {
                echo '表单验证没有通过';
            }
            else
            {
                //POST成功后，获取文章相关内容，进行数据库写入操作
                $data=array
                (
//                    'title'=>$this->input->post('title'),
                    'title'=>'about',
                    'posttime'=>date('Y-m-d H:i:s'),
                    'author'=>'ErDao',
                    'content'=>$this->input->post('contents'),
                    'type'=>'page'
                );
                $query=$this->article->insert_article($data);

                $back=array(
                    'title'=>$data['title'],
                    'echo'=>'保存修改成功！',
                    'cid'=> $this->db->insert_id()
                );

                if($query)
                {
                    $this->load->view('sucessful',$back);
//                    $this->load->view('formsuccess');
                }
            }
        }
    }

    //编辑文章页面
    public  function  edit_page($cid=FALSE,$arr=array('title'=>'about','posttime'=>'2000-01-01 00:00:00','author'=>'ErDao','content'=>'关于','type'=>'page'))
    {
        if(!$cid)
        {
            $data=array(
                'page'=>$arr
            );
            $this->load->view('about_edit',$data);
        }
        else
        {
            $data=array(
                //取出URL中的文章ID
                'page'=>$this->article->get_type_articles('page','about'),
            );
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
            $this->load->view('about_edit',$data);
        }
    }


    public function update_page()
    {
        $limit=array(
            'id'=>$this->uri->segment(3)
        );

        $data=array(
             'title'=>$this->input->post('title'),
             'content'=>$this->input->post('contents'),
             'posttime'=>date('Y-m-d H:i:s'),
             'type'=>'page',
             'cid'=>$this->input->post('cid')
        );

        $ack=$this->article->update_article($this->uri->segment(3),$data);

        if($ack)
        {
            $back=array(
                'title'=>$data['title'],
                'echo'=>'保存修改成功！',
                'cid'=> $data['cid']
            );
            $this->load->view('sucessful',$back);
        }
        else
        {
            echo '文章更新失败了';
        }
    }
}