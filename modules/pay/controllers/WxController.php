<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\pay\controllers;

use app\libs\Methods;
use app\modules\pay\models\Recharge;
use yii;

class WxController extends yii\web\Controller {
    public $enableCsrfValidation = false;

    /**
     * 微信制度
     * 支付数据获取
     * 客户端请求
     * 请求参数
     * amount 金额
     * productName 商品名称
     * detail  支付详情数据
     * 支付逻辑  客户端发送订单数据  ==》 PHP接受数据 ==》将订单数据发送给服务端 ==》调用对应的支付接口获取支付二维码 ==》将二维码返给客户端
     * 支付成功  回调地址中 验证支付结果  ==》通知服务端
     * code返回类型 1 成功 -1 支付金额不能为零 -2 订单号不存在 -3  角色id不存在 -4 服务器id不存在  -5 用户名不存在 -6 支付请求错误
     */
    public function actionWxOrder(){
        $request = \Yii::$app->request->post();
        $poststr = json_encode($request);
        $date = date('Y-m-d');
        $logDay = 'payLog-'.$date.'.txt';
        Methods::varDumpLog($logDay,$poststr,'a');
        Methods::varDumpLog($logDay,"\n",'a');
        $request = json_decode($poststr);
        $content = get_object_vars($request);
        $key = key($content);
        $cont = json_decode($key,true);
        $productName = '元宝充值';
        $amount = $cont['amount'];
        if($amount <= 0){
            die(json_encode(['code'=>-1]));//,'msg'=>'支付金额不能为零'
        }
        $time = time();
        $dateTime = date('YmdHis',$time);
        $orderNumber = $cont['orderNumber'];
        if(!$orderNumber){
            die(json_encode(['code'=>-2]));//,'msg'=>'订单号不存在'
        }
        //签名地区参数 省 市 区
        $province = \Yii::$app->params['province'];
        $city = \Yii::$app->params['city'];
        $area = \Yii::$app->params['area'];
        $payType = 'JSAPI_WEIXIN';//微信
        $roleId = $cont['roleId'];//用户角色id
        if(!$roleId){
            die(json_encode(['code'=>-3]));//,'msg'=>'角色id不存在'
        }
        $ratio = 500;//元宝比例
        $luckNum = 0;
        $extInfo = $cont['ext_info'];//其他扩展数据
        $server_id = $cont['server_id'];//服务器id
        if(!$server_id){
            die(json_encode(['code'=>-4]));//,'msg'=>'服务器id不存在'
        }
        $username = $cont['username'];
        if(!$username){
            die(json_encode(['code'=>-5]));//,'msg'=>'用户名不存在'
        }
        $sign = $cont['sign'];//验证签名字段
        //订单数据生成记录
        $model = new Recharge();
        $model->roleId = $roleId;
        $model->orderNumber = $orderNumber;
        $model->product = $productName;
        $model->money = $amount;
        $model->ratio = $ratio;
        $model->lucknum = $luckNum;
        $model->sign = $sign;
        $model->extInfo = $extInfo;
        $model->status = 0;
        $model->server_id = $server_id;
        $model->createTime = $time;
        $model->username = $username;
        $model->payType = 2;//1-支付宝 2-微信 h5
        $model->yuanbao = $ratio*$amount+$luckNum;
        $res = $model->save();
        if($res){
            //三方微信支付调用
//            $return = ApiController::AliOrder($orderNumber,$productName,$amount,$dateTime,$province,$city,$area,$model->id,$payType);
            $payUrl = 'https://www.6p39k.cn/h5'.$model->id.'.php';
            $return = ['code'=>1,'payUrl'=>$payUrl];
        }else{
            $return = ['code'=>-7];//-7订单错误
        }
        die(json_encode($return));
    }
    /**
     * 微信支付请求发起
     * H5
     */
    public static  function WxOrder($orderNumber,$productName,$amount,$orderId){
        $paramArr = [];
        $paramArr['attach'] = 'weixinh5';
        $paramArr['appid'] = \Yii::$app->params['wxAppId'];
        $paramArr['mch_id'] = Yii::$app->params['wxMchId'];
        $paramArr['nonce_str'] = md5($orderNumber);//随机数
        $paramArr['body'] = $productName;//商品描述
        $paramArr['out_trade_no'] = $orderNumber;//商户订单号
        $paramArr['total_fee'] = $amount*100;;//总金额 金额处理 单位为分
        $paramArr['spbill_create_ip'] = self::getIP();//终端ip
        $paramArr['notify_url'] = Yii::$app->params['wxNotify'];;//回调地址
        $paramArr['trade_type'] = 'MWEB';//交易类型 h5支付 MWEB
        $paramArr['product_id'] = 1;//商品id
        $paramArr['scene_info'] = json_encode(['h5_info'=>['type'=>'Wap','wap_url'=>'http://www.6p39k.cn/ycj.php','wap_name'=>'夺宝传奇']]);//场景信息
        $key = \Yii::$app->params['wxMchKey'];
        //生成签名
        ksort($paramArr);
        $sign = self::signWxpay($paramArr,$key);
        $paramArr['sign'] = $sign;//签名
        //请求支付
        $url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
        //5.拼接成所需XML格式
        $post_data = "<xml> 
            <appid>{$paramArr['appid']}</appid>
            <attach>{$paramArr['attach']}</attach>
            <body>{$paramArr['body']}</body>
            <mch_id>{$paramArr['mch_id']}</mch_id>
            <nonce_str>{$paramArr['nonce_str']}</nonce_str>
            <notify_url>{$paramArr['notify_url']}</notify_url>
            <out_trade_no>{$paramArr['out_trade_no']}</out_trade_no>
            <spbill_create_ip>{$paramArr['spbill_create_ip']}</spbill_create_ip>
            <total_fee>{$paramArr['total_fee']}</total_fee>
            <trade_type>{$paramArr['trade_type']}</trade_type>
            <scene_info>{$paramArr['scene_info']}</scene_info>
            <sign>{$paramArr['sign']}</sign>
            <product_id>{$paramArr['product_id']}</product_id>
          </xml>";

        $return = Methods::post($url,$post_data);
        $return = (array)simplexml_load_string($return, 'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML转换成数组
        if(isset($return['return_code']) && $return['return_code'] == 'SUCCESS' && $return['result_code'] == 'SUCCESS'){
            $payUrl = $return['mweb_url'];
            $redirectUrl = Yii::$app->params['redirect_url'];
            $redirectUrl =urlencode($redirectUrl);
            $payUrl = $payUrl.'&redirect_url='.$redirectUrl."?orderId=".$orderId;
            $data = ['code'=>1,'payUrl'=>$payUrl];//,'msg'=>'支付请求成功'
            //记录签名
            Recharge::updateAll(['paySign'=>$sign,'ip'=>$paramArr['spbill_create_ip']],"id = $orderId");
        }else{
            $data = ['code'=>-6];//,'msg'=>$return['message'] 支付请求错误
        }
        return $data;
    }

    public static function getIP(){
        if($_SERVER['REMOTE_ADDR'])
            $ip = $_SERVER['REMOTE_ADDR'];
        else $ip = "Unknow";
        return $ip;
    }
    /**
     * 微信签名
     * 签名生成
     * @param $signArr
     * md5算法加密 转大写
     */
    public static function signWxpay($signArr,$key){
        $signStr = '';
        foreach($signArr as $k => $v){
            if($v != ''){
                $signStr .= $k.'='.$v.'&';
            }
        }
        $signStr.='key='.$key;
        $signStr = md5($signStr);
        $signStr = strtoupper($signStr);
        return $signStr;
    }

    /**
     * 微信回调
     * 支付结果通知处理
     * 支付宝
     * POST方式
     */
    public function actionWxpayNotify(){
        //获取通知的数据
        $xml = file_get_contents("php://input");
        Recharge::notifyLog($xml,2);
        if(!$xml){
            echo 'fail';die;
        }else{
            $data = (array)simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML转换成数组
        }
        $returnCode = $data['return_code'];//支付状态
        if($returnCode == 'SUCCESS'){
            $amount = $data['total_fee'];//支付金额 单位为分
            $orderNo = $data['out_trade_no'];//商户订单号
            $merOrder = isset($data['transaction_id'])?$data['transaction_id']:'';
            //验证签名
            $result = self::checkWxpaySign($orderNo);
            if($result){
                $amount = $amount/100;//换成元
                $orderData = Recharge::find()->where("orderNumber = '{$orderNo}' and money = $amount")->asArray()->one();
                if($orderData['status'] != 1){//订单未完成
                    Recharge::updateAll(['status'=>1,'merOrder'=>$merOrder],"orderNumber='{$orderNo}'");//修改订单状态
                    //通知服务器处理后续
                    $postData = ['uid'=>$orderData['roleId'],'pay_money'=>$orderData['money'],'ratio'=>$orderData['ratio'],'lucknum'=>$orderData['lucknum'],'server_id'=>$orderData['server_id'],'sign'=>$orderData['sign'],'order_no'=>$orderNo,'ext_info'=>$orderData['extInfo']];
                    $url = \Yii::$app->params['gameServerUrl'];
                    Methods::post($url,$postData);
                }
                $returnArr = ['return_code'=>'SUCCESS','return_msg'=>'OK'];
            }else{
                $returnArr = ['return_code'=>'fail','return_msg'=>'pay sign error'];
            }
        }else{
            $returnArr = ['return_code'=>'fail','return_msg'=>'no data return'];
        }
        $xml = "<xml>
                    <return_code><![CDATA[".$returnArr['return_code']."]]></return_code>
                    <return_msg><![CDATA[".$returnArr['return_msg']."]]></return_msg>
                </xml>";
        return $xml;
    }

    /**
     * 微信
     * 签名验证
     * 回调地址
     * 签名方式
     * 第一步，设所有发送或者接收到的数据为集合M，将集合M内非空参数值的参数按照参数名ASCII码从小到大排序（字典序），使用URL键值对的格式（即key1=value1&key2=value2…）拼接成字符串。
    第二步，在stringA最后拼接上应用key得到stringSignTemp字符串，并对stringSignTemp进行MD5运算，再将得到的字符串所有字符转换为小写，得到sign值signValue。
     */
    public static function checkWxpaySign($orderNumber){
        //查询数据库数据生成签名进行验证
        $orderData = Recharge::find()->where("orderNumber = '{$orderNumber}'")->asArray()->one();
        $paramArr['attach'] = 'weixinh5';
        $paramArr['appid'] = \Yii::$app->params['wxAppId'];
        $paramArr['mch_id'] = Yii::$app->params['wxMchId'];
        $paramArr['nonce_str'] = md5($orderNumber);//随机数
        $paramArr['body'] = $orderData['product'];//商品描述
        $paramArr['out_trade_no'] = $orderNumber;//商户订单号
        $paramArr['total_fee'] = $orderData['money']*100;;//总金额 金额处理 单位为分
        $paramArr['spbill_create_ip'] = $orderData['ip'];//终端ip
        $paramArr['notify_url'] = Yii::$app->params['wxNotify'];;//回调地址
        $paramArr['trade_type'] = 'MWEB';//交易类型 h5支付 MWEB
        $paramArr['product_id'] = 1;//商品id
        $paramArr['scene_info'] = json_encode(['h5_info'=>['type'=>'Wap','wap_url'=>'http://www.6p39k.cn/ycj.php','wap_name'=>'夺宝传奇']]);//场景信息
        $key = \Yii::$app->params['wxMchKey'];
        //生成签名
        ksort($paramArr);
        $sign = self::signWxpay($paramArr,$key);
        $paySign = $orderData['paySign'];
        if($sign ==$paySign){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 输出xml字符
     * @param   $params     参数名称
     * return   string      返回组装的xml
     **/
    public function data_to_xml( $params ){
        if(!is_array($params)|| count($params) <= 0)
        {
            return false;
        }
        $xml = "<xml>";
        foreach ($params as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }
    /**
     * 用户订单页面
     * h5
     * 微信支付
     */
    public function actionWxH5(){
        $orderId = \Yii::$app->request->get('orderId',0);
        if($orderId){
            $order = Recharge::find()->where("id = $orderId")->asArray()->one();
        }else{
            $order = [];
        }
        return $this->renderPartial('h5-pay',['order'=>$order]);
    }
    /**
     * 微信下单
     */
    public function actionWxPay(){
        $orderId = Yii::$app->request->post('orderId',0);
        if($orderId){
            $order = Recharge::findOne($orderId);
            if($order){
                $data = self::WxOrder($order->orderNumber,$order->product,$order->money,$orderId);
            }else{
                $data = ['code'=>0,'message'=>'订单不存在'];
            }
        }else{
            $data = ['code'=>0,'message'=>'参数错误'];
        }
        die(json_encode($data));
    }
    /**
     * 微信支付成功跳转页面
     */
    public function actionH5Success(){
        $orderId = Yii::$app->request->get('orderId',0);
        if($orderId){
            $order = Recharge::find()->where("id = $orderId")->asArray()->one();
        }else{
            $order = [];
        }
        return $this->renderPartial('h5-success',['order'=>$order]);
    }
}