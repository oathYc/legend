<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/activity/activity-push-list">活动管理</a> <span class="divider">/</span></li>
        <li class="active">活动推送列表</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/activity/activity-push">添加活动推送</a>
        </li>
    </ul>
    <form action="/content/activity/activity-push-list" method="get" class="form-horizontal">
        <table class="table">
            <tr>
            </tr>
        </table>
    </form>
    <form action="/content/activity/activity-push-list" method="post">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>区服</th>
                <th>说明</th>
                <th>类型</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>发放物品</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data as $k => $v){
                ?>
                <tr  class="text-item">
                    <td ><span style="width: 80px; "><?php echo $v['id']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['serverId']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['remark']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['type']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['beginTime']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['endTime']?></span></td>
                    <td ><span><?php echo $v['pushContent']?></span></td>
                    <td  class="notSLH" style="width: 130px;">
                        <a class="btn btn-primary" href="/content/activity/activity-push-edit?id=<?php echo $v['id'] ; ?>" >修改</a>
                        <a href='#' class="btn btn-primary" onclick="javascript:if(confirm('确定删除吗？')){location.href='/content/activity/activity-push-delete?id=<?php echo $v['id']; ?>'}" >删除</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </form>

</div>