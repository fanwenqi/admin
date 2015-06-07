<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	微信数据处理模型
*@Encod:UTF-8
*@Date:	2015-6-6 下午1:27:36 
*@Author:JustPHP@qq.com
*@File:WechatModel.php
*/
class WechatModel extends M_Model
{
	private $orc_db=null;
	
	public function __construct() 
	{
		parent::__construct();
		$this->table = $this->config->item('t_code');
		$this->pk_id = 'id';
		$this->orc_db = $this->load->database('ocr', TRUE);
	
	}

	public function getOne($pk_id)
	{
		$result = array();
		
		$query_obj = $this->orc_db->get_where($this->table, array("{$this->pk_id}" => $pk_id));
		foreach ($query_obj->result_array() as $row) {
			$result = $row;
		}
		$query_obj=null;
		
		return $result;		
	}
	
}