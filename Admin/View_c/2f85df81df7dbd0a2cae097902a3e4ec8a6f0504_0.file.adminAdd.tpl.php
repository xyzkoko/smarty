<?php
/* Smarty version 3.1.30, created on 2017-03-12 16:00:06
  from "/data/wwwroot/smarty/Admin/View/admin/adminAdd.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c50006900ef7_91750475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f85df81df7dbd0a2cae097902a3e4ec8a6f0504' => 
    array (
      0 => '/data/wwwroot/smarty/Admin/View/admin/adminAdd.tpl',
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
function content_58c50006900ef7_91750475 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">添加管理员</h1>
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
?c=admin&m=adminAdd" method="post">
                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>初始密码</label>
                                <input class="form-control" name="password" value="123456">
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
"><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">确定</button>
                            <button type="reset" class="btn btn-default">重置</button>
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
