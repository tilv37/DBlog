<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/2/25
 * Time: 11:41
 */

class Relation_model extends CI_Model
{

    /**
     * Meta_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 增加关系条目
     */
    public function insert_rela($cid=FALSE,$mid=FALSE)
    {
        if($cid and $mid)
        {
            $data=array(
                'cid'=>$cid,
                'mid'=>$mid
            );
            if($this->check_exist($data)==0)
            {
                echo '关系键值对不存在，执行插入操作';
                $this->db->insert('my_relationships', $data);
                return $this->db->affected_rows();
            }
            else
            {
                echo '关系键值存在，不执行插入操作';
                return -2;
            }
        }
        else
        {
            echo '位置错误';
            return -1;
        }
    }

    /**
     * 删除指定条目
     */
    public function delete_rela()
    {

    }

    /**
     * 更新指定条目
     */
    public function update_rela($arr=array('cid'=>FALSE,'omid'=>FALSE,'mid'=>FALSE))
    {
        if($arr['omid'] and $arr['cid'] and $arr['mid'])
        {
            if($arr['omid']!=$arr['mid'])
            {
                //实际更新用的
                $data = array(
                    'cid' => $arr['cid'],
                    'mid' => $arr['mid']
                );

                //where选择用的
                $data1=array(
                    'cid' => $arr['cid'],
                    'mid' => $arr['omid']
                );
                $this->db->where($data1);
                $this->db->update('my_relationships', $data);

                return true;
            }
        }
        return false;
    }

    /**
     * 获取所有关系条目的数量
     */
    public function get_rela_num()
    {

    }

    public function check_exist($data)
    {
        if(is_array($data) and  array_key_exists('cid',$data) and array_key_exists('mid',$data))
        {
            $this->db->where($data);
            $this->db->from('my_relationships');
            return $this->db->count_all_results();
        }
        else
        {
            return 0;
        }
    }
}