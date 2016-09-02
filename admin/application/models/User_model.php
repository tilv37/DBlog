<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-31
 * Time: 下午4:53
 */

class User_model extends CI_Model
{

    /**
     * User_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($uid=FALSE)
    {
        if(is_numeric($uid))
        {
            $query=$this->db->get_where('my_user',array('uid'=>$uid));
            return $query->row();
        }
        else if(is_array($uid))
        {
            $query=$this->db->get_where('my_user',(array)$uid);
            return $query->row();
        }
        else
        {
            $this->db->order_by('uid');
            $this->db->from('my_user');
            $query=$this->db->get();
            return $query->result_array();
        }
    }

    public function insert_user($data)
    {
        if($data!==null)
        {
            $this->db->insert('my_user',$data);
            return $this->db->affected_rows();
        }
    }

    public function query_user($data)
    {
        $this->db->where(array('name'=>$data['inputEmail'],'password'=>$data['inputPassword']));
        $this->db->from('my_user');
        return $this->db->count_all_results();
    }

    public function updata_user($data)
    {
        if(!is_null($data))
        {
            $data1=array(
                'mail' => $data['mail'],
                'screenname' => $data['screenname'],
                'password' => $data['hash_pwd']
            );
            $this->db->where('uid',$data['uid']);
            $this->db->update('my_user',$data1);

            return true;
        }
        return false;
    }
}