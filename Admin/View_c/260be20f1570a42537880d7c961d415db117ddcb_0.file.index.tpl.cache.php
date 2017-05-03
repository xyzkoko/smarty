<?php
/* Smarty version 3.1.30, created on 2017-01-17 03:12:09
  from "E:\phpStudy\WWW\smarty_test\Admin\View\admin\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587d8b893f5be9_32029811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '260be20f1570a42537880d7c961d415db117ddcb' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\smarty_test\\Admin\\View\\admin\\index.tpl',
      1 => 1484622106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.tpl' => 1,
    'file:home/footer.tpl' => 1,
  ),
),false)) {
function content_587d8b893f5be9_32029811 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '19396587d8b893a3b45_85658864';
$_smarty_tpl->_subTemplateRender("file:home/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
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
                <button class="btn btn-primary" type="button" style="float:right;">添加管理员</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-admin">
                    <thead>
                    <tr>
                        <th>姓名</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['create_dt'];?>
</td>
                            <td class="center"><?php echo $_smarty_tpl->tpl_vars['rows']->value['update_dt'];?>
</td>
                            <td class="center">修改 删除</td>
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
<?php $_smarty_tpl->_subTemplateRender("file:home/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
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
