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
			$_SESSION['token'] = $data['token'] = md5(uniqid().TOKEN);
			$this->load->view('signin/login', $data);
		}
		else {
			$this->load->library('form_validation');
			$param = isset($_POST['param']) ? $_POST['param'] : array();
			
			$config = array(
					array(
							'field'   => 'username',
							'rules'   => 'required'
					),
					array(
							'field'   => 'password',
							'rules'   => 'required'
					)
			);
			
			$this->form_validation->set_rules($config);
			
			$_SESSION['token'] = null;
			if ( empty($param) || $session_token != $param['token'] ) {
				json_out( array('status'=>501, 'msg'=>'invalid login') );
			}	
			
			$this->load->model('UserModel');
			$user = $this->UserModel->getUserByUserName($param['username']);
			if ( empty($user) || $user['password'] != $param['password'] ) {
				json_out( array('status'=>502, 'msg'=>'wrong login') );
			}
			
			$_SESSION['user'] = $user;
			redirect('welcome/index', 'refresh');
		}
	}
	
}