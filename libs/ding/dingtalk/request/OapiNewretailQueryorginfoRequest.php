<?php
/**
 * dingtalk API: dingtalk.oapi.newretail.queryorginfo request
 * 
 * @author auto create
 * @since 1.0, 2018.10.15
 */
class OapiNewretailQueryorginfoRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "dingtalk.oapi.newretail.queryorginfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
