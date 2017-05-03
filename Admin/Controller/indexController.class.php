<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:19
 */
use Admin\Common\Controller;
class indexController extends Controller{

    public function __construct(){
        parent::__construct();
        parent::$Smarty->debugging = false;
    }
    /*后台首页*/
    public function index(){
        if(isset($_SESSION['userid'])){
            parent::$Smarty->display('common/index.tpl');
        }else{
            $token = isset($_COOKIE['token'])?$_COOKIE['token']:null;
            $adminModel = M('admin');
            if($token){
                $row = $adminModel->getToken($token);
                if($row){
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['roleid'] = $row['roleid'];
                    $_SESSION['username'] = $row['name'];
                    parent::$Smarty->display('common/index.tpl');
                }
            }
            parent::$Smarty->display('common/login.tpl');
        }
    }
}
?>