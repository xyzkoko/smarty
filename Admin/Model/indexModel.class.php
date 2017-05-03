<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:19
 */
use Admin\Common\Model;

class indexModel extends Model{
    //private static $table='admin';
    public function __construct(){
        parent::init('smarty');
    }
    /*显示所有菜单*/
    public function allMenu($roleid){
        if($roleid){
            $sql = "SELECT rule FROM admin_role WHERE roleid = '$roleid'";
            $row = parent::fetchOne($sql);
            if($row){
                $rule = $row['rule'];
                $sql = "SELECT * FROM menu WHERE display = 1 ";
                if($rule != 'all'){
                    $sql .= " AND id IN ($rule)";
                }
                $sql .= " ORDER BY parentid ASC,listorder ASC";
            }
        }else{
            $sql = "SELECT * FROM menu ORDER BY parentid ASC,listorder ASC";
        }
        return parent::fetchAll($sql);
    }
    /*判断菜单权限*/
    public function isMenu($roleid,$c,$m){
        $sql = "SELECT rule FROM admin_role WHERE roleid = '$roleid'";
        $row = parent::fetchOne($sql);
        $rule = explode(',',$row['rule']);
        $sql = "SELECT id FROM menu WHERE c = '$c' AND m = '$m'";
        $row = parent::fetchOne($sql);
        $id = $row['id'];
        if($rule[0] == 'all' || in_array($id,$rule)){
            return true;
        }
        return false;
    }
    /*获取菜单属性*/
    public function getMenu($id){
        $sql = "SELECT * FROM menu WHERE id = '$id'";
        return parent::fetchOne($sql);
    }
}
?>