<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\pay\controllers;

use app\libs\Methods;
use app\modules\pay\models\Lottery;
use function GuzzleHttp\Psr7\str;
use yii;

class SscController extends yii\web\Controller {
    public $enableCsrfValidation = false;

    /**
     * 获取时时彩数据
     * 20分钟一次
     *
     */
    public function actionDataGet(){
        $url = 'http://d.apiplus.net/newly.do?token=t02ed09c241ad2e34k&code=cqssc&rows=2&format=json';
        $result = file_get_contents($url);
        $data = json_decode($result,true);
        if(isset($data['data'])){
            $code = $data['code'];
            $insert = $data['data'];
            foreach($insert as $k => $v){
                $expect = $v['expect'];//开奖编码
                $openCode = $v['opencode'];//开奖码
                $openTime = $v['opentime'];//开奖时间   日期时间格式
                $openUnixTime = $v['opentimestamp'];//开间时间 时间戳
                $date = explode(' ',$openTime)[0];
                $time = time();
                //查看是否已有该条时彩数据
                $isHad = Lottery::find()->where("expect = '{$expect}' and openCode = '{$openCode}' and code = '{$code}'")->one();
                if($isHad){
                    continue;
                }else{
                    $model = new Lottery();
                    $model->date = $date;
                    $model->code = $code;
                    $model->expect = $expect;
                    $model->openCode = $openCode;
                    $model->openTime = $openTime;
                    $model->openUnixTime = $openUnixTime;
                    $model->createTime = $time;
                    $model->save();
                    $datas[] = $insert[$k];
                }
            }
        }
    }
    /**
     * 查询数据
     * 返回客户端
     */
    public function actionDataQuery(){
        $begin = Yii::$app->request->post('begin','2019-09-02');//查询时间 开始
        $end = Yii::$app->request->post('end');//查询时间 结束
        if($begin || $end){
            $where = ' 1 = 1 ';
            if($begin){
                $beginTime = strtotime($begin);
                $where .= " and openUnixTime >= $beginTime" ;
            }
            if($end){
                $endTime = strtotime($end);
                $where .= " and openUnixTime <= $endTime";
            }
            $data = Lottery::find()->where($where)->asArray()->orderBy("openUnixTime desc")->all();
            $return = ['code'=>1,'msg'=>'数据获取成功','data'=>$data];
        }else {
            $return = ['code' => 0, 'msg' => '请至少填写一个筛选时间'];
        }
        die(json_encode($return));
    }
}