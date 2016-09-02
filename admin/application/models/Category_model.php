<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/12
 * Time: 11:09
 */

class Category_model extends CI_Model
{

    /**
     * Category_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories($mid=FALSE,$type='category')
    {
        if($mid)
        {
            $query=$this->db->get_where('my_metas',array('mid'=>$mid));
            return $query->result_array();
        }
        else
        {
            $this->db->order_by('mid');
            $this->db->from('my_metas');
            $this->db->where('type',$type);
            $query=$this->db->get();
            return $query->result_array();
        }
    }

    public function insert_category($data)
    {
        if($data!==null)
        {
            $this->db->insert('my_metas', $data);
            return $this->db->affected_rows();
        }
    }

    //查询指定文章分类
    public function get_article_category($id=FALSE)
    {
        if($id)
        {
            $this->db->select('*');
            $this->db->from('my_relationships');
            $this->db->join('my_metas', 'my_relationships.mid = my_metas.mid');
            $this->db->where('my_relationships.cid',$id);
            $this->db->where('my_metas.type','category');
            $query=$this->db->get();
            return $query->result_array();
        }
        else
        {
            $arr=array(
                'cid' => '0',
                'mid' => '0',
                'name' => '默认分类',
                'postcount' => '0',
                'type' => 'category'
            );
            return $arr;
        }
    }

    //查询指定文章标签
    public function get_article_tags()
    {

    }
}