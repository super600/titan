<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class user_alert{
	/*
	 * 用户权限判断($uid, $shell, $m_id)
	 */
	public function __construct() {

	}

	//刷新session

	
	public function get_user_shell() {

		if (isset($_SESSION['log'])) {

			$ci = &get_instance();
			$ci -> db -> where('login_name', $_SESSION['username']);
			$ci -> db -> where('password', $_SESSION['password']);
			$query = $ci -> db -> get('sys_user');
			if ($query -> num_rows() > 0) {
				$row = $query -> row_array();
				$_SESSION['ontime'] = strtotime(date('Y-m-d h:i:s'));
				return $row;
			} else {
				return null;

			}
		}
	}

	//权限验证(老方法)
	public function get_user_shell_check($m_id = 1) {

		$this -> get_user_ontime($long = '3600');
		if ($row = $this -> get_user_shell()) {
			if ($row['group_id'] <= $m_id) {

				//return $row;
			} else {
				echo "你无权限操作！";
				exit();
			}
		} else {

			$this -> get_admin_msg('admin/sysadmin/log', '请先登陆');

		}
	}

	//验证是否登录

	public function is_login() {
		if (!empty($_SESSION['log'])) {
			$this -> get_user_ontime($long = '3600');
		} else {
			$this -> get_admin_msg('admin/sysadmin/login', '请先登陆!');
		}
	}

	//新方法权限验证

	//返回提示

	public function get_user_shell_back($m_id = 1) {

		$this -> get_user_ontime($long = '3600');

		$str = $_SESSION['shell'];

		$row = preg_split('/[\s,;]+/', $str);

		//$row=explode(',', $str);

		if (in_array($m_id, $row)) {

		} else {

			echo "你无权限操作！";

			exit();
		}

	}

	//返回状态值

	public function get_user_shell_turn($m_id = 1) {

		$this -> get_user_ontime($long = '3600');

		$str = $_SESSION['shell'];

		$row = preg_split('/[\s,;]+/', $str);

		//$row=explode(',', $str);

		if (in_array($m_id, $row)) {

		} else {

			return 'x';

		}

	}

	/*
	 * 用户登陆超时时间(秒)
	 */
	public function get_user_ontime($long = '3600') {
		$new_time = strtotime(date('Y-m-d h:i:s'));
		if (!empty($_SESSION['ontime'])) {
			$onlinetime = $_SESSION['ontime'];
			if ($new_time - $onlinetime > $long) {
				echo "登录超时";
				//针对 当前用户
				session_destroy();
				exit();
			} else {
				$_SESSION['ontime'] = strtotime(date('Y-m-d h:i:s'));
			}
		} else {
			$this -> get_admin_msg('admin/sysadmin/log', '请先登陆');
		}
	}

	/*
	 * 用户退出登陆
	 */
	public function get_user_out() {
		// session_start();
		session_destroy();
		$this -> get_admin_msg('admin/sysadmin', '退出成功！');
	}

	/*
	 * 操作后提示 用于后台
	 */
	public function get_admin_msg($url, $show = '操作已成功！') {
		$msg = '<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml"><head>
				<meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" href="css/common.css" type="text/css" />
				<meta http-equiv="refresh" content="2; url=' . site_url($url) . '" />
				<title>管理区域</title>
				</head>
				<body>
				<div id="man_zone">
				  <table width="30%" border="1" align="center"  cellpadding="3" cellspacing="0" class="table" style="margin-top:100px;">
				    <tr>
				      <th align="center" style="background:#faffde"><font color="#808080">信息提示</font></th>
				    </tr>
				    <tr>
				      <td align="center" style=" font-size:12px;"><br/>' . $show . '<br />
				     <br />
				      如果浏览器无法跳转，<a href="' . site_url($url) . '">请点击此处</a><br />
				     <br /><br />
				     </td>
				    </tr>
				  </table>
				</div>
				</body>
				</html>';
		echo $msg;
		exit();
	}

	//操作完成后返回前一个步骤
	public function show_and_backone($show = '操作已成功！') {
		$msg = '<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml"><head>
                <script type="text/javascript">setTimeout("history.go(-1)",2000);</script>
                <link rel="stylesheet" href="css/common.css" type="text/css" />
                <script type="text/javascript"></script>
                <title>管理区域</title>
                </head>
                <body>
                <div id="man_zone">
                  <table width="30%" border="1" align="center"  cellpadding="3" cellspacing="0" class="table" style="margin-top:100px;">
                    <tr>
                      <th align="center" style="background:#faffde"><font color="#808080">信息提示</font></th>
                    </tr>
                    <tr>
                      <td align="center" style=" font-size:12px;"><br/>' . $show . '<br />
                     <br />
                      如果浏览器无法跳转，<a href="javascript:setTimeout("history.go(-1)",2000);">请点击此处</a><br />
                     <br /><br />
                     </td>
                    </tr>
                  </table>
                </div>
                </body>
                </html>';
		echo $msg;
		exit();
	}

	//操作完成后返回前两个步骤
	public function show_and_back($show = '操作已成功！', $tempFlag = '-2') {

		$msg = '<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml"><head>
                <script type="text/javascript">setTimeout("history.go(' . $tempFlag . ')",2000);</script>
                <link rel="stylesheet" href="css/common.css" type="text/css" />
                <script type="text/javascript"></script>
                <title>管理区域</title>
                </head>
                <body>
                <div id="man_zone">
                  <table width="30%" border="1" align="center"  cellpadding="3" cellspacing="0" class="table" style="margin-top:100px;">
                    <tr>
                      <th align="center" style="background:#faffde"><font color="#808080">信息提示</font></th>
                    </tr>
                    <tr>
                      <td align="center" style=" font-size:12px;"><br/>' . $show . '<br />
                     <br />
                      如果浏览器无法跳转，<a href="javascript:setTimeout("history.go(' . $tempFlag . ')",2000);">请点击此处</a><br />
                     <br /><br />
                     </td>
                    </tr>
                  </table>
                </div>
                </body>
                </html>';
		echo $msg;
		exit();
	}

}
