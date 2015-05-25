<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	权限模型
*@Encod:UTF-8
*@Date:	2015-5-24 下午11:13:08 
*@Author:JustPHP@qq.com
*@File:AccessModel.php
*/
class AccessModel extends M_Model
{
	public function __construct() {
		parent::__construct();
		$this->table = $this->config->item('access');
		$this->pk_id = 'aid';
	}	
	
}