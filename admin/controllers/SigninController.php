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
	* 函数用途描述
	* @Date: 2015-5-23  下午3:38:09
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function actionIndex()
	{

		var_dump( $this->config->item('user') );
		
		$this->load->view('signin/index');
	}
	
}