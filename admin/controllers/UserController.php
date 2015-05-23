<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	
*@Encod:UTF-8
*@Date:	2015-5-23 下午3:55:08 
*@Author:JustPHP@qq.com
*@File:UserController.php
*/
class UserController extends M_Controller 
{
	public function actionIndex() {		
		$this->load->model('UserModel');
		$this->load->library('session');
		
		var_dump($this->session->userdata('uid'));
		
		$result = $this->UserModel->getUserById(1);
		if( empty($result) ) {
			
		}
		$_SESSION['user'] = $result;
		
		//echo "<pre>";var_dump($result);echo "</pre>";
	}

	

	
	
}