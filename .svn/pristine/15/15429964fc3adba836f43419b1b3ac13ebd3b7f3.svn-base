<?php
/**
 *
 * 基本模型
 *
 */
class Files_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}


	public function insert_img($params){
		$this->db->insert('am_img', $params); 
		return $this->db->insert_id();
	}
	

}
