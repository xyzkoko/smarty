<?php
/* Smarty version 3.1.30, created on 2017-01-18 06:21:26
  from "E:\phpStudy\WWW\smarty_test\Admin\View\common\jump.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587f0966517695_86623107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af73ab8e9b88be4025790ad794b21ae97f711c04' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\smarty_test\\Admin\\View\\common\\jump.tpl',
      1 => 1484121007,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587f0966517695_86623107 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>跳转提示</title>
	<style type="text/css">
		*{ padding: 0; margin: 0; }
		body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
		.system-message{ padding: 24px 48px; }
		.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
		.system-message .jump{ padding-top: 10px}
		.system-message .jump a{ color: #333;}
		.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
		.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
	</style>
</head>
<body>
<div class="system-message">
	<present name="message">
		<?php if ($_smarty_tpl->tpl_vars['status']->value) {?>
		<h1>:)</h1>
		<p class="success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
		<?php } else { ?>
		<h1>:(</h1>
		<p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
		<?php }?>
	</present>
	<p class="detail"></p>
	<p class="jump">
		页面自动 <a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">跳转</a> 等待时间： <b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b>
	</p>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
	(function(){
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000);
	})();
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
