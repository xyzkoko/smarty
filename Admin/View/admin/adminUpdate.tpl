<{include file="common/header.tpl" title=foo}>
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
                        <form id="form" action="<{$SCRIPT_NAME}>?c=admin&m=adminUpdate" method="post">
                            <input class="form-control" name="userid" value="<{$user['userid']}>" style="display:none;">
                            <input class="form-control" name="token" value="<{md5($user['userid'])}>" style="display:none;">
                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" name="name" value="<{$user['name']}>">
                            </div>
                            <div class="form-group">
                                <label>所属用户组</label>
                                <select class="form-control" name="roleid">
                                    <{foreach from=$roleList item=rows}>
                                    <option value="<{$rows['roleid']}>" <{if $user['roleid'] == $rows['roleid']}>selected<{/if}>><{$rows['name']}></option>
                                    <{/foreach}>
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
<{include file="common/footer.tpl" title=foo}>