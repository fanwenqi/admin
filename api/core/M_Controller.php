<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:自定义核心控制器类	
*@Encod:UTF-8
*@Date:	2015-5-23 下午4:18:39 
*@Author:JustPHP@qq.com
*@File:M_Controller.php
*/
class M_Controller extends CI_Controller
{
	protected $user = null;

		
	public function __construct(){	
			
		parent::__construct();		
		//self::_checkIsOnline();
	}
	
	
	/*--------------------------------------------------------------------------------
	* 检查当前用户是否登录
	* @Date: 2015-5-25  上午12:14:46
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	protected function _checkIsOnline() {
		
		if ( $this->user ) {
			return true;
		}
		
		session_destroy();
		$this->user = null;
		
		redirect('signin/login', 'refresh');
	}
	
	 
	
	protected function _getParam() {
		
		return $_POST['param'];
	}
}