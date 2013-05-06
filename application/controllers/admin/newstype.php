<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//开启session_start 展会后台控制器
session_start();
//后台管理员权限判断
class newstype extends CI_Controller {
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
		$total = $this -> db -> count_all($this->prefix.'news_type');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get($this->prefix."news_type")->result_array();		
		//var_dump($data['query']);
		$baseurl = site_url("admin/projects/list_");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		
		$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('right/newstype_list', $data);
	}
	
	//工程案例风格添加
	public function add_($page=0){
	    //$pagesize = 15;
		//$total = $this -> db -> count_all($this->prefix.'news_type');
		//$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		//$this -> db -> limit($pagesize, $offset);
		//$data['query']=$this -> db -> get($this->prefix."news_type")->result_array();		
		//var_dump($data['query']);
		//$baseurl = site_url("admin/projects/list_");
		//$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		
		//$data['pagination'] = $pages['pagination'];
		//$data['page'] = $pages['stspage'];
		$data['dbtype']="save";
		$this -> load -> view('right/newstype_add',$data);
	}
	
	
	public function save_(){
	$post=$this->input->post();
	$post['time']=time();
	if($this->db->insert($this->prefix."news_type",$post)){
	$this->message("成功");
	}
		//$data['pagination'] = $pages['pagination'];
		//$data['page'] = $pages['stspage'];
		//$this -> load -> view('right/projects_add', $data);
	}
	
	public function edit_($id=null){
	    //$data['projecttype']=$this->db->get($this->prefix."news_type")->result_array();
		//var_dump($data['projecttype']);
		//$arr= array();
		//$arr[0]="--请选择--";
		//foreach($data['projecttype'] as $k =>$v){
			//array_push($arr,array($v['id']=>$v['title']));
			//$arr[$v['id']]=$v['title'];
		//}
	    $data['dbtype']='update';
		//$data['options']=$arr;
		$this->db->where("id",$id);
		$data['query']=$this->db->get($this->prefix."news_type")->result_array();
		//var_dump($data);
		$this -> load -> view('right/newstype_add',$data);
	}
	
	public function edit_save($id=null){
	    $post=$this->input->post();
		$post['time']=time();
		$this->db->where('id',$id);
		if($this->db->update($this->prefix."news_type",$post)){
	    $this->message("成功");
	}
	}
	
	public function load_add(){
	
	$this -> load -> view('right/newstype');
	}
	
	//public function edit_($id=null){
	//	$this -> load -> view('right/edit');
	//}
	
	public function del_($id=null){
		if (!empty($id)) {
	        if ($this -> db -> delete($this->prefix."news_type", array('id' => $id))) {
				$this -> message("删除成功",-1);
			}
			}
	}
	
	public function message($message,$num=-1){
		echo "<script>
					if(confirm('".$message."')){
						history.go(".$num.");
					}
				</script>";
	}
	
	
}
