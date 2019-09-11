<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/gm/index">GM工具</a> <span class="divider">/</span></li>
        <li class="active">ssc活动</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/gm/ssc-add">添加ssc活动</a>
        </li>
    </ul>
    <form action="/content/gm/ssc" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    开始日期：
                </td>
                <td>
                    <input class="input-small Wdate" onclick="WdatePicker()" type="text" size="10" id="beginTime"  name="beginTime" value="<?php echo isset($_GET['beginTime'])?$_GET['beginTime']:''?>"/>
                </td>
                <td>
                    结束日期：
                </td>
                <td>
                    <input class="input-small Wdate" onclick="WdatePicker()"  size="10" type="text" id="endTime" name="endTime"  value="<?php echo isset($_GET['endTime'])?$_GET['endTime']:''?>"/>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/gm/ssc" method="post">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>说明</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data as $k => $v){
                ?>
                <tr  class="text-item">
                    <td ><span style="width: 80px; "><?php echo $v['id']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['beginTime']?></span></td>
                    <td ><span style="width: 80px; "><?php echo $v['endTime']?></span></td>
                    <td ><span ><?php echo $v['remark']?></span></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </form>

</div>