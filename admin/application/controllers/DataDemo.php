<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2015/12/25
 * Time: 17:34
 */

class DataDemo extends MY_Controller
{
    public  function  index()
    {
        $this->load->database();

        $query=$this->db->query('SELECT Name,Sex,Age,Class FROM my_table1');

        foreach ($query->result() as $row)
        {
            echo $row->Name;
            echo $row->Sex;
            echo $row->Age;
            echo $row->Class;
        }

        echo '<hr>';

        foreach($query->result_array() as $row )
        {
            echo $row['Name'];
            echo $row['Sex'];
            echo $row['Age'];
            echo $row['Class'];
        }
        echo '<hr>';

        echo 'Total Results: ' . $query->num_rows();
        echo '总列数：'.$query->num_fields();
    }
}