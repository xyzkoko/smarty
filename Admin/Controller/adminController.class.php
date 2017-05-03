<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:19
 */
use Admin\Common\Controller;
class adminController extends Controller{

    public function __construct(){
        parent::__construct();
        parent::$Smarty->debugging = false;
        /*判断登陆&权限*/
        $m = $_REQUEST['m'];
        $array = array('login','logout');
        if(!in_array($m,$array)){
            $this->isLogin();   //判断登陆和权限
        }
    }
    /*管理员首页（列表）*/
    public function admin(){
        $adminModel = M('admin');
        $rows = $adminModel->index();
        parent::$Smarty->assign('adminList',$rows);
        /*子方法权限判断*/
        $menu = array();
        $menu['adminAdd'] = 3;
        $menu['adminUpdate'] = 8;
        $menu['adminDelete'] = 9;
        foreach($menu as $key => $value){
            $row =$this->getMenu($value);
            if($row){
                if($this->isMenu($row['c'],$row['m'])){
                    parent::$Smarty->assign($key,$row);
                }
            }
        }
        parent::$Smarty->display('admin/admin.tpl');
    }
    /*添加管理员*/
    public function adminAdd(){
        $adminModel = M('admin');
        if($_POST){     //提交
            $post = array();
            $post['name'] = $_POST['name'];
            $post['email'] = $_POST['email'];
            $post['password'] = md5($_POST['password']);
            $post['roleid'] = $_POST['roleid'];
            $post['create_dt'] = date('Y-m-d H:i:s');
            if(!$post['name'] || !$post['password'] || !isEmail($post['email']) || !$post['roleid']){
                parent::error('输入错误！');exit;
            }
            $row = $adminModel->adminAdd($post);
            if($row){
                parent::success('添加成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?c=admin&m=admin');exit;
            }else{
                parent::error('添加错误！');exit;
            }
        }else{      //显示
            $rows = $adminModel->role();
            parent::$Smarty->assign('roleList',$rows);
            parent::$Smarty->display('admin/adminAdd.tpl');
        }
    }
    /*用户组列表*/
    public function role(){
        $adminModel = M('admin');
        $rows = $adminModel->role();
        parent::$Smarty->assign('roleList',$rows);
        /*子方法权限判断*/
        $menu = array();
        $menu['roleAdd'] = 6;
        $menu['roleUpdate'] = 10;
        $menu['roleDelete'] = 11;
        foreach($menu as $key => $value){
            $row =$this->getMenu($value);
            if($row){
                if($this->isMenu($row['c'],$row['m'])){
                    parent::$Smarty->assign($key,$row);
                }
            }
        }
        parent::$Smarty->display('admin/role.tpl');
    }
    /*添加用户组*/
    public function roleAdd(){
        if($_POST){     //提交
            $post = array();
            $post['name'] = $_POST['name'];
            $post['rule'] = implode(',',$_POST['rule']);
            $post['listorder'] = 1;
            if(!$post['name']){
                parent::error('输入错误！');exit;
            }
            $adminModel = M('admin');
            $row = $adminModel->roleAdd($post);
            if($row){
                parent::success('添加成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?c=admin&m=role');exit;
            }else{
                parent::error('添加错误！');exit;
            }
        }else{      //显示
            $indexModel = M('index');
            $rows = $indexModel->allMenu(0);    /*注意：父id必须比子id小*/
            $menuAdd = array();
            foreach ($rows as $k=>$v){
                if($v['parentid'] == 0){
                    $menuAdd[$v['id']] = $v;
                }elseif(array_key_exists($v['parentid'],$menuAdd)){
                    $menuAdd[$v['parentid']]['child'][$v['id']] = $v;
                }else{
                    foreach($menuAdd as $k2=>$v2){
                        if(isset($v2['child'])){
                            if(array_key_exists($v['parentid'],$v2['child'])){
                                $menuAdd[$k2]['child'][$v['parentid']]['child'][$v['id']] = $v;
                            }
                        }
                    }
                }
            }
            parent::$Smarty->assign('menuAdd',$menuAdd);
            parent::$Smarty->display('admin/roleAdd.tpl');
        }
    }
    /*管理员登陆*/
    public function login(){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $remember = isset($_REQUEST['remember'])?$_REQUEST['remember']:0;
        if(!$email || !$password || !isEmail($email)){
            parent::error('输入错误！');exit;
        }
        $adminModel = M('admin');
        $row = $adminModel->login($email,$password);
        if($row){
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['roleid'] = $row['roleid'];
            $_SESSION['username'] = $row['name'];
            if($remember){
                setcookie('token',session_id(),time()+60*60*24*7);
            }
            parent::success('登陆成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]);exit;
        }else{
            parent::error('账号或密码错误！');exit;
        }
    }
    /*管理员退出*/
    public function logout(){
        //清楚客户端sessionid
        if(isset($_COOKIE[session_name()]))
        {
            setCookie(session_name(),'',time()-3600,'/');
        }
        session_destroy();
        setcookie("token");
        parent::success('管理员已退出！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]);exit;
    }
    /*删除管理员*/
    public function adminDelete(){
        $userid = $_REQUEST['userid'];
        $adminModel = M('admin');
        $row = $adminModel->adminDelete($userid);
        if($row){
            parent::success('删除成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?c=admin&m=admin');exit;
        }else{
            parent::error('删除失败！');exit;
        }
    }
    /*修改管理员*/
    public function adminUpdate(){
        $adminModel = M('admin');
        if($_POST) {     //提交
            $userid = $_POST['userid'];
            $token = $_POST['token'];
            $post = array();
            $post['name'] = $_POST['name'];
            $post['roleid'] = $_POST['roleid'];
            if(!$userid || !$token || !$post['name'] || !$post['roleid'] || md5($userid)!=$token){
                parent::error('输入错误！');exit;
            }
            $row = $adminModel->adminUpdate($userid,$post);
            if($row){
                parent::success('修改成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?c=admin&m=admin');exit;
            }else{
                parent::error('修改失败！');exit;
            }
        }else{      //显示
            $userid = $_REQUEST['userid'];
            $row = $adminModel->getAdmin($userid);
            parent::$Smarty->assign('user',$row);
            $rows = $adminModel->role();
            parent::$Smarty->assign('roleList',$rows);
            parent::$Smarty->display('admin/adminUpdate.tpl');
        }
    }
    /*删除用户组*/
    public function roleDelete(){
        $roleid = $_REQUEST['roleid'];
        $adminModel = M('admin');
        $row = $adminModel->roleDelete($roleid);
        if($row){
            parent::success('删除成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?c=admin&m=role');exit;
        }else{
            parent::error('删除失败！');exit;
        }
    }
    /*修改用户组*/
    public function roleUpdate(){
        $adminModel = M('admin');
        if($_POST) {     //提交
            $roleid = $_POST['roleid'];
            $token = $_POST['token'];
            $post = array();
            $post['name'] = $_POST['name'];
            $post['rule'] = implode(',',$_POST['rule']);
            if(!$roleid || !$token || !$post['name'] || !$post['rule'] || md5($roleid)!=$token){
                parent::error('输入错误！');exit;
            }
            $row = $adminModel->roleUpdate($roleid,$post);
            if($row){
                parent::success('修改成功！',$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?c=admin&m=role');exit;
            }else{
                parent::error('修改失败！');exit;
            }
        }else{      //显示
            $roleid = $_REQUEST['roleid'];
            $row = $adminModel->getRole($roleid);
            parent::$Smarty->assign('role',$row);
            $indexModel = M('index');
            $rows = $indexModel->allMenu(0);    /*注意：父id必须比子id小*/
            $menuAdd = array();
            foreach ($rows as $k=>$v){
                $v['select'] = 0;
                if(in_array($v['id'],explode(',',$row['rule']))){
                    $v['select'] = 1;
                }
                if($v['parentid'] == 0){
                    $menuAdd[$v['id']] = $v;
                }elseif(array_key_exists($v['parentid'],$menuAdd)){
                    $menuAdd[$v['parentid']]['child'][$v['id']] = $v;
                }else{
                    foreach($menuAdd as $k2=>$v2){
                        if(isset($v2['child'])){
                            if(array_key_exists($v['parentid'],$v2['child'])){
                                $menuAdd[$k2]['child'][$v['parentid']]['child'][$v['id']] = $v;
                            }
                        }
                    }
                }
            }
            parent::$Smarty->assign('menuAdd',$menuAdd);
            parent::$Smarty->display('admin/roleUpdate.tpl');
        }
    }
}
?>