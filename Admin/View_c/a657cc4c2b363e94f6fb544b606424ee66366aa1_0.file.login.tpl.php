<?php
/* Smarty version 3.1.30, created on 2017-02-11 17:59:59
  from "/data/wwwroot/smarty/Admin/View/common/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589ee09fa29f99_52824329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a657cc4c2b363e94f6fb544b606424ee66366aa1' => 
    array (
      0 => '/data/wwwroot/smarty/Admin/View/common/login.tpl',
      1 => 1486736541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589ee09fa29f99_52824329 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $_smarty_tpl->tpl_vars['APP_TITLE']->value;?>
</title>
    <!-- Bootstrap Core CSS -->
    <link href="./View/css/bootstrap.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="./View/css/metisMenu.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./View/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="./View/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">登陆</h3>
                </div>
                <div class="panel-body">
                    <form id="form" action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?c=admin&m=login" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="请输入邮箱" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="请输入密码" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="1" checked>7天内免登陆
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a href="#" name="submit" onclick="document.getElementById('form').submit();return false" class="btn btn-lg btn-success btn-block">确定</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<?php echo '<script'; ?>
 src="./View/js/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap Core JavaScript -->
<?php echo '<script'; ?>
 src="./View/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- Metis Menu Plugin JavaScript -->
<?php echo '<script'; ?>
 src="./View/js/metisMenu.min.js"><?php echo '</script'; ?>
>
<!-- Custom Theme JavaScript -->
<?php echo '<script'; ?>
 src="./View/js/sb-admin-2.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
