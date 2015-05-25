<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	
*@Encod:UTF-8
*@Date:	2015-5-23 下午3:55:36 
*@Author:JustPHP@qq.com
*@File:SigninController.php
*/
class SigninController extends M_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
	}
	
	/*--------------------------------------------------------------------------------
	* 用户登录
	* @Date: 2015-5-24  上午1:22:32
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function actionLogin() {
	
		$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
		if( empty($session_token) || empty($_POST) ) {
			$_SESSION['token'] = $data['token'] = get_token();
			$this->load->view('signin/login', $data);
		}
		else {
			$param = isset($_POST['param']) ? $_POST['param'] : array();			
			$_SESSION['token'] = null;
			if ( empty($param) || $session_token != $param['token'] ) {
				json_out( array('status'=>501, 'msg'=>'invalid login') );
			}	
			
			$user = $this->UserModel->getUserByUserName($param['username']);
			if ( empty($user) || $user['password'] != get_pwd($param['password']) ) {
				json_out( array('status'=>502, 'msg'=>'wrong login') );
			}
			
			$this->user = $user;
			redirect('welcome/index', 'refresh');
		}
	}
	
	
	/*--------------------------------------------------------------------------------
	* 退出登录
	* @Date: 2015-5-25  上午12:27:31
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function actionLoginOut() {
		
		$this->user = null;
		session_destroy();
		redirect('signin/login', 'refresh');
	}

}