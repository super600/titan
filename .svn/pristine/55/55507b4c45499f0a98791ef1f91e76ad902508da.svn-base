<?php
/**
 *
 * 文件处理类
 *
 */
class Base_model extends CI_Model {
	private $prefix="titan_";
	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function insert_img($params){
		$this->db->insert('am_img', $params); 
		return $this->db->insert_id();
	}

	public function getNews($num = 5) {
		$this -> db -> limit($num);
		$data['query'] = $this -> db -> get($this->prefix."news") -> result_array();
	}
	
	public function getProducts($num = 5) {
		$this -> db -> limit($num);
		$data['query'] = $this -> db -> get($this->prefix. "products") -> result_array();
	}
	public function getPurchase($num = 5) {
		$this -> db -> limit($num);
		$data['query'] = $this -> db -> get($this->prefix."purchases") -> result_array();
	}
	public function getProjects($num = 5) {
		$this -> db -> limit($num);
		$data['query'] = $this -> db -> get($this->prefix."projects") -> result_array();
	}
	public function getJobs($num = 5) {
		$this -> db -> limit($num);
		$data['query'] = $this -> db -> get($this->prefix."jobs") -> result_array();
	}
	public function getInfo() {
		
	}
	public function getIntroduce() {
		
	}
	public function getContact() {
		
	}
}
