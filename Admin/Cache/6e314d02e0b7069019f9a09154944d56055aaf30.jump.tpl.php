<?php
/* Smarty version 3.1.30, created on 2017-01-17 03:13:45
  from "E:\phpStudy\WWW\smarty_test\Admin\View\home\jump.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587d8be9a70807_99335582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbca6266203db62592cdbfa26a35f400bf1c4f2e' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\smarty_test\\Admin\\View\\home\\jump.tpl',
      1 => 1484121007,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_587d8be9a70807_99335582 (Smarty_Internal_Template $_smarty_tpl) {
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
				<h1>:)</h1>
		<p class="success">登陆成功！</p>
			</present>
	<p class="detail"></p>
	<p class="jump">
		页面自动 <a id="href" href="http://localhost/smarty_test/Admin/index.php?c=admin&m=index">跳转</a> 等待时间： <b id="wait">1</b>
	</p>
</div>
<script type="text/javascript">
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
</script>
</body>
</html>
<?php }
}
