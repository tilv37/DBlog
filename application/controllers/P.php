<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-11
 * Time: 下午10:25
 */

class P extends CI_Controller
{

    /**
     * P constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model','article');
        $this->load->library('pagination');
        $this->config->load('pagination', TRUE);
    }

    /**
     * @param int $page 可看做offset
     */
    public function index($page=0)
    {

        //每页显示三条数据
        $limit['num']=10;
        $limit['offset']=$page;
        $limit['type']='post';

        $config['base_url']=site_url('p');
        $config['display_pages'] = FALSE;
        $config['next_link'] = '下一页'; // 下一页显示
        $config['prev_link'] = '上一页'; // 上一页显示
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['total_rows']=$this->article->get_articles_num();//数据总条数
        $config['per_page']=$limit['num'];//每页显示条数

//        echo $this->db->last_query();
        $this->pagination->initialize($config);

        $data=array(
            'title'=>'文章列表',
            'articles'=>$this->article->get_limit_articles($limit)
        );

        if(count($data['articles'])===0)
        {
            echo '没有文章了，返回请点';
            echo anchor('p', '这里', 'title="Back2home"');
        }
        else
        {
//            var_dump($data);
            $this->load->view('blogs',$data);
        }
//        $this->load->view('page_ex',$data);
    }

    public function archive()
    {
        $id=$this->uri->segment(2);
        if(is_numeric($id))
        {
            $article=$this->article->get_one_article($id);

            if($article[0]->type=='page')
            {
                redirect('p');die();
            }

            if($article)
            {
                $data=array(
                    'title'=>$article[0]->title,
                    'posttime'=>$article[0]->posttime,
                    'author'=>$article[0]->author,
                    'content'=>$article[0]->content,
                    'cid'=>$id
                );
                $this->load->view('post',$data);
            }
            else
            {
                show_404();
            }
        }
        else
        {
            show_404();
        }
    }


    public function cate($page=0)
    {
      $metaName=$this->uri->segment(1);
      $meta=$this->get_mid_by_url($metaName);

        if(is_array($meta) and is_null($meta))
        {
            show_404();exit();
        }

        //每页显示三条数据
        $limit['num']=10;
        $limit['offset']=$page;
        $limit['mid']=$meta['mid'];

        $config['base_url']=site_url($meta['base_url']);
        $config['display_pages'] = FALSE;
        $config['next_link'] = '下一页'; // 下一页显示
        $config['prev_link'] = '上一页'; // 上一页显示
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['total_rows']=$this->article->get_articles_num_by_mid($meta['mid']);//数据总条数
        $config['per_page']=$limit['num'];//每页显示条数

        $this->pagination->initialize($config);

        $data=array(
            'title'=>$meta['title'].'随笔',
            'articles'=>$this->article->get_limit_articles_by_mid($limit)
        );

        if(count($data['articles'])===0)
        {
            echo '没有文章了，返回请点';
            echo anchor('p', '这里', 'title="Back2home"');
        }
        else
        {
//            var_dump($data);
            $this->load->view('blogs',$data);
        }
//        $this->load->view('page_ex',$data);
    }

    private function get_mid_by_url($metaName)
    {
        switch($metaName)
        {
            case 'tech':
                return array('mid'=>1,'title'=>'技术','base_url'=>'tech');
            case 'life':
                return array('mid'=>2,'title'=>'生活','base_url'=>'life');
            default:
                return array();
        }
    }

}