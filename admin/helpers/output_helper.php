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
		die( json_encode($array));
	}
}


if ( ! function_exists('get_token'))
{
	function get_token()
	{
		return md5(uniqid().TOKEN);
	}
}


if ( ! function_exists('get_pwd'))
{
	function get_pwd($pwd)
	{
		return md5($pwd.TOKEN);
	}
}