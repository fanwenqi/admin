<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	节点模型
*@Encod:UTF-8
*@Date:	2015-5-24 下午11:12:11 
*@Author:JustPHP@qq.com
*@File:NodeModel.php
*/
class NodeModel extends M_Model
{
	public function __construct() {
		parent::__construct();
		$this->table = $this->config->item('node');
		$this->pk_id = 'nid';
	}
	
}