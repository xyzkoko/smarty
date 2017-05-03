<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:19
 */
use Admin\Common\Model;

class adminModel extends Model{
    private static $table='admin';
    public function __construct(){
        parent::init('smarty');
    }
    /*管理员首页（列表）*/
    public  function index(){
        $sql = "SELECT a.userid,a.roleid,a.name,a.email,a.create_dt,a.update_dt,b.name AS rolename FROM ".self::$table." AS a LEFT JOIN admin_role AS b ON a.roleid = b.roleid";
        return parent::fetchAll($sql);
    }
    /*用户组（列表）*/
    public  function role(){
        $sql = "SELECT * FROM admin_role ORDER BY listorder ASC";
        return parent::fetchAll($sql);
    }
    /*用户登陆判断*/
    public function login($email,$password){
        $sql = "SELECT * FROM ".self::$table." WHERE email = '".$email."' AND password = '".md5($password)."'";
        $row = parent::fetchOne($sql);
        if($row){
            $this->updateTime($row['userid']);
            $this->updateToken($row['userid'],session_id());
        }
        return $row;
    }
    /*根据用户token获取用户信息*/
    public function getToken($token){
        $sql = "SELECT * FROM ".self::$table." WHERE token = '".$token."'";
        $row = parent::fetchOne($sql);
        if($row){
            $update_dt = strtotime($row['update_dt']);
            $days = round((time()-$update_dt)/3600/24);
            if($days<=7){
                $this->updateTime($row['userid']);
            }else{
                $row = array();
            }
        }
        return $row;
    }
    /*更新用户登陆时间*/
    public function updateTime($userid){
        $arr = array();
        $arr['update_dt'] = date('Y-m-d H:i:s');
        $where = 'userid = '.$userid;
        return parent::update(self::$table,$arr,$where);
    }
    /*更新用户token*/
    public function updateToken($userid,$token){
        $arr = array();
        $arr['token'] = $token;
        $where = 'userid = '.$userid;
        return parent::update(self::$table,$arr,$where);
    }
    /*添加管理员*/
    public function adminAdd($post){
        return parent::insert(self::$table,$post);
    }
    /*添加用户组*/
    public function roleAdd($post){
        return parent::insert('admin_role',$post);
    }
    /*删除管理员*/
    public function adminDelete($userid){
        return parent::delete(self::$table,'userid ='.$userid);
    }
    /*获取管理员*/
    public function getAdmin($userid){
        $sql = "SELECT * FROM ".self::$table." WHERE userid = '".$userid."'";
        return parent::fetchOne($sql);
    }
    /*修改管理员*/
    public function adminUpdate($userid,$post){
        return parent::update(self::$table,$post,'userid ='.$userid);
    }
    /*删除用户组*/
    public function roleDelete($roleid){
        $arr = array();
        $arr['roleid'] = 0;
        parent::update(self::$table,$arr,'roleid ='.$roleid);
        return parent::delete('admin_role','roleid ='.$roleid);
    }
    /*获取用户组*/
    public function getRole($roleid){
        $sql = "SELECT * FROM admin_role WHERE roleid = '".$roleid."'";
        return parent::fetchOne($sql);
    }
    /*修改用户组*/
    public function roleUpdate($roleid,$post){
        return parent::update('admin_role',$post,'roleid ='.$roleid);
    }
}
?>