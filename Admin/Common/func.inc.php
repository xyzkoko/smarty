<?php
/**
 * Created by IntelliJ IDEA.
 * User: sirius
 * Date: 2017/1/5
 * Time: 下午 03:19
 */
header('content-type:text/html; charset=utf-8');

/**
 * 控制器统一入口
 * @param string $name   控制器名
 * @param string $method 该控制器下的方法名
 */
function C($name,$method = 'index'){
    // 注册AUTOLOAD方法
    spl_autoload_register('autoload');
    $target_file=ROOT_PATH.'/Admin/Controller/'.$name.'Controller.class.php';
    if(!file_exists($target_file)){
        echo $name.'控制器文件不存在!';
        exit;
    }
    require_once($target_file);
    $target_c = $name.'Controller';
    if(!class_exists($target_c,false)){
        echo $name.'控制器不存在！';
        exit;
    }
    $controller = new $target_c;
    if(!method_exists($controller, $method)){
        echo $method.'方法不存在';
        exit;
    }
    $controller->$method();
    return $controller;
}

/**
 * 模型统一入口
 * @param string $name 模型名字
 */
function M($name){
    $target_file=ROOT_PATH.'/Admin/Model/'.$name.'Model.class.php';
    if(!file_exists($target_file)){
        echo $name.'模型文件不存在！';
        exit;
    }
    require_once($target_file);
    $target_m=$name.'Model';
    if(!class_exists($target_m)){
        echo $name.'模型不存在';
        exit;
    }
    $model=new $target_m;
    return $model;
}
/**
 * 类库自动加载
 * @param string $class 对象类名
 * @return void
 */
function autoload($class) {
    $class = str_replace('\\','/',$class);
    $filename = ROOT_PATH.'/'.$class.'.class.php';
    if(is_file($filename)) {
        require_once($filename);
    }
    //require_once($class.'.class.php');
}
function isEmail($email){
    $regex = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[-_a-z0-9][-_a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})$/i';
    if (preg_match($regex, $email)) {
        return true;
    }
    return false;
}
function start(){
    session_start();
    $name = isset($_REQUEST['c'])?$_REQUEST['c']:'index';
    $method = isset($_REQUEST['m'])?$_REQUEST['m']:'index';
    C($name,$method);
}
?>


    
    