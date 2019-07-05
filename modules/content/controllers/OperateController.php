<?php

/**
 * 运营数据模块
 */
namespace app\modules\content\controllers;


use app\libs\AdminController;
use Yii;
use yii\data\Pagination;

class OperateController  extends AdminController
{
    public $enableCsrfValidation = false;
    public $layout = 'content';

    public function init(){
        parent::init();
        parent::setContentId('operate');
    }
    public function actionIndex(){
        return $this->redirect('/content/index/index');
    }
    /**
     * 数据查询
     */
    public function actionDataQuery(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->post('endTime');
        $service = Yii::$app->request->get('service');
        $channel = Yii::$app->request->get('channel');
        $where = " 1=1 ";
        if($beginTime){
            $begin = strtotime($beginTime);
            $where .=  " and createTime >= $begin";
        }
        if($endTime){
            $end = strtotime($endTime) + 86399;
            $where .= " and createTime <= $end";
        }
        if($service){
            $where .= " and service = '{$service}'";
        }
        if($channel){
            $where .= " and channel = '{$channel}'";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
        ];
        $count = 20;
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>20]);
        return $this->render('data-query',['data'=>$data,'page'=>$page,'count'=>$count]);
    }
    /**
     * 等级分布
     */
    public function actionLevelList(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->post('endTime');
        $service = Yii::$app->request->get('service');
        $where = " 1=1 ";
        if($beginTime){
            $begin = strtotime($beginTime);
            $where .=  " and createTime >= $begin";
        }
        if($endTime){
            $end = strtotime($endTime) + 86399;
            $where .= " and createTime <= $end";
        }
        if($service){
            $where .= " and service = '{$service}'";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
        ];
        $count = 20;
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>20]);
        return $this->render('level-list',['data'=>$data,'page'=>$page,'count'=>$count]);
    }
    /**
     * 留存数据
     */
    public function actionRetainData(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->post('endTime');
        $service = Yii::$app->request->get('service');
        $channel = Yii::$app->request->get('channel');
        $where = " 1=1 ";
        if($beginTime){
            $begin = strtotime($beginTime);
            $where .=  " and createTime >= $begin";
        }
        if($endTime){
            $end = strtotime($endTime) + 86399;
            $where .= " and createTime <= $end";
        }
        if($service){
            $where .= " and service = '{$service}'";
        }
        if($channel){
            $where .= " and channel = '{$channel}'";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
        ];
        $count = 20;
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>20]);
        return $this->render('data-query',['data'=>$data,'page'=>$page,'count'=>$count]);
    }
    /**
     * vip分布
     */
    public function actionVipList(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $service = Yii::$app->request->get('service');
        $vipList = Yii::$app->request->get('vipList');
        $where = ' 1=1 ';
        if($service){
            $where .= " and service = '{$service}'";
        }
        if($vipList){
            $where .= " and vip = $vipList";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd']
        ];
        return $this->render('vip-list',['data'=>$data]);
    }
    /**
     * 等级充值分布
     */
    public function actionLevelDepositList(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $service = Yii::$app->request->get('service');
        $channel = Yii::$app->request->get('channel');
        $where = ' 1=1 ';
        if($service){
            $where .= " and service = '{$service}'";
        }
        if($channel){
            $where .= " and channel = $channel";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd']
        ];
        return $this->render('level-deposit-list',['data'=>$data]);
    }
    /**
     * 充值排行查询
     */
    public function actionDepositRankQuery(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->post('endTime');
        $service = Yii::$app->request->get('service');
        $where = " 1=1 ";
        if($beginTime){
            $begin = strtotime($beginTime);
            $where .=  " and createTime >= $begin";
        }
        if($endTime){
            $end = strtotime($endTime) + 86399;
            $where .= " and createTime <= $end";
        }
        if($service){
            $where .= " and service = '{$service}'";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd']
        ];
        return $this->render('deposit-rank-query',['data'=>$data]);
    }
    /**
     * LTV数据
     */
    public function actionLtvData(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->post('endTime');
        $service = Yii::$app->request->get('service');
        $channel = Yii::$app->request->get('channel');
        $ltv = Yii::$app->request->get('ltv');
        $where = " 1=1 ";
        if($beginTime){
            $begin = strtotime($beginTime);
            $where .=  " and createTime >= $begin";
        }
        if($endTime){
            $end = strtotime($endTime) + 86399;
            $where .= " and createTime <= $end";
        }
        if($service){
            $where .= " and service = '{$service}'";
        }
        if($channel){
            $where .= " and channel = '{$channel}'";
        }
        if($ltv){
            $where .= " and ltv = '{$ltv}'";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
        ];
        $count = 20;
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>20]);
        return $this->render('ltv-data',['data'=>$data,'page'=>$page,'count'=>$count]);
    }
    /**
     * 登录在线分布
     */
    public function actionLoginOnlineList(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $day = Yii::$app->request->get('day');
        if(!$day){//获取上一天的日期
            $day = date('Y-m-d',strtotime("-1day"));
        }
        $service = Yii::$app->request->get('service');
        $where = " date = '{$day}'";
        if($service){
            $where .= " and service = '{$service}'";
        }
        $data = [];
        return $this->render('login-online-list',['data'=>$data]);
    }
    /**
     * 滚服数据
     */
    public function actionRollData(){
        $action = Yii::$app->controller->action->id;
        parent::setActionId($action);
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->post('endTime');
        $service = Yii::$app->request->get('service');
        $where = " 1=1 ";
        if($beginTime){
            $begin = strtotime($beginTime);
            $where .=  " and createTime >= $begin";
        }
        if($endTime){
            $end = strtotime($endTime) + 86399;
            $where .= " and createTime <= $end";
        }
        if($service){
            $where .= " and service = '{$service}'";
        }
        $data = [
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
            ['id'=>1,'name'=>'cc','createPower'=>0,'catalog'=>'dd'],
        ];
        $count = 20;
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>20]);
        return $this->render('roll-data',['data'=>$data,'page'=>$page,'count'=>$count]);
    }
}