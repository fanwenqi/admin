<?php
	
class Rbac {

	public function __construct() {
		;
	}

	/*--------------------------------------------------------------------------------
	* 验证uid是否有权限
	* @Date: 2015-5-23  下午10:02:00
	* @Author: JustPHP@qq.com
	* @variable: $uid-int
	* @Return:boolean
	*/
	public function isAccess($uid) {
		
		
		$this->load->model('UserModel');
		$user = $this->UserModel->getUserById($uid);
		if( $user['gid'] == ADMIN ) {
			return true;
		}
		
		
		
	}
	
}