<?php
/* Smarty version 3.1.30, created on 2017-01-17 07:01:50
  from "E:\phpStudy\WWW\smarty_test\Admin\View\home\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587dc15edfc4e3_71833355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f889ae58438a0bee4e093d9738a7d541204f09d7' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\smarty_test\\Admin\\View\\home\\index.tpl',
      1 => 1484636494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.tpl' => 1,
    'file:home/footer.tpl' => 1,
  ),
),false)) {
function content_587dc15edfc4e3_71833355 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:home/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?c=index&m=index&asd=123213">你好</a>
<?php $_smarty_tpl->_subTemplateRender("file:home/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
