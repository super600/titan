<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//开启session_start 展会后台控制器
session_start();
//后台管理员权限判断
class projects extends CI_Controller {
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

	//工程案例列表
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
		$this -> load -> view('right/projects_list', $data);
	}
	

	
	//工程案例添加
	public function add_(){
		$data['dbtype']='save';
		$this -> load -> view('right/projects_add', $data);
	}
	
	public function save_(){
		$post=$this->input->post();
		$post['inputtime']=time();
		if($this->db->insert($this->prefix."project",$post)){
			$this->message("成功");
		}
	}
	
	public function edit_($id=null){
	    
		//var_dump($data['projecttype']);


	    $data['dbtype']='update';
		
		$this->db->where("id",$id);
		$data['query']=$this->db->get($this->prefix."project")->result_array();
		$this->db->where("id",$data['query'][0]['type']);
		$res=$this->db->get($this->prefix."types")->result_array();
		//var_dump($res);
		@$data['query'][0]['typename']=$res[0]['typename'];
		$this -> load -> view('right/projects_add',$data);
	}
	
	public function edit_save($id=null){
	    $post=$this->input->post();
		$post['inputtime']=time();
		$this->db->where('id',$id);
		if($this->db->update($this->prefix."project",$post)){
			$this->message("成功");
		}
	}
	
	public function del_($id=null){
		if (!empty($id)) {
			if ($this -> db -> delete($this->prefix."project", array('id' => $id))) {
				$this -> message(-1, "删除成功");
			}
		}
	}
	
	

	/*************************************************************************************************/
	public function type(){
		$this->db->where("actiontype","projects");
		$this->db->where("fromid",0);
		//$this->db->where("companyid",$companyid);
		$query=$this->db->get($this->prefix."types")->result_array();
		foreach ($query as $k => $v) {
			$this->db->where("fromid",$v['id']);
			$q[$v["id"].'-'.$v['typename']]=$this->db->get($this->prefix."types")->result_array();
		}
		@$data['query']=$q;
		//$this -> load -> view('admin/company_type_edit',$data);
		$this->load->view("right/project_type",$data);
	}
	
	
	public function type_add($category="big",$val=null){
		$val=urldecode($val);
		if(empty($val)){
			die("数据错误");
		}
		if( $val!=null and $category!=null){
			if($category=="big"){
				if($this->db->insert($this->prefix.'types',array("typename"=>$val,
															"actiontype"=>"projects",
															"fromid"=>'0'/*--*/))){
					echo "success";
				}
			}elseif($category!="big"){
				if($this->db->insert($this->prefix.'types',array("typename"=>$val,
															"actiontype"=>"projects",
															"fromid"=>$category/*-IN here category was type from id-*/))){
					echo "success";
				}
			}
		}
	}
	
	public function gettypeseo($typeid=null){
		if(empty($typeid)){die("false");}
		$this->db->where("typeid",$typeid);
		//$this->db->where("actiontype","projects");
		echo json_encode($this->db->get($this->prefix."typeseo")->result_array());
	} 
	
	public function typeseo_add(){
		//"type":"title","pageid":"1","companyid":"43033"
		$post=$this->input->post();
		if(empty($post['keyword']) or empty($post['description']) or  empty($post['title']) or empty($post['typeid'])){
			die("信息错误--或者 信息不全面");
		}

		$this->db->where("typeid",$post['typeid']);
		$res=$this->db->get($this->prefix."typeseo")->result_array();
		if(count($res)>0){
			//执行操作
			$this->db->where("typeid",$post['typeid']);
			if($this->db->update($this->prefix."typeseo",array("title_content"=>$post['title'],
																"keyword_content"=>$post['keyword'],
																"description_content"=>$post['description']))){
				echo "success";
			}
		}else{
			//服务器还未有相关数据
			if($this->db->insert($this->prefix."typeseo",array("title_content"=>$post['title'],
																"keyword_content"=>$post['keyword'],
																"description_content"=>$post['description'],
																"typeid"=>$post['typeid']))){
				echo "success";
			}
		}	
	}
	
	
	public function type_del($id){
		if(!empty($id)){
			
			//查看是否有子分类
			$type=$this->prefix.'types';
			$res=$this->db->query("
				select id from $type where fromid =$id  
			")->result_array();
			
			if(count($res)>0){
				die("该大分类有子分类");
			}
			if($this->db->delete($type, array('id' => $id))){
				echo "success";
			}
		}
	}
	
	public function typename_change(){
		$post=$this->input->post();
		$this->db->where("id",$post['typeid']);
		if($this->db->update($this->prefix."types",array("typename"=>$post['typename']))){
			echo "success";
		}
		//echo json_encode($post);
	}
	
	
	public function get_type(){
		
			//$data['companyid']=$companyid;
			$this->db->where("fromid",0);
			$this->db->where("actiontype","projects");
			$query=$this->db->get($this->prefix."types")->result_array();
			foreach ($query as $k => $v) {
				$this->db->where("fromid",$v['id']);
				$q[$v["id"].'-'.$v['typename']]=$this->db->get($this->prefix."types")->result_array();
			}
			echo json_encode($q);

	}
	public function message($message,$num=-1){
		echo "<script>
					if(confirm('".$message."')){
						history.go(".$num.");
					}
				</script>";
	}
	
	
}
