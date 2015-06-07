<?php
	
class Mobile extends M_Controller
{	
	//private $wsdl = 'http://www.webxml.com.cn/WebServices/WeatherWebService.asmx?wsdl';
	//private $wsdl = 'http://webservice.webxml.com.cn/WebServices/ChinaZipSearchWebService.asmx?wsdl';
	private $wsdl = 'http://webservice.webxml.com.cn/WebServices/MobileCodeWS.asmx?wsdl';
	
	public function info()
	{
		$this->load->library('webservice');
		$webService = WebService::getInstance();		
		
		$t = gen_guid();
		echo $t;
		
		die();
		try {
			$webService = new SoapClient($this->wsdl, array('mobile'=>'15889733801'));
			$result = $webService->__getFunctions();
			$result = $webService->getDatabaseInfo();
			//$result = $webService->getMobileCodeInfo('15889733801');
		} 
		catch (Exception $e) {
			json_out( array('status'=>400, 'msg'=>$e->getMessage() ));
		}
	
		var_dump($webService);
		echo '<pre>';
		print_r($result);
		echo '</pre>';
		
	}
	
}