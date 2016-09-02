<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-12
 * Time: 下午9:48
 */

class Article_model extends CI_Model
{

    /**
     * Article_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取全部数据
     * @return mixed
     */
    public function get_all_articles()
    {
        $this->db->from('my_article');
        $this->db->order_by('posttime', 'DESC');
        $query=$this->db->get();
        return $query->result_array();
    }

    /**
     * 获取表内数据数量
     * @return mixed
     */
    public function get_articles_num($type='post')
    {
        $this->db->where('type',$type);
        $this->db->from('my_contents');
        return $this->db->count_all_results();
    }

    /**
     * 获取表内指定分类数据数量
     * @return mixed
     */
    public function get_articles_num_by_mid($mid)
    {
        $this->db->from('my_contents');
        $this->db->join('my_relationships','my_contents.cid = my_relationships.cid');
        $this->db->where('mid',$mid);
        return $this->db->count_all_results();
    }

    /**
     * 获取有限个数的数据
     * @param array $arr
     * @return mixed
     */
    public function get_limit_articles($arr=array('num'=>FALSE,'offset'=>FALSE,'type'=>'post'))
    {
        if(isset($arr['num']) and isset($arr['offset']) and ($arr['num']!==FALSE) and ($arr['offset']!==FALSE))
        {
            $this->db->from('my_contents');
            $this->db->select('title, posttime, cid');
            $this->db->order_by('posttime', 'DESC');
            $this->db->where('type',$arr['type']);
            $this->db->limit($arr['num'],$arr['offset']);
            $query=$this->db->get();
            return $query->result_array();
        }
        else
        {
            return $this->get_all_articles();
        }
    }

    public function get_limit_articles_by_mid($arr=array('num'=>FALSE,'offset'=>FALSE,'mid'=>FALSE))
    {
        if(isset($arr['num']) and isset($arr['offset']) and ($arr['num']!==FALSE) and ($arr['offset']!==FALSE) and $arr['mid'])
        {
            $this->db->from('my_contents');
            $this->db->select('title, posttime, my_contents.cid, my_relationships.mid');
            $this->db->join('my_relationships','my_contents.cid = my_relationships.cid');
            $this->db->order_by('posttime', 'DESC');
            $this->db->where('mid',$arr['mid']);
            $this->db->limit($arr['num'],$arr['offset']);
            $query=$this->db->get();
            return $query->result_array();
        }
        else
        {
            return $this->get_all_articles();
        }
    }

    public function get_one_article($id)
    {
        $query = $this->db->where('cid', $id)
            ->get('my_contents');
        return $query->result();
    }

    public function get_about_page()
    {
        $this->db->from('my_contents');
        $this->db->where('title','about');
        $this->db->where('type','page');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function check_exist($title=FALSE,$cid=-1,$type='post')
    {
        $this->db->from('my_contents');
        if($title)
        {
            $this->db->where('title',$title);
        }
        if($cid>=0)
        {
            $this->db->where('title',$title);
        }
        $this->db->where('type',$type);
        if($this->db->count_all_results())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}