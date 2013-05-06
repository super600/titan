<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//开启session_start 展会后台控制器
session_start();
//后台管理员权限判断
class base extends CI_Controller {
	var $host='http://localhost/dj/';
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
	
	
	private function message($num=-1,$message){
		echo "<script>
					if(confirm('".$message."')){
						history.go(".$num.");
					}
				</script>";
	}
	//列表
	public function product_list($page = 0) {
		$pagesize = 15;
		$total = $this -> db -> count_all('product');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get("product");		
		//var_dump($data['query']);
		$baseurl = site_url("admin/mag/product_list");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		$data['pagination'] = $pages['pagination'];
		
		$data['servername']=$this->host;
		$data['page'] = $pages['stspage'];
		$this -> load -> view('admin/product_list', $data);
	}
	
	

	
	//公司数据 添加
	public function product_add() {
		$data['dbtype']="save";
		$data['servername']=$this->host;
		$data['option']=$this->gettypes();
		//var_dump($data['option']);
		$this -> load -> view('admin/product_add',$data);
		
	}
	
	public function product_add_save() {
		$post=$this->input->post();

		$data = array(
				'name'=>$post["name"],
                'img' => $post["img"],
				'ext' => $post["ext"],

				'type' => $post["type"],

				'detail' => $post["detail"]
            );
		if($this->db->insert('product', $data)){
			$this->message(-1,"添加成功");
		}
	}
	/*
		@author:neo
	*/
	public function product_edit($id) {
		//echo $id;
		//exit();
		$data['dbtype']="update";
				$data['servername']=$this->host;
		$this->db->where("id",$id);
		$data['id']=$id;

		$data["query"]=$this->db->get("product")->result_array();
				$data['option']=$this->gettypes();
		var_dump($data['query']);
		$this -> load -> view('admin/product_add',$data);
	}
	/*
		@author:neo
	*/
	public function product_update() {
		$post=$this->input->post();
		
		//var_dump($post);
		//exit();
		$data = array(
				'name'=>$post["name"],
                'img' => $post["img"],
				'ext' => $post["ext"],

				'type' => $post["type"],
				'detail' => $post["detail"]
		);
		$this->db->where('id', $post['id']);
		if($this->db->update('product', $data)){
			$this->message(-2,"更新成功");
		}
	}
	/*
		@author:neo
	*/
	public function product_del($id) {
		if(!empty($id)){
			if($this->db->delete('product', array('id' => $id))){
				$this->message(-1,"删除成功");
			}
		}
	}
	
	
	
	/**------------------------------------------------------------------------------------------------*/

	//列表
	public function news_list($page = 0) {
		$pagesize = 15;
		$total = $this -> db -> count_all('news');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get("news");		
		//var_dump($data['query']);
		$baseurl = site_url("admin/mag/news");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('admin/news_list', $data);
	}
	
	
	//公司数据 添加
	public function news_add() {
	
		$data['dbtype']="save";
		
		$data['servername']="company";
		$this -> load -> view('admin/news_add',$data);
	}
	public function news_add_save() {
				$post=$this->input->post();
		$data = array(
				'title'=>$post["title"],
                'detail' => $post["detail"]
            );
		if($this->db->insert('news', $data)){
			$this->message(-1,"添加成功");
		}
	}
	/*
		@author:neo
	*/
	public function news_edit($id) {
			$this->db->where("id",$id);
		$data['dbtype']="update";
		$data['servername']="company";
		$data['id']=$id;
		$data["query"]=$this->db->get("news")->result_array();
		// var_dump(	$data["query"]);
		$this -> load -> view('admin/news_add',$data);
	}
	/*
		@author:neo
	*/
	public function news_update() {
		$post=$this->input->post();
		$data = array(
				'title'=>$post["title"],
                'detail' => $post["detail"]
					);
		$this->db->where('id', $post['id']);
		if($this->db->update('news', $data)){
			$this->message(-2,"更新成功");
		}
	}
	/*
		@author:neo
	*/
	public function news_del($id) {
		if(!empty($id)){
			if($this->db->delete('news', array('id' => $id))){
				$this->message(-1,"删除成功");
			}
		}
	}
	
	
	/*----------------------------------------------------------------------*/
	public function type_list($page=0){

		$pagesize = 15;
		
		$this->db->where("cc !=",1);
		$total = $this -> db -> count_all('type');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		
		$this -> db -> limit($pagesize, $offset);
		$this->db->where("cc !=",1);
		$data['query']=$this -> db -> get("type");		
		//var_dump($data['query']);
		$baseurl = site_url("admin/mag/type_list");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
		$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		
		$this->load->view('admin/type_list',$data);
	}
	
	
	public function type_list_c($id=null,$page=0){
		if($id!=null){
			$pagesize = 15;
			$this->db->where("cc",1);
			$total = $this -> db -> count_all('type');
			$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
	
			$this -> db -> limit($pagesize, $offset);
			$this->db->where("from",$id);
			$this->db->where("cc",1);
			$data['query']=$this -> db -> get("type");		
	
			$baseurl = site_url("admin/mag/type_list_c".'/'.$id);
			$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
			$data['pagination'] = $pages['pagination'];
			$data['page'] = $pages['stspage'];
			
			$this->load->view('admin/type_list',$data);
		}else{
			echo "not type";
		}
	}
	public function type_add_c($from,$name){
		#echo $from.'---'.$name;
		#exit();
		#if(!empty($from) && !empty($id)){
			$from=urldecode($from);
			$name=urldecode($name);
			$data = array(
					'name'=>$name,
					'from'=>$from
	            );
			if($this->db->insert('type',$data)){
				echo "1";
			}
		#}
	}
	
	public function type_add_cc($from,$name){
		#echo $from.'---'.$name;
		#exit();
		#if(!empty($from) && !empty($id)){
			$from=urldecode($from);
			$name=urldecode($name);
			$data = array(
					'name'=>$name,
					'from'=>$from,
					'cc'=>'1'
	            );
			if($this->db->insert('type',$data)){
				echo "1";
			}
		#}
	}
	
	public function type_add($name){
		$name=urldecode($name);
		if(!empty($name)){
			$data = array(
					'name'=>$name
	            );
			if($this->db->insert('type',$data)){
				echo "1";
			}
		}
	}
	
	public function type_del($id){
		if(!empty($id)){
			if($this->db->delete('type', array('id' => $id))){
				$this->message(-1,"删除成功");
			}
		}
	}
	/*---------------------------------------得到-option------------------------------*/
	public function gettypes(){
		$this->db->where("from",0);
		$arr=$this->db->get("type")->result_array();
		//var_dump($arr);
		$out='';
		foreach($arr as $k=>$v){
			$out.='<option>'.'-------------'.$v['name'].'--------------'.'</option>';
			//var_dump($v);
			$this->db->where("from",$v['id']);
			$arrs=$this->db->get("type")->result_array();
			//var_dump($arrs);
			foreach($arrs as $k=>$v){
				$out.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
			}		
		}
		return $out;
	}
	
		/*---------------------------------------反馈-option------------------------------*/
	public function feedbacklist($page = 0){
			$pagesize = 15;
		$total = $this -> db -> count_all('feedback');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get("feedback");		
		//var_dump($data['query']);
		$baseurl = site_url("admin/mag/feedbacklist");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
				$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('admin/feedbacklist', $data);
	}
	
	public function feedback_del($id){
		if(!empty($id)){
			if($this->db->delete('feedback', array('id' => $id))){
				$this->message(-1,"删除成功");
			}
		}
	}
	public function job_add($id=null){

		$data['dbtype']="save";
		$this -> load -> view('admin/job_add', $data);
	}
	public function job_add_save($id=null){

		$post=$this->input->post();
		$post = $this->security->xss_clean($post);

		$data = array(
				  'jobname' =>$post["jobname"],
				  'num' =>$post["num"],
				  'salary'=>$post["salary"],
				  'address' =>$post["address"],
				  'detail' =>$post["detail"]
            );
		if($this->db->insert('joblist', $data)){
			$this->message(-1,"添加成功");
		}
	}
	
	public function job_list($page=0){
		$pagesize = 15;
		$total = $this -> db -> count_all('joblist');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get("joblist");
		
		//var_dump($data['query']);	
		//var_dump($data['query']);
		$baseurl = site_url("admin/mag/job_list");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
				$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('admin/job_list', $data);
		
	}
	
	public function jobman_list($page=0){
				$pagesize = 15;
		$total = $this -> db -> count_all('job');
		$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
		
		$this -> db -> limit($pagesize, $offset);
		$data['query']=$this -> db -> get("job");
		
		//var_dump($data['query']);	
		//var_dump($data['query']);
		$baseurl = site_url("admin/mag/jobman_list");
		$pages = $this -> page -> pageinfo($total, $pagesize, $baseurl, 4);
				$data['pagination'] = $pages['pagination'];
		$data['page'] = $pages['stspage'];
		$this -> load -> view('admin/jobman_list', $data);
		
	}
	
}
