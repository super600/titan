<?php
/*
 该类为公共数据库操作类，前后台都可用
 */
class make_web_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function count_list($table=""){
		if(empty($table)){
			return $this->db->count_all('am_company');
		}else{
			return $this->db->count_all($table);
		}
	}

	public function get_list($pagesize,$offset,$table=""){
		if(empty($table)){
			$this->db->limit($pagesize,$offset);
			return $this->db->get("am_company");
		}else{
			$this->db->limit($pagesize,$offset);
			return $this->db->get($table);
		}
	}
	
	public function get_news($pagesize,$offset,$table=""){
		$this->db->select("am_news_company_list.*,am_company.company_name as cname");
		$this->db->from('am_news_company_list');
		$this->db->limit($pagesize,$offset);
		$this->db->order_by("id", "desc"); 
		$this->db->join('am_company', 'am_company.company_id = am_news_company_list.company_id','left');
		return $this->db->get();
	}
	
	public function get_data($userid,$table=""){
		$this->db->where("company_id",$userid);
		//Parameter1 结果量    ， Parameter2 起始量 
		$this->db->limit(1,0);
		return $this->db->get("am_company");
	}
	
	//得到新表 等数据
	public function get_web_data(){
		//$this->db->where("company_id",$company_id);
		//Parameter1 结果量    ， Parameter2 起始量 
		//$this->db->limit(1,0);
		return $this->db->get("am_company");
	}
	
	public function functionName($value=''){
		
	}
	
	public function logo($value=''){
		
	}
	
	public function flash($value=''){
		
	}

}
