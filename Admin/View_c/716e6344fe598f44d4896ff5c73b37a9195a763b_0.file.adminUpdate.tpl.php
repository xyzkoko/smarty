<?php
/* Smarty version 3.1.30, created on 2017-02-06 07:35:19
  from "E:\phpStudy\WWW\smarty_test\Admin\View\admin\adminUpdate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589827371be528_18369633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '716e6344fe598f44d4896ff5c73b37a9195a763b' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\smarty_test\\Admin\\View\\admin\\adminUpdate.tpl',
      1 => 1486366515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_589827371be528_18369633 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">修改管理员</h1>
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
?c=admin&m=adminUpdate" method="post">
                            <input class="form-control" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" style="display:none;">
                            <input class="form-control" name="token" value="<?php echo md5($_smarty_tpl->tpl_vars['user']->value['userid']);?>
" style="display:none;">
                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
">
                            </div>
                            <div class="form-group">
                                <label>所属用户组</label>
                                <select class="form-control" name="roleid">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roleList']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['roleid'];?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value['roleid'] == $_smarty_tpl->tpl_vars['rows']->value['roleid']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">确定</button>
                            <button type="button" class="btn btn-default" onclick="history.go(-1);">返回</button>
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
