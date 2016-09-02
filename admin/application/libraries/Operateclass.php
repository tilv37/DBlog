<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2016/3/4
 * Time: 17:26
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Operateclass {

    public function object_to_array($obj)
    {
        $_arr = is_object($obj)? get_object_vars($obj) :$obj;
        foreach ($_arr as $key => $val){
            $val=(is_array($val)) || is_object($val) ? object_to_array($val) :$val;
            $arr[$key] = $val;
        }
        return $arr;
    }

    public function showdebug()
    {
        echo 'showdebug';
    }
}

