<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define('ADMIN', 1);
define('SECRET', 'wechat7363#2@%ijdk');


//微信参数
define('APPID', 'wxae65de367d88fce6');
define('APPSECRET', 'af9536089a70d96ca8f94d61e07466a7');
define('URL', 'http://www.upsaonian.net/wx.php?app=index');
define('TOKEN', 'weixin');
define('ACCESSURL', 'https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid={$appid}&corpsecret={$appSecret}');

//微信上传图片默认保存目录
define('SAVE_DIR', '/usr/share/ocr/src/');
//微信上传图片默认后缀名
define('PIC_SUFFIX', '.jpg');


//WebService接口
define('WSDL', 'http://webservice.webxml.com.cn/WebServices/MobileCodeWS.asmx?wsdl');
define('CALLBACK', 'callback');

//转移微信上传图片值本地服务器成功状态位
define('UPLOAD_IMG_SUCCESS', 0);



