<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/6
 * Time: 下午 04:25
 */
namespace Admin\Config;

class DB{

    public $mysql_localhost = 'localhost';
    public $mysql_name = 'root';
    public $mysql_pwd = 'xyzko1990';

    function mysql_db($num){
        $info = array(
            'smarty'=>'smarty'
        );
        if($info[$num]){
            return $info[$num];
        }else{
            echo '数据库错误！';exit;
        }
    }
}