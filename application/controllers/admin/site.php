<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//开启session_start 展会后台控制器
session_start();
//后台管理员权限判断
class site extends CI_Controller {
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
			die("您还没有登录");
			//echo "<script>alert('请登录成功');location='http://192.168.1.188/stone/company'</script>";
		}
	}

	public function passwd_edit(){
		$this->load->view("right/passwd_edit");
	}
	
	
	public function passwd_save(){
		$post=$this->input->post();
		if(strlen($post['passwd'])>=6){
			$this->db->where("usrname","admin");
			if($this->db->update($this->prefix.'admin', array("password"=>md5($post['passwd']."stone.tm")))){
				$this->message("成功");
			}
		}else{
			$this->message("您输入的密码小于六位");	
		}
	}


	public function information_edit(){
		$data['query']=$this->db->get($this->prefix."information")->result_array();
		$this->load->view("right/information_edit",$data);
	}
	
	
	public function information_save(){
		$info=$this->db->get($this->prefix."information")->result_array();
		$post=$this->input->post();
		if(!empty($info)){
			if($this->db->update($this->prefix."information",$post)){
				$this->message("更新成功");	
			}	
		}else{
			if($this->db->insert($this->prefix."information",$post)){
				$this->message("插入成功");
			}	
		}
		//$this->load->view("right/information_edit");
	}
	

	public function message($message,$num=-1){
		echo "<script>
					if(confirm('".$message."')){
						history.go(".$num.");
					}
				</script>";
	}
	
	
}
