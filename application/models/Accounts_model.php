<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-13
 * Time: 下午9:32
 */

class Accounts_model extends CI_Model
{

    /**
     * Accounts_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getAccounts($arr=array('num'=>FALSE,'offset'=>FALSE))
    {
        //分页限制
        $limit='';
        if(isset($arr['num']) and isset($arr['offset']) and $arr['num']!==FALSE and $arr['offset']!==FALSE )
        {
            $limit=$arr['num'];
            $limit1=$arr['offset'];
        }
         $this->db->limit($limit, $limit1);

        $query=$this->db->get('my_article');
        return $query->result_array();
//        var_dump($data);
    }
}