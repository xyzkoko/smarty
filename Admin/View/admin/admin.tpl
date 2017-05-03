<{include file="common/header.tpl" title=foo}>
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
                <{if isset($adminAdd)}>
                <button class="btn btn-primary" type="button" style="float:right;" onclick="window.location='<{$SCRIPT_NAME}>?c=<{$adminAdd['c']}>&m=<{$adminAdd['m']}>'"><{$adminAdd['name']}></button>
                <{/if}>
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
                    <{foreach from=$adminList item=rows}>
                        <tr>
                            <td><{$rows['name']}></td>
                            <td><{$rows['rolename']}></td>
                            <td><{$rows['email']}></td>
                            <td><{$rows['create_dt']}></td>
                            <td class="center"><{$rows['update_dt']}></td>
                            <td class="center"><{if $rows['roleid'] != 1 && isset($adminUpdate)}><button class="btn btn-outline btn-warning" type="button" onclick="window.location='<{$SCRIPT_NAME}>?c=<{$adminUpdate['c']}>&m=<{$adminUpdate['m']}>&userid=<{$rows['userid']}>'">修改</button><{/if}>&nbsp;&nbsp;<{if $rows['roleid'] != 1 && isset($adminDelete)}><button class="btn btn-outline btn-danger" type="button" onclick="if(confirm('确定要删除吗?'))window.location='<{$SCRIPT_NAME}>?c=<{$adminDelete['c']}>&m=<{$adminDelete['m']}>&userid=<{$rows['userid']}>'">删除</button><{/if}></td>
                        </tr>
                    <{/foreach}>
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<{include file="common/footer.tpl" title=foo}>
<script>
    $(document).ready(function() {
        $('#dataTables-admin').DataTable({
            responsive: true
        });
    });
</script>