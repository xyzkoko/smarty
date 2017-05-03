<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:22
 */
namespace Admin\Common;
use Admin\Config\DB;

class Model{
    private static $mysql_localhost = '';
    private static $mysql_db = '';
    private static $mysql_name = '';
    private static $mysql_pwd = '';
    private static $mysql_conn = null;

    static function init($num){
        $DB = new DB();
        self::$mysql_localhost = $DB->mysql_localhost;
        self::$mysql_name = $DB->mysql_name;
        self::$mysql_pwd = $DB->mysql_pwd;
        self::$mysql_db = $DB->mysql_db($num);
        self::$mysql_conn = new \Mysqli(self::$mysql_localhost,self::$mysql_name,self::$mysql_pwd);
        self::$mysql_conn -> select_db(self::$mysql_db);
        self::$mysql_conn -> query("SET NAMES 'UTF8'");
        return self::$mysql_conn;
    }

    /**
     * 抛出错误
     * @param  string $error 错误信息
     * @return [type]
     */
    static function error($error){
        die('操作有误:'.$error);
    }

    /**
     * 执行sql语句
     * @param  string $sql sql
     * @return boolean
     */
    static function query($sql){
        if(!$result=self::$mysql_conn -> query($sql)){
            self::error(self::$mysql_conn -> error);
        }
        return $result;
    }

    /**
     * 添加操作
     * @param  string $table 表名
     * @param  array $arr   关联数组，传过来的数据
     * @return integer
     */
    static function insert($table,$arr){
        //insert into students(``,``,``) values('','','');
        $keysArr=array();
        $valuesArr=array();
        foreach($arr as $key => $value){
            //应该先将$value转义再写入数据库，但封装了数据检测的函数，不再重复了
            $keysArr[]='`'.$key.'`';
            $valuesArr[]="'".$value."'";
        }
        $keysStr=implode(',',$keysArr);
        $valuesStr=implode(',',$valuesArr);
        $sql="INSERT INTO ".$table."(".$keysStr.") VALUES(".$valuesStr.")";
        if(self::query($sql)){
            return self::$mysql_conn->affected_rows;
        }
    }

    /**
     * 删除记录
     * @return integer
     */
    static function delete($table,$where){
        $sql="DELETE FROM ".$table." WHERE ".$where;
        if(self::query($sql)){
            return self::$mysql_conn->affected_rows;
        }
    }

    /**
     * 更新操作
     * @param  string $table 表名
     * @param  array $arr   关联数组，传过来的数据
     * @param  string $where 条件
     * @return integer
     */
    static function update($table,$arr,$where){
        //update student set  `name`='',`age`='' where id=3;
        foreach($arr as $key => $value){
            //同理应先转义，此处不重复了
            $keys_and_valuesArr[]="`".$key."`='".$value."'";
        }
        $keys_and_values=implode(',',$keys_and_valuesArr);
        $sql="UPDATE ".$table." SET ".$keys_and_values." WHERE ".$where;
        if(self::query($sql)){
            return self::$mysql_conn->affected_rows;
        }
    }

    /**
     * 得到上一步操作影响的id
     * @return integer
     */
    static function getInsertId(){
        return self::$mysql_conn->insert_id;
    }

    /**
     * 批量删除记录
     * @param  string $table      表名
     * @param  array $arr        数组信息
     * @param  string $conditions 具体的表里面的字段
     * @return integer
     */
    static function deleteInArr($table,$arr,$conditions){
        $str="('".implode("','", $arr)."')";
        $sql="DELETE FROM ".$table." WHERE `$conditions` in $str";
        if(self::query($sql)){
            return self::$mysql_conn->affected_rows();
        }
    }

    /**
     * 获取一条记录
     * @param  string $sql sql语句
     * @return [type]
     */
    static function fetchOne($sql){
        $result=self::query($sql);
        $row=$result->fetch_assoc();
        if($row){
            return $row;
        }else{
            return null;
        }
    }

    /**
     * 获取所有记录
     * @param  string $sql sql语句
     * @return [type]
     */
    static function fetchAll($sql){
        $result=self::query($sql);
        $rows=array();
        $i=0;
        while($r = $result->fetch_array(MYSQLI_ASSOC)){
            $rows[$i]=$r;
            $i++;
        }
        if(count($rows)){
            return $rows;
        }else{
            return null;
        }
    }

    /**
     * 获取记录总数
     * @param  string $sql sql语句
     * @return [type]
     */
    static function getNum($sql){
        $result=self::query($sql);
        return mysql_num_rows($result);
    }
}