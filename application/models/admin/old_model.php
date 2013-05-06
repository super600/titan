<?php
/*
 该类为公共数据库操作类，前后台都可用
 */
class old_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function count_list() {
		return $this -> db -> count_all('tab_company');
	}

	public function get_list($pagesize, $offset) {

		$this -> db -> limit($pagesize, $offset);
		return $this -> db -> get("tab_company");

	}

	public function get_data($userid) {
		
		$this -> db -> where("userid", $userid);
		//Parameter1 结果量    ， Parameter2 起始量
		$this -> db -> limit(1, 0);
		return $this -> db -> get("tab_company")-> result_array();
	}

	public function data_update($data,$id) {
		//echo "<script>alert('".$id."')</script>";
		$this->db->where('userid', $id);
		if ($this->db->update('tab_company', $data)) {
			return TRUE;
		} else {
			return NULL; 
		}
	}
	


}
