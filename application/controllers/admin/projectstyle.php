<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//开启session_start 展会后台控制器
session_start();
//后台管理员权限判断
class projectstyle extends CI_Controller {
	var $prefix='titan_';
	public function __construct() {// session_start();
		parent::__construct();
		
		$this->load->database();
//$this -> load -> model('admin/old_model');
		
		header("content-type: text/html; charset=utf-8");
		if(isset($_SESSION['ontime'])){
			//if((time()-$_SESSION['ontime'])>3600){
				//die("请重新登录");
			//}
		}else{
			//echo base_url();
			
			die("您还没有登录");
			//echo "<script>alert('请登录成功');location='http://192.168.1.188/stone/company'</script>";
		}
	}

	//工程案例风格列表
	public function list_($page=0){
		$pagesize = 15;
		$total = $this -> db -> count_all($this->prefix.'project');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get($this->prefix."project")->result_array();		
		//var_dump($data['query']);
		$baseurl = site_url("admin/projects/list_");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		
				$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('right/projectsstyle_list', $data);
	}
	
	//工程案例风格添加
	public function add_($page=0){
	    $pagesize = 15;
		$total = $this -> db -> count_all($this->prefix.'project');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get($this->prefix."project")->result_array();		
		//var_dump($data['query']);
		$baseurl = site_url("admin/projects/list_");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		
		$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('right/projectsstyle_add',$data);
	}
	
	public function edit_($id=null){
		$this -> load -> view('right/edit');
	}
	
	public function del_($id=null){
		
	}
	
	public function message($num=-1,$message){
		echo "<script>
					if(confirm('".$message."')){
						history.go(".$num.");
					}
				</script>";
	}
	
	
}
