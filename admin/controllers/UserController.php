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
	public function __construct() {
		
		parent::__construct();
		$this->load->model('UserModel');
	}
	
	/*--------------------------------------------------------------------------------
	* 获取用户列表
	* @Date: 2015-5-25  上午12:29:56
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function actionList() {
	
		$data = $this->UserModel->getListByPage(0);
	
		$this->load->library('pagination');
		$config['base_url'] = site_url('user/list');
		$config['total_rows'] = $data['total'];
		$config['per_page'] = 1;
		$data['page'] = $this->pagination->showPage($config);
		
		$this->load->view('user/list', $data);
	}
	
	
	/*--------------------------------------------------------------------------------
	* 添加用户
	* @Date: 2015-5-25  上午12:38:14
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function actionAdd() {
		
		$param = $this->_getParam();
		$param['timestmap'] = time();
		$param['password'] = get_pwd($param['password']);
		
		$boolean = $this->UserModel->insert($param);
	
		redirect('user/list', 'refresh');
	}
	
	
	
	public function actionUpdate() {
		
		$param = $this->_getParam();
		$pk_id = $param['uid']; unset($param['uid']);
		
		return $this->UserModel->update($param , $pk_id);
	}
	
}