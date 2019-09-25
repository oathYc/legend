<?php

/**
 * GM工具模块
 */
namespace app\modules\content\controllers;


use app\libs\AdminController;
use app\libs\Methods;
use app\modules\content\models\ActivityLog;
use app\modules\content\models\LTV;
use app\modules\content\models\Notice;
use app\modules\content\models\OperationLog;
use app\modules\content\models\RewardRecord;
use app\modules\content\models\Role;
use app\modules\content\models\Server;
use app\modules\content\models\SscActivity;
use Yii;
use yii\base\Controller;
use yii\data\Pagination;

class GmController  extends AdminController
{
    public $enableCsrfValidation = false;
    public $layout = 'content';

    public function init(){
        parent::init();
        parent::setContentId('gm');
    }
    public function actionIndex(){
        return $this->redirect('/content/index/index');
    }
    /**
     * 区服添加奖励
     */
    public function actionServiceAddReward(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        if($_POST){
            $adminId = Yii::$app->session->get('adminId');
            $server = Yii::$app->request->post('server');
            $sendTime = Yii::$app->request->post('sendTime');
            $minLevel = Yii::$app->request->post('minLevel',0);
            $maxLevel = Yii::$app->request->post('maxLevel',70);
            $propIds = Yii::$app->request->post('propIds');//道具id
            $numbers = Yii::$app->request->post('numbers');//道具数量
            $binds = Yii::$app->request->post('binds');//道具数量
            $emailTitle = Yii::$app->request->post('emailTitle');
            $emailContent = Yii::$app->request->post('emailContent');
//            $contentOther = Yii::$app->request->post('contentOther','');
            $contentOther = '';
            if( count($propIds) == count($numbers) && (count($numbers) == count($binds)) && count($propIds) > 0  ){
                $pushContent = ['propId'=>$propIds,'number'=>$numbers,'bind'=>$binds];
                $pushContent = json_encode($pushContent);
                //统计道具物品数量
                $ids = [];
                $itemList = [];
                foreach($propIds as $k => $v){
                    if(!in_array([$v,$binds[$k]],$ids)){
                        $ids[] = [$v,$binds[$k]];
                    }//判断是否为元宝
                    if($v == 222222){
                        //判断账号权限
                        $admin = Role::findOne($adminId);
                        if($admin->currency !=1){
                            echo "<script>alert('你没有元宝操作权限');setTimeout(function(){history.go(-1);},1000)</script>";die;
                        }
                    }
                    $binding = $binds[$k]==1?1:0;//1-绑定 0-未绑定
                    $itemList[] = ['ItemId'=>$v,'ItemNum'=>$numbers[$k],'binding'=>$binding];
                }
                $propNum = count($ids);
            }else{
                echo "<script>alert('发放物品数据不正确');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
            if(!$minLevel)$minLevel = 0;
            if(!$maxLevel)$maxLevel = 70;
            if($server  && $emailContent && $emailTitle && $pushContent){
                $model = new RewardRecord();
                $model->type = 2;//1-玩家 2-区服
                $model->serverId = $server;
                $model->title = $emailTitle;
                $model->content = $emailContent;
                $model->contentOther = $contentOther;
                $model->sender = '系统';
                $model->prop = $pushContent;
                $model->propNum = $propNum;
                $model->sendTime = $sendTime;
                $model->minLevel = $minLevel;
                $model->maxLevel = $maxLevel;
                $model->createTime = time();
                $model->creator = $adminId;
                $res = $model->save();
                if($res){
                    //推送服务端
                    if($sendTime){
                        $sendTime = strtotime($sendTime);
                        if($sendTime < time()){//小于当前时间
                            $sendTime = 0;
                        }
                    }else{
                        $sendTime = 0;
                    }
                    $content = ['SendTime'=>$sendTime,'MinLevel'=>$minLevel,'MaxLevel'=>$maxLevel,'MailTitle'=>$emailTitle,'MailContent'=>$emailContent,'Hyperlink'=>'系统','ButtonContent'=>$contentOther,'ItemList'=>$itemList,'ItemList_count'=>$propNum];
                    Methods::GmFileGet($content,$server,6,4143);//4143 区服邮件
                    echo "<script>alert('发送奖励成功');setTimeout(function(){location.href='service-add-reward';},1000)</script>";die;
                }else{
                    echo "<script>alert('保存失败，请重试');setTimeout(function(){history.go(-1);},1000)</script>";die;
                }
            }else{
                echo "<script>alert('参数错误');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
        }else{
            $servers = Server::getServers();
            return $this->render('service-add-reward',['servers'=>$servers]);
        }
    }
    /**
     * 玩家添加奖励
     */
    public function actionPlayerAddReward(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        if($_POST){
            $server = Yii::$app->request->post('server');
            $roleId = Yii::$app->request->post('roleId');
            $emailTitle = Yii::$app->request->post('emailTitle');
            $emailContent = Yii::$app->request->post('emailContent');
//            $contentOther = Yii::$app->request->post('contentOther');
            $contentOther = '';
            $propId = Yii::$app->request->post('propId');
            $propNum = Yii::$app->request->post('propNum');
            $binding = Yii::$app->request->post('bind');
            if($server && $roleId && $emailContent && $emailTitle && $propId && $propNum && $binding){
                $adminId = Yii::$app->session->get('adminId');
                //判断是否为元宝
                if($propId == 222222){
                    //判断账号权限
                    $admin = Role::findOne($adminId);
                    if($admin->currency !=1){
                        echo "<script>alert('你没有元宝操作权限');setTimeout(function(){history.go(-1);},1000)</script>";die;
                    }
                }
                $prop = ['propId'=>[$propId],'number'=>[$propNum],'bind'=>[$binding]];
                $model = new RewardRecord();
                $model->type = 1;//1-玩家 2-区服
                $model->serverId = $server;
                $model->title = $emailTitle;
                $model->content = $emailContent;
                $model->contentOther = $contentOther;
                $model->sender = '系统';
                $model->prop = json_encode($prop);
                $model->propNum = 1;
                $model->roleId = $roleId;
                $model->createTime = time();
                $model->creator = $adminId;
                $res = $model->save();
                if($res){
                    //推送服务端
                    $binding = $binding==1?1:0;//1-绑定 0-未绑定
                    $content = ['MailTitle'=>$emailTitle,'MailContent'=>$emailContent,'Hyperlink'=>'系统','HyperlinkText'=>$contentOther,'ItemId'=>$propId,'ItemNum'=>$propNum,'RoleId'=>$model->roleId,'binding'=>$binding];
                    Methods::GmFileGet($content,$server,6,4113);//4113 单人邮件
                    echo "<script>alert('发送奖励成功');setTimeout(function(){location.href='player-add-reward';},1000)</script>";die;
                }else{
                    echo "<script>alert('保存失败，请重试');setTimeout(function(){history.go(-1);},1000)</script>";die;
                }
            }else{
                echo "<script>alert('参数错误');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
        }else{
            $servers = Server::getServers();
            return $this->render('player-add-reward',['servers'=>$servers]);
        }
    }
    /**
     * 发奖操作记录
     */
    public function actionRewardRecord(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $service = \Yii::$app->request->get('service');
        $uid = \Yii::$app->request->get('uid');
        $where = ' 1=1 ';
        if($service){
            $where .= " and service = '{$service}'";
        }
        if($uid){
            $where .= " and uid = $uid ";
            $data = ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'];
        }else{
            $data = [];
        }
        return $this->render('reward-record',['data'=>$data]);
    }
    /**
     * 区服添加公告
     */
    public function actionServiceAddNotice(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        if($_POST){

        }else{
            return $this->render('service-add-notice',[]);
        }
    }
    /**
     * 公告查询
     */
    public function actionNoticeQuery(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $serverId = Yii::$app->request->get('server',0);
        $type = Yii::$app->request->get('type');//1-首页公告
        $where = " 1 = 1 ";
        if($serverId){
            $where .= " and serverId = $serverId";
        }
        if($type){
            $where .= " and type = $type";
        }
        $count = Notice::find()->where($where)->count();
        $page = new Pagination(['totalCount'=>$count]);
        $data = Notice::find()->where($where)->orderBy('id desc')->offset($page->offset)->limit($page->limit)->asArray()->all();
        foreach($data as $k => $v){
            $data[$k]['createName'] = Role::find()->where("id = {$v['creator']}")->asArray()->one()['name'];
        }
        $servers = LTV::getServers();
        return $this->render('notice-query',['data'=>$data,'count'=>$count,'page'=>$page,'servers'=>$servers]);
    }
    /**
     * 首页公告
     */
    public function actionIndexNotice(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        if($_POST){
            $id = Yii::$app->request->post('id',0);
            $beginTime = Yii::$app->request->post('beginTime');
            $endTime = Yii::$app->request->post('endTime');
            $content = Yii::$app->request->post('content');
            if(!$content){
                echo "<script>alert('请填写公告内容');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
            if($id){
                $model = Notice::findOne($id);
                $remark = '修改首页公告';
            }else{
                $remark = '添加首页公告';
                $model = new Notice();
            }
            $model->content = $content;
            $model->beginTime = $beginTime;
            $model->endTime = $endTime;
            $model->creator = Yii::$app->session->get('adminId');
            $model->type = 1;//1-首页公告
            $model->createTime = time();
            $res = $model->save();
            if($res){
                ActivityLog::logAdd($remark,$model->id,4);
                //推送服务端
//                Methods::GmFileGet($content,0,6,4243);
                echo "<script>alert('操作成功');setTimeout(function(){location.href='notice-query';},1000)</script>";die;
            }else{
                echo "<script>alert('添加失败，请重试');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
        }else{
            $id = Yii::$app->request->get('id',0);
            if($id){
                $notice = Notice::find()->where("id = $id")->asArray()->one();
                $data = ['notice'=>$notice];
            }else{
                $data  = [];
            }
            return $this->render('index-notice',$data);
        }
    }
    /**
     * 公告删除
     */
    public function actionNoticeDelete(){
        $id = Yii::$app->request->get('id');
        if($id){
            $res = Notice::deleteAll("id = $id");
            if($res ){
                ActivityLog::logAdd('删除首页公告',$id,4);
                echo "<script>alert('删除成功');setTimeout(function(){location.href='notice-query';},1000)</script>";die;
            }else{
                echo "<script>alert('操作失败，请重试');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
        }else{
            echo "<script>alert('操作失败，请重试');setTimeout(function(){history.go(-1);},1000)</script>";die;
        }
    }
    /**
     * 命令推送
     */
    public function actionCommandPush(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        if($_POST){
            $server = Yii::$app->request->post('server');
            $roleId = Yii::$app->request->post('roleId');
            $prefix = Yii::$app->request->post('prefix');
            $params = Yii::$app->request->post('params');
            if(!$server){
                echo "<script>alert('请选择区服');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
            if(!$prefix){
                echo "<script>alert('请填写命令前缀');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
            if(!$params){
                echo "<script>alert('请填写命令参数');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
            //记录日志并推送服务端
            OperationLog::logAdd("推送".$server."服GM命令 $prefix $params",$roleId,2);//2-gm命令
            $content = ['GMInstruct'=>$prefix,'GMParam'=>$params];
            if($roleId){
                $content['RoleId'] = $roleId;
            }
            Methods::GmFileGet($content,$server,6,4233);//4233 推送gm命令
            echo "<script>alert('推送成功');setTimeout(function(){location.href='command-push';},1000)</script>";die;
        }else{
            $servers = Server::getServers();
            return $this->render('command-push',['servers'=>$servers]);
        }
    }
}