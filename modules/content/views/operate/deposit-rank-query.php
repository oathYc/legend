<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/operate/index">运营数据</a> <span class="divider">/</span></li>
        <li class="active">等级分布</li>
    </ul>
    <ul class="nav">
    </ul>
    <form action="/content/operate/deposit-rank-query" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    开始日期：
                </td>
                <td>
                    <input class="input-small Wdate" autocomplete="off" onclick="WdatePicker()" type="text" size="10" id="beginTime"  name="beginTime" value="<?php echo isset($_GET['beginTime'])?$_GET['beginTime']:''?>"/>
                </td>
                <td>
                    结束日期：
                </td>
                <td>
                    <input class="input-small Wdate" autocomplete="off" onclick="WdatePicker()"  size="10" type="text" id="endTime" name="endTime"  value="<?php echo isset($_GET['endTime'])?$_GET['endTime']:''?>"/>
                </td>
                <td>
                    查询区服：
                </td>
                <td>
                    <select name="server">
                        <option value="0">请选择</option>
                        <?php
                        foreach($servers as $k => $v){ ?>
                            <option value='<?php echo $v['id']?>' <?php if(isset($_GET['server']) && $_GET['server'] == $v['id']) echo 'selected';?>><?php echo $v['name']?></option>";
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">查询</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/operate/deposit-rank-query" method="post">
        <table class="table table-hover">
            <thead>
            <tr>
<!--                <th>平台</th>-->
                <th>昵称</th>
                <th>充值总额</th>
                <th>当前剩余元宝数量</th>
                <th >最后充值时间</th>
                <th >最后登录时间</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $kss => $v) {
                ?>
                <tr  class="text-item tdBorder">
<!--                    <td ><span >--><?php //echo $v['PackageFlag']?><!--</span></td>-->
                    <td ><span ><?php echo $v['Name']?></span></td>
                    <td ><span><?php echo $v['depositMoney']?></span></td>
                    <td ><span ><?php echo $v['currentYB']?></span></td>
                    <td ><span><?php echo $v['lastRechTime']?></span></td>
                    <td ><span ><?php echo $v['lastLogin']?></span></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
    <div class="pagination pagination-right" style="margin: 10px !important;">
        <span style="font-size: 17px;position: relative;bottom: 7px;">共<?php echo $count;?>条&nbsp;</span>
        <?php if($count > 200){?>
            <span style="font-size: 17px;position: relative;bottom: 5px;">
            <a onclick="jumpPage()">Go</a>&nbsp;
            <input type="text" style="width: 20px;height: 18px;" id="jumpPage">&nbsp;页
        </span>
        <?php }?>
        <?php use yii\widgets\LinkPager;
        echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
</div>