<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:微信ocr处理	
*@Encod:UTF-8
*@Date:	2015-6-6 下午5:24:53 
*@Author:JustPHP@qq.com
*@File:WeChat.php
*/
class WeChat extends M_Controller
{
	public function index($type,$result)
	{
		$func = "deal{$type}";
		return $this->$func($result);
	}
	
	/*--------------------------------------------------------------------------------
	* 识别图片上面验证码
	* @Date: 2015-6-7  下午11:47:47
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	private function dealImage($object)
	{
		$this->load->library(array('image', 'wechatapi'));
		$this->load->model('WechatModel');
		
		if( !isset($object->MediaId) || empty($object->MediaId) ) {
			return array('status'=>-1, 'msg'=>$this->lang->line('err_upload') );
		}

		$url = $this->wechatapi->getFileDownUrl($object->MediaId);
		$file_name = gen_guid();//图片名称为guid码
		$result = $this->image->getImage($url, SAVE_DIR, $file_name.PIC_SUFFIX);
		if ( $result['code'] != UPLOAD_IMG_SUCCESS ) {
			return array('status'=>-2, 'msg'=>$this->lang->line('err_download'));
		}
		
		//循环5次查询ocr识别结果 每次休眠1s
		for ($i = 0; $i < 5; $i++) {
			sleep(1);
			$ret = $this->WechatModel->getOne($file_name);
			if( $ret && is_array($ret) ) {
				break;
			}
		}
		
		if( empty($ret) ) {
			return array('status'=>-3, 'msg'=>$this->lang->line('err_check'));
		}
		
		$succ_check = $this->lang->line('succ_check');
		$last_check_time = empty($ret['timestamp']) ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s', $ret['timestamp']);
		return array('status'=>1, 'msg'=>sprintf($succ_check, $ret['code'], $ret['times'], $last_check_time) );
	}
	
	
	
	private function dealText($object)
	{
		$content = trim($object->Content);
		if( empty($content) ) {
			return array('status'=>-1, 'msg'=>$this->lang->line('err_empty'));
		}
		$pattern = "/^[A-Z|0-9]{16}$/";
		//文本验证码
		if( preg_match($pattern, $content) ) {
			
		}
		//
		else {
			
		}
		
		return array('status'=>2, 'msg'=>$content);
		
	}
	
	
	private function dealEvent($object)
	{
		return array('status'=>2, 'msg'=>'');
	}
	
	
	private function dealLink($object)
	{
		return array('status'=>2, 'msg'=>'');
	}
	
}