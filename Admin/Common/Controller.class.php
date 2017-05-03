<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:22
 */
namespace Admin\Common;
class Controller{
    public static $Smarty;
    public function __construct(){
        self::$Smarty = new \Smarty();
        self::$Smarty ->setTemplateDir(ROOT_PATH.'/Admin/View/')                  //设置所有模板文件存放的目录
        ->setCompileDir(ROOT_PATH.'/Admin/View_c/')               //设置所有编译过的模板文件存放的目录
        ->setPluginsDir(ROOT_PATH.'/Library/')                    //设置为模板扩充插件存放的目录
        ->setCacheDir(ROOT_PATH.'/Admin/Cache/')                      //设置缓存文件存放的目录
        ->setConfigDir(ROOT_PATH.'/Admin/Config');                    //设置模板配置文件存放的目录
        self::$Smarty->caching = false;                                 //设置Smarty缓存开关功能
        self::$Smarty->cache_lifetime = 120;                       //设置模板缓存有效时间段的长度为1天
        self::$Smarty->left_delimiter = '<{';                               //设置模板语言中的左结束符
        self::$Smarty->right_delimiter = '}>';
        self::$Smarty->assign("APP_TITLE",APP_TITLE);   //网站标题
        if(isset($_SESSION['username'])) self::$Smarty->assign("username",$_SESSION['username']);
        $this->isMenu();
    }
    /**
     * 默认跳转操作 支持错误导向和正确跳转
     * 调用模板显示 默认为public目录下面的success页面
     * 提示页面为可配置 支持模板标签
     * @param string $message 提示信息
     * @param Boolean $status 状态
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @access private
     * @return void
     */
    private function dispatchJump($message,$status=1,$jumpUrl='',$ajax=false) {
        $waitSecond = 0;
        self::$Smarty->caching = false;     //设置Smarty缓存关闭状态
        if(is_int($ajax)){self::$Smarty->assign('waitSecond',$ajax);$waitSecond = $ajax;}
        if(!empty($jumpUrl)) self::$Smarty->assign('jumpUrl',$jumpUrl);
        // 提示标题
        self::$Smarty->assign('msgTitle',$status? '成功' : '失败');
        self::$Smarty->assign('status',$status);   // 状态
        if($status) { //发送成功信息
            self::$Smarty->assign('message',$message);// 提示信息
            // 成功操作后默认停留1秒
            if(!$waitSecond)    self::$Smarty->assign('waitSecond','1');
            // 默认操作成功自动返回操作前页面
            if(!$jumpUrl) self::$Smarty->assign("jumpUrl",$_SERVER["HTTP_REFERER"]);
            self::$Smarty->display('common/jump.tpl');
            // 中止执行  避免出错后继续执行
            exit ;
        }else{
            self::$Smarty->assign('error',$message);// 提示信息
            //发生错误时候默认停留3秒
            if(!$waitSecond)    self::$Smarty->assign('waitSecond','3');
            // 默认发生错误的话自动返回上页
            if(!$jumpUrl) self::$Smarty->assign('jumpUrl',"javascript:history.back(-1);");
            self::$Smarty->display('common/jump.tpl');
            // 中止执行  避免出错后继续执行
            exit ;
        }
    }
    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function error($message='',$jumpUrl='',$ajax=false) {
        $this->dispatchJump($message,0,$jumpUrl,$ajax);
    }

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function success($message='',$jumpUrl='',$ajax=false) {
        $this->dispatchJump($message,1,$jumpUrl,$ajax);
    }
    /*判断登陆*/
    protected function isLogin(){
        if(!isset($_SESSION['userid'])){
            C('index');exit;
        }
        $this->isRule();
    }
    /*判断权限*/
    protected function isRule(){
        if(isset($_REQUEST['c'])&&isset($_REQUEST['m'])){
            $isMenu = $this->isMenu($_REQUEST['c'],$_REQUEST['m']);
            if(!$isMenu){
                self::error('没有权限！');exit;
            }
        }
    }
    /*判断菜单*/
    protected function isMenu($c = null,$m = null){
        if(isset($_SESSION['roleid'])){
            $roleid = $_SESSION['roleid'];
            $indexModel = M('index');
            if($c && $m){
                return $indexModel->isMenu($roleid,$c,$m);
            }else{
                $rows = $indexModel->allMenu($roleid);
                $menuList = array();
                foreach ($rows as $k=>$v){
                    if($rows[$k]['parentid'] == 0){
                        $menuList[$rows[$k]['id']] = $rows[$k];
                    }else{
                        $menuList[$rows[$k]['parentid']]['child'][] = $rows[$k];
                    }
                }
                self::$Smarty->assign('menuList',$menuList);
            }
        }
    }
    /*获取菜单*/
    protected function getMenu($id){
        $indexModel = M('index');
        $row = $indexModel->getMenu($id);
        return $row;
    }
}