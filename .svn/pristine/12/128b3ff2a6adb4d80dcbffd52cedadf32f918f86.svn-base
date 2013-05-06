<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//开启session_start
session_start();
//后台管理员权限判断
class Mlogin_user extends CI_Controller {
	public function __construct() {// session_start();
		parent::__construct();

		$this -> load -> model('admin/public_model');
	}

	//验证用户名，密码和验证码是否正确

	public function index() {
		
		$user=$this->input->post("username");
		$pass=$this->input->post("password");
		
		$checkcode = $this -> input -> post('checkcode');
		//转换大写
		$checkcode = strtoupper($checkcode);
		//检查验证码
		
		if ($_SESSION['randcode'] == $checkcode) {
			
			if ($this -> public_model -> check_user($user,$pass)) {
				//$row = $this -> msys_user -> sys_login();
				//$arr = $this -> msys_user -> sys_shells($row['group_id']);

				$str = $user . $pass;
				$_SESSION['log'] = md5($str);
				//$_SESSION['username'] = $row['login_name'];
				//$_SESSION['password'] = $row['password'];
				//$_SESSION['shell'] = $arr['modular_id'];
				//$_SESSION['role'] = $row['group_id'];
				$_SESSION['ontime'] = strtotime(date('Y-m-d h:i:s'));
				$url = 'admin/sysadmin/index';
				$this -> user_alert -> get_admin_msg($url, $show = '登录成功！');
			} else {
				$url = 'admin/sysadmin/login';
				$this -> user_alert -> get_admin_msg($url, $show = '用户名或密码错误！');
			}
		} else {
			$url = 'admin/sysadmin/login';
			$this -> user_alert -> get_admin_msg($url, $show = '验证码错误！');

		}

	}

	//退出登陆
	public function unlogin(){
		unset($_SESSION['ontime']);
		$this->user_alert->get_user_out();
		$this->user_alert->get_admin_msg(base_url());
	}


}
