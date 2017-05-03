<{include file="common/header.tpl" title=foo}>
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
                        <form id="form" action="<{$SCRIPT_NAME}>?c=admin&m=adminAdd" method="post">
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
                                    <{foreach from=$roleList item=rows}>
                                    <option value="<{$rows['roleid']}>"><{$rows['name']}></option>
                                    <{/foreach}>
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
<{include file="common/footer.tpl" title=foo}>