<{include file="common/header.tpl" title=foo}>
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
                        <form id="form" action="<{$SCRIPT_NAME}>?c=admin&m=roleUpdate" method="post">
                            <input class="form-control" name="roleid" value="<{$role['roleid']}>" style="display:none;">
                            <input class="form-control" name="token" value="<{md5($role['roleid'])}>" style="display:none;">
                            <div class="form-group">
                                <label>用户组</label>
                                <input class="form-control" name="name" value="<{$role['name']}>">
                            </div>
                            <div class="form-group">
                                <label>权限</label>
                                <{foreach from=$menuAdd item=rows}>
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="checkbox" name="rule[]" value="<{$rows['id']}>" <{if $rows['select']}>checked<{/if}>><{$rows['name']}></label>
                                    <{if isset($rows['child'])}>
                                    <div class="form-group" style="margin-left: 30px;">
                                        <{foreach from=$rows['child'] item=rows2}>
                                        ┠─&nbsp;&nbsp;<label class="checkbox-inline"><input type="checkbox" name="rule[]" value="<{$rows2['id']}>" <{if $rows2['select']}>checked<{/if}>><{$rows2['name']}></label>
                                        <{if isset($rows2['child'])}>
                                        <div class="form-group" style="margin-left: 60px;">┠─&nbsp;&nbsp;
                                            <{foreach from=$rows2['child'] item=rows3}>
                                            <label class="checkbox-inline"><input type="checkbox" name="rule[]" value="<{$rows3['id']}>" <{if $rows3['select']}>checked<{/if}>><{$rows3['name']}></label>
                                            <{/foreach}>
                                        </div>
                                        <{/if}>
                                        <{/foreach}>
                                    </div>
                                    <{/if}>
                                </div><hr/>
                                <{/foreach}>
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
<{include file="common/footer.tpl" title=foo}>