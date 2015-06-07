<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	用户模型
*@Encod:UTF-8
*@Date:	2015-5-23 下午4:12:22 
*@Author:JustPHP@qq.com
*@File:UserModel.php
*/
class UserModel extends M_Model {
	
	public function __construct() {
		parent::__construct();
		$this->table = $this->config->item('user');
		$this->pk_id = 'uid';
	}

	
	/*--------------------------------------------------------------------------------
	* 获取指定username用户的详细信息
	* @Date: 2015-5-24  上午1:32:03
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
	public function getUserByUserName($username) {
		
		$result = array();
		$sql = "SELECT * FROM {$this->table} WHERE username='{$username}' LIMIT 1";
		$queryObj = $this->db->query($sql);
		foreach ($queryObj->result_array() as $row) {
			$result = $row;
		}
		$queryObj=null;
		
		return $result;		
	}
	

	public function getListByPage($current, $page_size=null)
	{
		$result['list'] = array();
		$result['total'] = $this->db->count_all($this->table);
		if ( $result['total']==0 ) {
			return $result;
		}
		
		$page_size = empty($page_size) ? $this->page_size : $page_size;
		$sql = "SELECT * FROM {$this->table} ORDER BY timestamp desc limit {$current}, {$page_size}";
		$queryObj = $this->db->query($sql);
		foreach ($queryObj->result_array() as $row) {
			$result['list'][] = $row;
		}
		$queryObj=null; 

		return $result;
	}
}