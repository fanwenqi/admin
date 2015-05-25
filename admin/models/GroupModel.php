<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	用户群组模型
*@Encod:UTF-8
*@Date:	2015-5-24 下午5:37:04 
*@Author:JustPHP@qq.com
*@File:GroupModel.php
*/	
class GroupModel extends M_Model
{
	public function __construct() {
		parent::__construct();
		$this->table = $this->config->item('group');
		$this->pk_id = 'gid';
	}

}