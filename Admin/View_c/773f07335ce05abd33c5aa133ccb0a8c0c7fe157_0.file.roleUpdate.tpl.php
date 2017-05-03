<?php
/* Smarty version 3.1.30, created on 2017-02-11 18:10:07
  from "/data/wwwroot/smarty/Admin/View/admin/roleUpdate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589ee2ffcb61a0_49642348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '773f07335ce05abd33c5aa133ccb0a8c0c7fe157' => 
    array (
      0 => '/data/wwwroot/smarty/Admin/View/admin/roleUpdate.tpl',
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
function content_589ee2ffcb61a0_49642348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-12">
        <h1 class="page-header">修改用户组</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Form Elements
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form id="form" action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?c=admin&m=roleUpdate" method="post">
                            <input class="form-control" name="roleid" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['roleid'];?>
" style="display:none;">
                            <input class="form-control" name="token" value="<?php echo md5($_smarty_tpl->tpl_vars['role']->value['roleid']);?>
" style="display:none;">
                            <div class="form-group">
                                <label>用户组</label>
                                <input class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
">
                            </div>
                            <div class="form-group">
                                <label>权限</label>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuAdd']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="checkbox" name="rule[]" value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rows']->value['select']) {?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</label>
                                    <?php if (isset($_smarty_tpl->tpl_vars['rows']->value['child'])) {?>
                                    <div class="form-group" style="margin-left: 30px;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value['child'], 'rows2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows2']->value) {
?>
                                        ┠─&nbsp;&nbsp;<label class="checkbox-inline"><input type="checkbox" name="rule[]" value="<?php echo $_smarty_tpl->tpl_vars['rows2']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rows2']->value['select']) {?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['rows2']->value['name'];?>
</label>
                                        <?php if (isset($_smarty_tpl->tpl_vars['rows2']->value['child'])) {?>
                                        <div class="form-group" style="margin-left: 60px;">┠─&nbsp;&nbsp;
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows2']->value['child'], 'rows3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows3']->value) {
?>
                                            <label class="checkbox-inline"><input type="checkbox" name="rule[]" value="<?php echo $_smarty_tpl->tpl_vars['rows3']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rows3']->value['select']) {?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['rows3']->value['name'];?>
</label>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </div>
                                        <?php }?>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </div>
                                    <?php }?>
                                </div><hr/>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </div>
                            <button type="submit" class="btn btn-default">确定</button>
                            <button type="reset" class="btn btn-default" onclick="history.go(-1);">返回</button>
                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
