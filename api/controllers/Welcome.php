<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	微信公众号入口
*@Encod:UTF-8
*@Date:	2015-6-6 下午12:37:34 
*@Author:JustPHP@qq.com
*@File:Welcome.php
*/
class Welcome extends M_Controller 
{
	/*--------------------------------------------------------------------------------
	* 微信入口
	* @Date: 2015-6-6  下午1:04:24
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function index()
	{			
		if ( !isset($_GET['echostr']) ) {
			$this->responseMsg();
		}else{
			$this->valid();
		}
	}
	
	/*--------------------------------------------------------------------------------
	* 验证处理
	* @Date: 2015-6-6  下午1:02:19
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function valid()
	{
		$param_arr = array('echostr', 'signature', 'timestamp');
		$tmpArr = array(TOKEN, $_GET["timestamp"], $_GET["nonce"]);
		sort($tmpArr);
		$tmpStr = sha1( implode($tmpArr) );
		if( $tmpStr == $_GET["signature"] ) {
			json_out( $_GET["echostr"] );
		}
	}
	
	/*--------------------------------------------------------------------------------
	* 微信消息处理
	* @Date: 2015-6-6  下午1:02:54
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function responseMsg()
	{
		$postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS["HTTP_RAW_POST_DATA"] : '';
		if ( !empty($postStr) ) {
			$this->logger("R ".$postStr);
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$type = trim($postObj->MsgType);	
			$allow_type = array('event', 'text', 'image', 'link');	
			if( in_array($type, $allow_type) ) {
				//微信返回数据处理
				import('controllers', 'WeChat');
				$wechat = new WeChat();
				$result = $wechat->index($type, $postObj);
				
				//将结果返回给微信
				$function = "handle{$type}";
				$result = $this->wechathandle->$function($postObj, $result);
			}else {
				$result = "unknown msg type: ".$type;
			}
			$this->logger("T ".$result);
			json_out($result);
		}else {
			json_out( $this->lang->line('notSupport') );
		}
	}	
	
	/*--------------------------------------------------------------------------------
	* 微信消息调试
	* @Date: 2015-6-6  下午1:03:23
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function logger($log_content)
	{
		if( isset($_SERVER['HTTP_APPNAME']) ){   //SAE
			sae_set_display_errors(false);
			sae_debug($log_content);
			sae_set_display_errors(true);
		}else if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ //LOCAL
			$max_size = 10000;
			$log_filename = date('Ymd')."log.xml";
			if( file_exists($log_filename) &&
			(abs(filesize($log_filename) ) > $max_size) )
			{
				unlink($log_filename);
			}
				
			file_put_contents($log_filename, date('H:i:s')." ".$log_content."\r\n", FILE_APPEND);
		}
	}	
}
