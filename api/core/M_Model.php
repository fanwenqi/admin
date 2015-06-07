<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	自定义核心模型类
*@Encod:UTF-8
*@Date:	2015-5-23 下午4:09:58 
*@Author:JustPHP@qq.com
*@File:M_Model.php
*/
class M_Model extends CI_Model {
	
	protected $table;	
	protected $pk_id;
	public $page_size=20;
	
	
	/*--------------------------------------------------------------------------------
	* 获取单挑记录
	* @Date: 2015-5-24  下午10:40:21
	* @Author: JustPHP@qq.com
	* @variable: $pk_id-int
	* @Return: array
	*/
	public function getOne($pk_id) {
		
		$result = array();
		
		$query_obj = $this->db->get_where($this->table, array("{$this->pk_id}" => $pk_id));		
		foreach ($query_obj->result_array() as $row) {
			$result = $row;	
		}
		$query_obj=null;
		
		return $result;
	}

	
	/*--------------------------------------------------------------------------------
	* 根据条件获取记录数
	* @Date: 2015-5-24  下午10:56:46
	* @Author: JustPHP@qq.com
	* @variable: $param-array
	* @Return:
	*/
	public function getAll($param) {

		$result = array();
		
		$param['field'] = is_array($param['field']) ? implode(',', $param['field']) : $param['field'];
		$this->db->select($param['field']);
		is_array($param['condition']) && $this->db->where($param['condition']);
		$query_obj = $this->db->get($this->table);

		foreach ($query_obj->result_array() as $row) {
			$result[] = $row;
		}
		$query_obj=null;
		
		return $result;
	}
	
	
	/*--------------------------------------------------------------------------------
	* 插入记录
	* @Date: 2015-5-24  下午10:59:10
	* @Author: JustPHP@qq.com
	* @variable: $param-array
	* @Return:
	*/
	public function insert($param) {
		
		return $this->db->insert($this->table, $param); 
	}
	
	
	/*--------------------------------------------------------------------------------
	* 更新记录
	* @Date: 2015-5-24  下午11:01:34
	* @Author: JustPHP@qq.com
	* @variable: $param-array | $pk_id-int
	* @Return:
	*/
	public function update($param, $pk_id) {
		
		return $this->db->update($this->table, $param, array("{$this->pk_id}" => $pk_id));
	}
	
	
	/*--------------------------------------------------------------------------------
	* 删除记录
	* @Date: 2015-5-24  下午11:03:05
	* @Author: JustPHP@qq.com
	* @variable: $pk_id-int
	* @Return:
	*/
	public function delete($pk_id) {
		
		return $this->db->delete($this->table, array("{$this->pk_id}" => $pk_id));
	}
	
	
	/*--------------------------------------------------------------------------------
	* 分页获取记录
	* @Date: 2015-5-25  下午11:58:53
	* @Author: JustPHP@qq.com
	* @variable
	* @Return:
	*/
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