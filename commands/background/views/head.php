<ul class="nav">
<!--    --><?php //foreach($headArr as $k => $v){?>
<!--    <li class="active">-->
<!--        <a href="/content/--><?php //echo $v['rule']?><!--/index">--><?php //echo $v['name']?><!--</a>-->
<!--    </li>-->
<!--    --><?php //}?>
</ul>
<ul class="nav pull-right">
    <li>
        <a href="#" class="download" role="button" onclick="setIp(1)"   data-toggle="modal" >外网</a>
    </li>
    <li>
        <a href="#" class="download" role="button" onclick="setIp(2)"   data-toggle="modal" >内网</a>
    </li>
    <li>
        <a href="#" class="download" role="button" onclick="showPassFrame()"   data-toggle="modal" >修改密码</a>
    </li>
    <li>
        <a href="/content/login/login-out">退出管理</a>
    </li>
</ul>
<script>
    function showPassFrame(){
        $('.updatePass').css('display','block');
    }
    function cancelPass(){
        $('.updatePass').css('display','none');
    }
    function updatePass(){
        var oldPass = $('#oldPass').val();
        var newPass = $('#newPass').val();
        var surePass = $('#surePass').val();
        if(oldPass == newPass){
            alert('新旧密码相同，请修改');
            return false;
        }
        if(newPass !== surePass){
            alert('新密码不一致，请修改');
            return false;
        }
        $.ajax({
            url:'/content/rule/update-pass',
            type:'post',
            dataType:'json',
            data:{
                oldPass:oldPass,
                newPass:newPass,
            },
            success:function(e){
                alert(e.message);
                if(e.code ==1){
                    location.href='/content/login/login-out';
                }
            }
        })
    }
    function setIp(type){
        $.post('/content/api/set-ip',{type:type},function(e){console.log(e.ipAddress)},'json');
    }

    function getToolIds(){
        var val = $('#propName').val();
        $.post('/content/api/get-item',{name:val},function(e){
            var str = '';
            for(var i=0;i<e.length;i++){
                str += '<li data-Id="'+e[i].itemid+'"  onclick="setToolId(this)">'+e[i].name+'</li>'
            }
            $('#propData').html(str);
        },'json');
    }
    function setToolId(_this){
        var toolId = $(_this).attr('data-Id');
        $('#propId').val(toolId);
        $('#propName').val($(_this).html());
    }
</script>