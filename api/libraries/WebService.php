<?php

class WebService 
{
	public static $instance=null;
	
	public $web_service=null;
	
	public static function getInstance() 
	{		
		if( empty(self::$instance) ) {
			self::$instance = new self();
			self::$instance->init();
		}
		
		return self::$instance;
	}

	
	/*--------------------------------------------------------------------------------
	* 函数用途描述
	* @Date: 2015-5-29  上午12:32:50
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function init() 
	{		
		try {
			$this->web_service = new SoapClient(WSDL, array('soap_version'=>SOAP_1_1));			
		} catch (Exception $e) {
			json_out( array('status'=>501, 'msg'=>$e->getMessage()) );
		}
	}
	
	
	/*--------------------------------------------------------------------------------
	* 函数用途描述
	* @Date: 2015-5-29  上午12:39:24
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function callBack($img_url=null) 
	{	
		$remote_func = CALLBACK;
		try {
			$result = $this->web_service->{$remote_func}($img_url);
		} catch (Exception $e) {
			json_out( array('status'=>502, 'msg'=>$e->getMessage()));
		}	
		
		return $result;
	}
	
}

?>