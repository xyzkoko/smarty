<{include file="common/header.tpl" title=foo}>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">用户组列表</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="overflow:hidden;line-height: 34px;">
                DataTables Advanced Tables
                <{if isset($roleAdd)}>
                <button class="btn btn-primary" type="button" style="float:right;" onclick="window.location='<{$SCRIPT_NAME}>?c=<{$roleAdd['c']}>&m=<{$roleAdd['m']}>'"><{$roleAdd['name']}></button>
                <{/if}>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-admin">
                    <thead>
                    <tr>
                        <th>用户组</th>
                        <th>权限</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <{foreach from=$roleList item=rows}>
                        <tr>
                            <td><{$rows['name']}></td>
                            <td><{$rows['rule']}></td>
                            <td class="center"><{if $rows['disabled']}>禁用<{else}>可用<{/if}></td>
                            <td class="center"><{if $rows['roleid'] != 1 && isset($roleUpdate)}><button class="btn btn-outline btn-warning" type="button" onclick="window.location='<{$SCRIPT_NAME}>?c=<{$roleUpdate['c']}>&m=<{$roleUpdate['m']}>&roleid=<{$rows['roleid']}>'">修改</button><{/if}>&nbsp;&nbsp;<{if $rows['roleid'] != 1 && isset($roleDelete)}><button class="btn btn-outline btn-danger" type="button" onclick="if(confirm('确定要删除吗?'))window.location='<{$SCRIPT_NAME}>?c=<{$roleDelete['c']}>&m=<{$roleDelete['m']}>&roleid=<{$rows['roleid']}>'">删除</button><{/if}></td>
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