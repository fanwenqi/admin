<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	微信接口处理类
*@Encod:UTF-8
*@Date:	2015-5-27 下午11:31:36 
*@Author:JustPHP@qq.com
*@File:M_WeChatResponse.php
*/
class WechatHandle 
{
	private $CI=null;
	
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	
	/*--------------------------------------------------------------------------------
	* 各类事件处理
	* @Date: 2015-5-27  下午11:37:19
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function handleEvent($object, $array=array())
	{
		$content = "";
		switch ($object->Event) {
			case "subscribe":
				$content = $this->CI->lang->line('subscribe');
				break;
			case "unsubscribe":
				$content = $this->CI->lang->line('unsubscribe');
				break;
			case "VIEW":
				$content = $this->CI->lang->line('view').$object->EventKey;
				break;
			default:
				$content = $this->CI->lang->line('default').$object->Event;
				break;
		}
		$result =$this->transmitText($object, $content);

		return $result;
	}
	
	/*--------------------------------------------------------------------------------
	* 文本消息处理
	* @Date: 2015-5-27  下午11:39:00
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function handleText($object, $array=array())
	{
		$content = $this->CI->lang->line('defaultText').$array['msg'];	
		$result = $this->transmitText($object, $content);
	
		return $result;
	}	

	
	/*--------------------------------------------------------------------------------
	* 图片消息处理
	* @Date: 2015-5-27  下午11:39:37
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function handleImage($object, $array=array())
	{
		//$content = array("MediaId"=>$object->MediaId);
		//$result = $this->transmitImage($object, $content);		
		return $this->transmitText($object, $array['msg']);
	}	
	
	
	/*--------------------------------------------------------------------------------
	* 语言处理
	* @Date: 2015-5-27  下午11:41:05
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function handleVoice($object, $array=array())
	{
		if (isset($object->Recognition) && !empty($object->Recognition)) {
			$content = $this->CI->lang->line('defaultVoice').$object->Recognition;
			$result = $this->transmitText($object, $content);
		} else {
			$content = array("MediaId"=>$object->MediaId);
			$result = $this->transmitVoice($object, $content);
		}
	
		return $result;
	}	
	
	
	/*--------------------------------------------------------------------------------
	* 文本链接处理
	* @Date: 2015-5-27  下午11:41:45
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function handleLink($object, $array=array())
	{
		$content = $this->CI->lang->line('linkTitle').$object->Title;
		$content .= $this->CI->lang->line('linkContent').$object->Description;
		$content .= $this->CI->lang->line('linkUrl').$object->Url;
	
		$result = $this->transmitText($object, $content);
		return $result;
	}	

	
	//回复文本消息
	public function transmitText($object, $content)
	{
		$xmlTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			</xml>";
	
		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);
		return $result;
	}
	
	//回复图片消息
	private function transmitImage($object, $imageArray)
	{
		$itemTpl = "<Image>
			<MediaId><![CDATA[%s]]></MediaId>
			</Image>";
		$item_str = sprintf($itemTpl, $imageArray['MediaId']);
	
		$xmlTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[image]]></MsgType>
		$item_str
		</xml>";
	
		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
		return $result;
	}
	
	//回复语音消息
	private function transmitVoice($object, $voiceArray)
	{
		$itemTpl = "<Voice>
			<MediaId><![CDATA[%s]]></MediaId>
			</Voice>";
		$item_str = sprintf($itemTpl, $voiceArray['MediaId']);
	
		$xmlTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[voice]]></MsgType>
		$item_str
		</xml>";

		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
		return $result;
	}
	
	//回复图文消息
	private function transmitNews($object, $newsArray)
	{
		if(!is_array($newsArray)){
			return;
		}
		$itemTpl = "<item>
			<Title><![CDATA[%s]]></Title>
			<Description><![CDATA[%s]]></Description>
			<PicUrl><![CDATA[%s]]></PicUrl>
			<Url><![CDATA[%s]]></Url>
			</item>
			";
		$item_str = "";
		foreach ($newsArray as $item) {
			$item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
		}
		$xmlTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[news]]></MsgType>
		<ArticleCount>%s</ArticleCount>
		<Articles>
		$item_str</Articles>
		</xml>";
	
		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
		return $result;
	}
	
	//回复多客服消息
	private function transmitService($object)
	{
		$xmlTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[transfer_customer_service]]></MsgType>
			</xml>";
		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
		return $result;
	}	
}

?>
