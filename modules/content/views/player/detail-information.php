<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/player/index">玩家相关</a> <span class="divider">/</span></li>
        <li class="active">详细信息</li>
    </ul>
    <ul class="nav">
    </ul>
    <form action="/content/player/detail-information" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    角色名：
                </td>
                <td>
                    <input  style="height: 20px;" type="text"  id="name"  name="name" value="<?php echo isset($_GET['name'])?$_GET['name']:''?>"/>
                </td>
                <td>
                    RoleID：
                </td>
                <td>
                    <input style="height: 20px" type="text" size="10" id="uid"  name="uid" value="<?php echo isset($_GET['uid'])?$_GET['uid']:''?>"/>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">查询</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/player/detail-information" method="post">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>账号</th>
                <th>区服</th>
                <th>昵称</th>
                <th>战斗力</th>
                <th>等级</th>
                <th>经验</th>
                <th >元宝</th>
                <th >绑定元宝</th>
                <th >金币</th>
                <th >血量</th>
                <th >魔法能量</th>
                <th >熔炼值</th>
                <th >杀怪数</th>
                <th >声望值</th>
                <th >PK值</th>
                <th >充值金额</th>
                <th >其他数据</th>
            </tr>
            </thead>
            <tbody>
                <?php if($data){?>
                <tr  class="text-item tdBorder" >
                    <td ><span ><?php echo isset($data['UserID'])?$data['UserID']:''?></span></td>
                    <td ><span ><?php echo isset($data['WorldName'])?$data['WorldName']:''?></span></td>
                    <td ><span ><?php echo isset($data['Name'])?$data['Name']:''?></span></td>
                    <td ><span ><?php echo isset($data['Battle'])?$data['Battle']:''?></span></td>
                    <td ><span ><?php echo isset($data['Level'])?$data['Level']:''?></span></td>
                    <td ><span ><?php echo isset($data['Exp'])?$data['Exp']:''?></span></td>
                    <td ><span ><?php echo isset($data['Ingot'])?$data['Ingot']:''?></span></td>
                    <td ><span ><?php echo isset($data['Cash'])?$data['Cash']:''?></span></td>
                    <td ><span ><?php echo isset($data['Money'])?$data['Money']:''?></span></td>
                    <td ><span ><?php echo isset($data['CurHP'])?$data['CurHP']:''?></span></td>
                    <td ><span ><?php echo isset($data['CurMP'])?$data['CurMP']:''?></span></td>
                    <td ><span ><?php echo isset($data['SoulScore'])?$data['SoulScore']:''?></span></td>
                    <td ><span ><?php echo isset($data['MonsterKillNum'])?$data['MonsterKillNum']:''?></span></td>
                    <td ><span ><?php echo isset($data['Vital'])?$data['Vital']:''?></span></td>
                    <td ><span ><?php echo isset($data['PkValue'])?$data['PkValue']:''?></span></td>
                    <td ><span ><?php echo isset($data['rechargeMoney'])?$data['rechargeMoney']:''?></span></td>
                    <td  class="notSLH" style="width:220px;!important;" >
                        <?php if(isset($data['RoleID'])){?>
                        <a class="btn" href="/content/player/order-query?uid=<?php echo $data['RoleID'] ; ?>" >充值</a>
                            <a class="btn " href="/content/player/log-query?uid=<?php echo $data['RoleID'] ; ?>" >元宝</a>
                            <a class="btn" href="/content/player/log-query?type=5&uid=<?php echo $data['RoleID'] ; ?>" >送花</a>
                            <a class="btn marTop" href="/content/player/log-query?type=6&uid=<?php echo $data['RoleID'] ; ?>" >商城</a>
                            <a class="btn marTop" href="/content/player/log-query?type=7&uid=<?php echo $data['RoleID'] ; ?>" >混沌</a>
                            <a class="btn marTop" href="/content/player/log-query?type=8&uid=<?php echo $data['RoleID'] ; ?>" >黑市</a>
                        <?php }?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </form>

</div>