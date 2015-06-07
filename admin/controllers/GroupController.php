<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	群组控制器
*@Encod:UTF-8
*@Date:	2015-5-25 下午11:57:09 
*@Author:JustPHP@qq.com
*@File:GroupController.php
*/
class GroupController extends M_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('GroupModel');
	}
	
	
	
	/*--------------------------------------------------------------------------------
	* 获取用户列表
	* @Date: 2015-5-25  上午12:29:56
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function actionList() {
		
		$page_size = $this->GroupModel->page_size;
		$cur_page = $this->uri->segment(3) * $page_size;
		$data = $this->GroupModel->getListByPage($cur_page, $page_size);
		
		$this->load->library('pagination');			
		$config['base_url'] = site_url('user/list');
		$config['total_rows'] = $data['total'];
		$config['per_page'] = $page_size;
		$data['page'] = $this->pagination->showPage($config);
		
		$this->load->view('group/list1', $data);
	}
	
	
	
	public function actionCheck() {
		
		$pk_id = $this->uri->segment(3);
		$param['status'] = 1;
		
		if( $this->GroupModel->update($param, $pk_id) ) {
			redirect('group/list', 'refresh');
		}
		return false;
	}
	
	public function actionAdd() {
		
		$this->load->view('group/add');
	}
	
}

?>