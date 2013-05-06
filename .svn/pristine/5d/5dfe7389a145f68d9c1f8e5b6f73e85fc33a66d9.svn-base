<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conn {
	//获取服务器环境信息
	public function con()
	{
		$arr=array();
		//系统
		$arr['xitong']=php_uname('s');
		//服务器
		$arr['fuwuqi']=php_sapi_name();
		//php版本
		$arr['banben']=PHP_VERSION;
		//数据库
		$arr['mydb']=mysql_get_server_info();
		//服务器最大上传
		$arr['size']=ini_get('upload_max_filesize');
		return $arr;
	}
	 
	 
}

