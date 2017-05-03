<?php
/* Smarty version 3.1.30, created on 2017-02-11 18:01:14
  from "/data/wwwroot/smarty/Admin/View/common/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589ee0ea645d91_02055388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '237f9aea199ccf5bbc6eae1dfc6132a2e4a5bff4' => 
    array (
      0 => '/data/wwwroot/smarty/Admin/View/common/index.tpl',
      1 => 1486736540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_589ee0ea645d91_02055388 (Smarty_Internal_Template $_smarty_tpl) {
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
