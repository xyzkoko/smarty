<?php
/* Smarty version 3.1.30, created on 2017-01-18 07:43:33
  from "E:\phpStudy\WWW\smarty_test\Admin\View\common\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587f1ca5e73f90_23821941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71dcebcdad058a5a899918edfe04cf94f99c09fa' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\smarty_test\\Admin\\View\\common\\index.tpl',
      1 => 1484725406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_587f1ca5e73f90_23821941 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">欢迎,<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
