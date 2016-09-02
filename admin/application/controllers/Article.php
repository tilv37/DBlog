<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/5
 * Time: 10:28
 */

class Article extends MY_Controller
{
    /**
     * Article constructor.
     */
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('Article_model','article',TRUE);
        $this->load->model('Category_model','category',TRUE);
        $this->load->model('Relation_model','rela',TRUE);
        $this->load->helper(array('text','form'));
        $this->load->helper('cookie');
        $this->config->load('pagination',TRUE);
    }

    //读取文章列表
    public function index($page=0)
    {
        $this->load->library('pagination');
        $per_page=$this->config->item('per_page','pagination');


        $limit=array(
            'num'=>$per_page,
            'offset'=>$page,
        );

//        var_dump($limit);
        $data=array(
            //从数据库中index=2的条目开始，取出5条
            'articles'=>$this->article->get_article($limit)
        );

        $this->config->set_item('total_rows',$this->article->get_articles_count(),'pagination');
        //$this->config->set_item('base_url',site_url().'/article/index','pagination');

        $this->pagination->initialize($this->config->item('pagination'));
        $this->load->view('article_list',$data);
    }

    //新建文章页面
    public  function create()
    {
        $data=array(
            'categories'=>$this->category->get_categories()
        );

//        var_dump($data['categories']);
        $this->load->view('article_create',$data);
    }

    //编辑文章页面
    public  function  edit_article()
    {

         $cid=$this->uri->segment(3);

        $data=array(
        //取出URL中的文章ID
         'article'=>$this->article->get_one_article($cid),
         'article_category'=>$this->category->get_article_category($cid),
         'all_category'=>$this->category->get_categories(FALSE,'category')
        );

        //将文章原本的分类关系写入cookie
        $this->input->set_cookie('mid',$data['article_category'][0]['mid'],0);
        $this->input->set_cookie('cid',$data['article_category'][0]['cid'],0);

//        var_dump($data);
        $this->load->view('article_edit',$data);
    }

    public function add_new_article()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', '文章标题', 'trim|required',
            array
            (
                'required' => '必须填写文章标题!'
            )
        );
        $this->form_validation->set_rules('contents', '文章内容', 'required',
            array
            (
                'required' => '必须填写文章内容!'
            )
        );

        if($this->form_validation->run()===FALSE)
        {
//            $this->load->view('article_create');
            $this->create();
        }
        else
        {
            //POST成功后，获取文章相关内容，进行数据库写入操作
            $data=array
            (
               'title'=>$this->input->post('title'),
                'posttime'=>$this->input->post('datetimepicker'),
                'author'=>'ErDao',
                'content'=>$this->input->post('contents'),
                'type'=>'post'
            );
            $query=$this->article->insert_article($data);
             $cid=$this->db->insert_id();
             $mid=$this->input->post('category');
            $query1=$this->rela->insert_rela($cid,$mid);


            $back=array(
                'title'=>$data['title'],
                'echo'=>'保存修改成功！',
                'cid'=> $cid
            );
            if($query and $query1)
            {
                $this->load->view('sucessful',$back);
//                $this->load->view('formsuccess');
            }
        }
    }

    public function update_article()
    {
        $data=array(
            'title'=>$this->input->post('title'),
            'content'=>$this->input->post('contents'),
            'posttime'=>$this->input->post('datetimepicker'),
            'mid'=>$this->input->post('category')
        );

        $oldrelation=array(
            'cid'=>$this->input->cookie('cid'),
            'mid'=>$this->input->cookie('mid'),
        );

        $ack=$this->article->update_article($this->uri->segment(3),$data);
        $ack1=$this->rela->update_rela($arr=array('cid'=>$this->uri->segment(3),'omid'=>$oldrelation['mid'],'mid'=>$data['mid']));

        if($ack)
        {
            $back=array(
                'title'=>$data['title'],
                'echo'=>'保存修改成功！',
                'cid'=>$oldrelation['cid']
            );
            echo '<br>';
            if($ack1)
            {
                $back['echo']='文章分类修改成功';
                echo '文章分类修改成功';
            }
            else
            {
                $back['echo']='文章文类无需修改';
                echo '文章文类无需修改';
            }

            $this->load->view('sucessful',$back);
        }
        else
        {
            echo '文章更新失败了';
        }
    }

    public function del_article()
    {
        $data=$this->input->post('ids');
        $answer=array(
            'repley'=>'Failed'
        );
        if($data)
        {
            if(count($data)===1)
            {
                $answer['repley']='1';
                echo json_encode($answer);
               $this->article->delete_article($data);
            }
            else
            {
                $answer['repley']='Multi';
                echo json_encode($answer);
                //$this->article->delete_articles($data);
            }
        }
        else
        {
            echo '删除操作传参错误';
        }
    }
}