<?php
/* Smarty version 3.1.30, created on 2017-02-11 18:01:16
  from "/data/wwwroot/smarty/Admin/View/admin/admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589ee0ecf3cbc7_09917992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc706ff45f308969d03c7065437dda84bab65d50' => 
    array (
      0 => '/data/wwwroot/smarty/Admin/View/admin/admin.tpl',
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
function content_589ee0ecf3cbc7_09917992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">管理员列表</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="overflow:hidden;line-height: 34px;">
                DataTables Advanced Tables
                <?php if (isset($_smarty_tpl->tpl_vars['adminAdd']->value)) {?>
                <button class="btn btn-primary" type="button" style="float:right;" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?c=<?php echo $_smarty_tpl->tpl_vars['adminAdd']->value['c'];?>
&m=<?php echo $_smarty_tpl->tpl_vars['adminAdd']->value['m'];?>
'"><?php echo $_smarty_tpl->tpl_vars['adminAdd']->value['name'];?>
</button>
                <?php }?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-admin">
                    <thead>
                    <tr>
                        <th>姓名</th>
                        <th>用户组</th>
                        <th>邮箱</th>
                        <th>创建时间</th>
                        <th>最近登陆</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['adminList']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['rolename'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['create_dt'];?>
</td>
                            <td class="center"><?php echo $_smarty_tpl->tpl_vars['rows']->value['update_dt'];?>
</td>
                            <td class="center"><?php if ($_smarty_tpl->tpl_vars['rows']->value['roleid'] != 1 && isset($_smarty_tpl->tpl_vars['adminUpdate']->value)) {?><button class="btn btn-outline btn-warning" type="button" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?c=<?php echo $_smarty_tpl->tpl_vars['adminUpdate']->value['c'];?>
&m=<?php echo $_smarty_tpl->tpl_vars['adminUpdate']->value['m'];?>
&userid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['userid'];?>
'">修改</button><?php }?>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['rows']->value['roleid'] != 1 && isset($_smarty_tpl->tpl_vars['adminDelete']->value)) {?><button class="btn btn-outline btn-danger" type="button" onclick="if(confirm('确定要删除吗?'))window.location='<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?c=<?php echo $_smarty_tpl->tpl_vars['adminDelete']->value['c'];?>
&m=<?php echo $_smarty_tpl->tpl_vars['adminDelete']->value['m'];?>
&userid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['userid'];?>
'">删除</button><?php }?></td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#dataTables-admin').DataTable({
            responsive: true
        });
    });
<?php echo '</script'; ?>
><?php }
}
