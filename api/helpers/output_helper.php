<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Security Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/security_helper.html
 */

// ------------------------------------------------------------------------
if ( ! function_exists('json_out'))
{
	function json_out($array)
	{	
		if( is_string($array) ) {
			die( $array );
		}
		else {
			die( json_encode($array));
		}
	}
}


if ( ! function_exists('get_token'))
{
	function get_token()
	{
		return md5(uniqid().SECRET);
	}
}


if ( ! function_exists('get_pwd'))
{
	function get_pwd($pwd)
	{
		return md5($pwd.SECRET);
	}
}


if ( ! function_exists('get_status'))
{
	function get_status($status_code)
	{
		$status_arr = array(0=>'未审核', 1=>'已审核');
		return $status_arr[$status_code];
	}
}


if ( ! function_exists('gen_guid') ) {
	function gen_guid()
	{
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(APPID, true)));
		$hyphen = chr(45);// "-"
		$uuid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);
		return $uuid;	
	}
}


