<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@Desc:	tool_helper
*@Encod:UTF-8
*@Date:	2015-6-7 上午7:49:35 
*@Author:JustPHP@qq.com
*@File:tool_helper.php
*/
// ------------------------------------------------------------------------
if ( ! function_exists('import'))
{
	function import($moduleName,$className)
	{
		global $application_folder;
		
		$absolute_path = $application_folder.'/'.strtolower($moduleName).'/'.$className.'.php';
		if( !file_exists($absolute_path) ) {
			die("{$moduleName}-{$className} not exists!");
		}
		
		include $absolute_path;
	}
}