<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/1/5
 * Time: 10:40
 */

class Article_model extends  CI_Model
{
    /**
     * Article_model constructor.
     */
    public function __construct ()
    {
        parent::__construct();
    }


    /**
     * @param $data
     * @return mixed
     */
    public  function  insert_article($data)
    {
        //向my_article表中插入数据
        if($data!==null)
        {
            $this->db->insert('my_contents',$data);
            return $this->db->affected_rows();
        }
    }

    //删除文章
    public function  delete_article($id)
    {
        $tables = array('my_contents', 'my_relationships');
        $this->db->where('cid', $id[0]);
        $this->db->delete($tables);

        return $this->db->affected_rows();
    }

    //删除多个文章
    public function  delete_articles($data)
    {
        $tables = array('my_contents', 'my_relationships');
        //WHERE id IN $data
        $this->db->where_in('cid',$data);
        $this->db->delete($tables);
        return $this->db->affected_rows();
    }

    //查询文章
    public function get_article($arr=array('num' => FALSE,'offset'=> FALSE))
    {
            $this->db->order_by('my_contents.posttime','DESC');
            $this->db->select('my_contents.title,my_contents.cid,my_contents.posttime,my_contents.author,my_metas.name');
            $this->db->from('my_contents');
            $this->db->join('my_relationships', 'my_relationships.cid = my_contents.cid', 'left');
            $this->db->join('my_metas', 'my_relationships.mid = my_metas.mid', 'left');
            $this->db->where('my_contents.type','post');
            $this->db->where('my_metas.type','category');
            $this->db->limit($arr['num'],$arr['offset']);
            $query=$this->db->get();
            return $query->result_array();
    }

    public function get_one_article($cid)
    {
        $this->db->select('*');
        $this->db->from('my_contents');
        //$this->db->join('my_category', 'my_article.categoryid = my_category.cid', 'left');
        $query=$this->db->where(array('my_contents.cid'=> $cid) )->get();

        return $query->row_array();
    }

    //获取文章数量
    public function get_articles_count($type='post',$title=FALSE,$cid=FALSE)
    {
        $this->db->like('type',$type);
        if($title)
        {
            $this->db->like('title',$title);
        }
        if($cid)
        {
            $this->db->like('cid',$cid);
        }
        $this->db->from('my_contents');
       return $this->db->count_all_results();
    }

    //更新文章
    public function update_article($id=FALSE,$article)
    {
        if(is_numeric($id))
        {
            $data=array(
                'title'=>$article['title'],
                'content'=>$article['content'],
                'posttime'=>$article['posttime']
            );
            $this->db->where('cid',$id);
            $this->db->update('my_contents',$data);

            return true;
        }
        return false;
    }

    public function get_type_articles($type='post',$title=FALSE)
    {
        if($title)
        {
            $this->db->where('title',$title);
        }
        $this->db->where('type',$type);
        $this->db->from('my_contents');
        $query=$this->db->get();
        return  $query->result_array();
    }

}