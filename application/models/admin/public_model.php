<?php
/*
 该类为公共数据库操作类，前后台都可用
 */
class public_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	//where 是新参数 给选择的数据添加添加条件 如果 没有这个参数则按照 原理 函数逻辑执行
	public function pab_sc($limit, $offset, $table, $where = null) {
		if ($where == null) {
			if (!$limit) {
				return $this -> db -> get($table);
			} else {

				$this -> db -> limit($limit, $offset);
				return $this -> db -> get($table);
			}
		}
		if (is_array($where)) {

			$this -> db -> where($where[0], $where[1]);
			$this -> db -> limit($limit, $offset);
			return $this -> db -> get($table);
		}
	}

	public function get_role_list() {
		$this -> db -> select('id,company_code,remark');
		$this -> db -> from('sys_gourp');
		return $this -> db -> get();
	}

	//商家分类 查询
	public function select_bus_type($limit, $offset) {

		$this -> db -> where('flag', '1');
		$this -> db -> limit($limit, $offset);
		return $this -> db -> get('business_type');

	}

	//条件查询  单表查询   可传入分页数
	public function pab_wsc($limit, $offset, $table, $field, $id) {
		$this -> db -> where('flag', 1);
		if (!$limit) {
			$this -> db -> where($field, $id);
			return $this -> db -> get($table);
		} else {
			$this -> db -> where($field, $id);
			$this -> db -> limit($limit, $offset);
			return $this -> db -> get($table);
		}

	}

	//  JION普通查询   可传入分页数
	public function pab_msc($table1, $table2, $wtable, $limit, $offset) {
		$this -> db -> select('*');
		$this -> db -> from($table1);
		$this -> db -> limit($limit, $offset);
		$this -> db -> join($table2, $wtable);

		return $this -> db -> get();

	}

	//JION条件查询，不分页
	public function pab_wmsc($table1, $table2, $wtable, $field, $id) {
		$this -> db -> select('*');
		$this -> db -> from($table1);
		$this -> db -> join($table2, $wtable);
		$this -> db -> where($field, $id);
		return $this -> db -> get();
	}

	//JION多表条件查询，不分页 审核商家列表
	public function pab_verify($id) {
		$this -> db -> select('business_register_member.*,city_code,city_name,city_area_name,city_area_id,user_member.user_name as name,sys_user.user_name');
		$this -> db -> from('business_register_member');
		$this -> db -> join('business_citys', 'business_register_member.city_id = business_citys.city_code');
		$this -> db -> join('business_citys_area', 'business_register_member.city_area = business_citys_area.city_area_id');
		$this -> db -> join('sys_user', 'business_register_member.examine_user = sys_user.id');
		$this -> db -> join('user_member', 'business_register_member.register_user_id = user_member.user_id');
		$this -> db -> where('business_register_member.id', $id);
		return $this -> db -> get();
	}

	//会员评论日志列表
	public function pab_comment_list($limit, $offset) {
		$this -> db -> select('user_blog_comment.id,user_name,pl_date,blog_title');
		$this -> db -> from('user_blog_comment');
		$this -> db -> limit($limit, $offset);
		$this -> db -> join('user_blog', 'user_blog_comment.blog_id = user_blog.id');
		$this -> db -> join('user_member', 'user_blog_comment.pl_user = user_member.user_id');

		$this -> db -> where('user_blog_comment.flag', '1');
		return $this -> db -> get();
	}

	//会员评论日志列表
	public function pab_comment_list_p($limit, $offset) {
		$this -> db -> select('user_blog_comment.id,user_name,pl_date,blog_title');
		$this -> db -> from('user_blog_comment');
		$this -> db -> limit($limit, $offset);
		$this -> db -> join('user_blog', 'user_blog_comment.blog_id = user_blog.id');
		$this -> db -> join('user_member', 'user_blog_comment.pl_user = user_member.user_id');

		$this -> db -> where('user_blog_comment.flag', '0');
		return $this -> db -> get();
	}

	//查看评论日志详细列表
	public function pab_comment_list_see($id) {
		$this -> db -> select('user_blog_comment.id,blog_id,gl_type,user_name,pl_date,pl_content,blog_title,blog_tag,user_blog_comment.flag');
		$this -> db -> from('user_blog_comment');
		$this -> db -> join('user_blog', 'user_blog_comment.blog_id = user_blog.id');
		$this -> db -> join('user_member', 'user_blog_comment.pl_user = user_member.user_id');
		$this -> db -> where('user_blog_comment.id', $id);
		return $this -> db -> get();
	}

	//JION条件查询，可分页
	public function pab_whsc($table1, $table2, $wtable, $limit, $offset, $field, $id) {
		$this -> db -> select('*');
		$this -> db -> from($table1);
		$this -> db -> limit($limit, $offset);
		$this -> db -> join($table2, $wtable);
		$this -> db -> where($field, $id);
		$this -> db -> where("user_blog.flag", 1);
		return $this -> db -> get();
	}

	//JION多条件查询，可分页
	public function pab_whmsc($table1, $table2, $wtable, $limit, $offset, $field1, $id1, $field2, $id2) {
		$this -> db -> select('*');
		$this -> db -> from($table1);
		$this -> db -> limit($limit, $offset);
		$this -> db -> join($table2, $wtable);

		$this -> db -> where($field1, $id1);
		$this -> db -> where($field2, $id2);

		return $this -> db -> get();
	}

	//查询总数
	public function count_table($table) {

		$this -> db -> where('flag', 1);
		$query = $this -> db -> get($table);
		return $query -> num_rows();

	}

	//查询评论总数
	public function count_comment_num() {

		$this -> db -> where('flag', 1);
		$query = $this -> db -> get('user_blog_comment');
		return $query -> num_rows();

	}

	//查询评论总数
	public function count_comment_num_p() {

		$this -> db -> where('flag', 0);
		$query = $this -> db -> get('user_blog_comment');
		return $query -> num_rows();

	}

	//查询 会员总数
	public function count_table_member() {
		$this -> db -> where('flag', 1);
		$query = $this -> db -> get('user_member');
		return $query -> num_rows();
	}

	//查询 已删除会员总数
	public function count_del_member() {
		$this -> db -> where('flag', 0);
		$query = $this -> db -> get('user_member');
		return $query -> num_rows();
	}

	// 查询parentid为0的省市 add by yjh 2012-05-20
	public function count_help() {
		$this -> db -> select('areaid');
		$this -> db -> from('global_area');
		$this -> db -> where('parentid', '0');
		return $this -> db -> get();
	}

	// 查询所有城市 add by yjh 2012-05-20
	public function count_help2() {
		$query = $this -> count_help();
		$arr = array();
		$index = 0;
		// 索引
		if (isset($query)) {
			foreach ($query->result_array() as $row) {
				$arr[$index] = $row['areaid'];
				$index++;
			}
		}
		$this -> db -> select('areaid');
		$this -> db -> from('global_area');
		$this -> db -> where_in('parentid', $arr);
		return $this -> db -> get();
	}

	public function count_help_new() {
		$query = $this -> count_help();
		$arr = array();
		$index = 0;
		// 索引
		if (isset($query)) {
			foreach ($query->result_array() as $row) {
				$arr[$index] = $row['areaid'];
				$index++;
			}
		}
		$this -> db -> select('areaid');
		$this -> db -> where_in('parentid', $arr);
		$newQuery = $this -> db -> get('global_area');
		return $newQuery -> num_rows();
	}

	// add by yjh 2012-05-22
	public function get_city_content($pagesize, $offset) {
		$query = $this -> count_help();
		$arr = array();
		$index = 0;
		// 索引
		if (isset($query)) {
			foreach ($query->result_array() as $row) {
				$arr[$index] = $row['areaid'];
				$index++;
			}
		}
		$this -> db -> select('areaid,name,parentid,is_hot');
		$this -> db -> from('global_area');
		$this -> db -> limit($pagesize, $offset);
		$this -> db -> where_in('parentid', $arr);
		return $this -> db -> get();
	}

	// add by yjh 2012-05-22
	public function get_province_list($pagesize, $offset) {

		$this -> db -> select('areaid,name,parentid,is_hot');
		$this -> db -> from('global_area');
		$this -> db -> limit($pagesize, $offset);
		$this -> db -> where('parentid', 0);
		return $this -> db -> get();
	}

	public function get_province_count() {
		$this -> db -> select('areaid');
		$this -> db -> from('global_area');
		$this -> db -> where('parentid', 0);
		$query = $this -> db -> get();
		return $query -> num_rows();
	}

	public function get_count_condition($areaid) {
		$this -> db -> select('areaid');
		$this -> db -> from('global_area');
		$this -> db -> where('parentid', $areaid);
		$query = $this -> db -> get();
		return $query -> num_rows();
	}

	public function get_content_condition($areaid, $pagesize, $offset) {
		$this -> db -> select('areaid,name,parentid,is_hot');
		$this -> db -> from('global_area');
		$this -> db -> where('parentid', $areaid);
		$this -> db -> limit($pagesize, $offset);
		return $this -> db -> get();
	}

	// 查询满足条件的条数 add by yjh 2012-05-20
	public function count_area() {
		$query = $this -> count_help2();
		$arr = array();
		$index = 0;
		// 索引
		if (isset($query)) {
			foreach ($query->result_array() as $row) {
				$arr[$index] = $row['areaid'];
				$index++;
			}
		}
		$this -> db -> select('areaid');
		$this -> db -> where_in('parentid', $arr);
		$queryContent = $this -> db -> get('global_area');
		return $queryContent -> num_rows();
	}

	// 查询满足条件的区域 add by yjh 2012-05-20
	public function content_area($pagesize, $offset) {
		$query = $this -> count_help2();
		$arr = array();
		$index = 0;
		// 索引
		if (isset($query)) {
			foreach ($query->result_array() as $row) {
				$arr[$index] = $row['areaid'];
				$index++;
			}
		}
		$this -> db -> select('areaid,name,parentid,is_hot');
		$this -> db -> from('global_area');
		$this -> db -> limit($pagesize, $offset);
		$this -> db -> where_in('parentid', $arr);
		return $this -> db -> get();
	}

	// 得到城市列表
	public function get_city($arr) {
		$this -> db -> select('areaid,name,parentid,is_hot');
		$this -> db -> from('global_area');
		$this -> db -> where_in('areaid', $arr);
		return $this -> db -> get();
	}

	//条件查询总数
	public function count_wtable($field, $id, $table) {
		$this -> db -> where($field, $id);
		$this -> db -> where('flag', 1);
		$query = $this -> db -> get($table);
		return $query -> num_rows();

	}

	//多条件查询总数
	public function count_wmtable($field1, $id1, $field2, $id2, $table) {
		$this -> db -> where($field1, $id1);
		$this -> db -> where($field2, $id2);
		$query = $this -> db -> get($table);
		return $query -> num_rows();

	}

	//条件查询
	public function pab_wc($field, $name, $table) {
		$this -> db -> where($field, $name);
		$query = $this -> db -> get($table);
		return $query;
	}

	//条件查询
	public function pab_wc_not($id) {
		$this -> db -> select('id,remark,company_code');
		$this -> db -> from('sys_gourp');
		$this -> db -> where('id !=', $id);
		$query = $this -> db -> get();
		return $query;
	}

	public function save_manage_help($field, $name, $table) {
		$this -> db -> where($field, $name);
		$this -> db -> where('flag', 1);
		$query = $this -> db -> get($table);
		return $query;
	}

	//条件查询
	public function pab_wc_new($field, $name, $table) {
		$this -> db -> where($field, $name);
		$this -> db -> where('flag', 1);
		$query = $this -> db -> get($table);
		return $query;
	}

	//普通查询
	public function pab_pc($table) {
		$query = $this -> db -> get($table);
		return $query;
	}

	public function pab_role($table) {
		$this -> db -> where('company_code != ', '1');
		$query = $this -> db -> get($table);
		return $query;
	}

	//条件查询
	public function pab_wc_in($field, $name, $table) {
		$this -> db -> where_in($field, $name);
		$query = $this -> db -> get($table);
		return $query;
	}

	//查询表中最ID最大数
	public function pab_yc($name, $table) {
		$this -> db -> select_max('id', $name);
		return $this -> db -> get($table);

	}

	//添加数据
	public function pab_insert($table, $data) {
		if ($this -> db -> insert($table, $data)) {
			return $this -> db -> insert_id();
		} else {
			return NULL;
		}
		$this -> db -> insert($table, $data);

		return $this -> db -> insert_id();

	}

	public function delete_checked($field, $arr, $table, $data) {
		$this -> db -> where_in($field, $arr);
		if ($this -> db -> update($table, $data)) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	//更新数据
	public function pab_update($field, $name, $table, $data) {

		$this -> db -> where($field, $name);
		if ($this -> db -> update($table, $data)) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	//更新数据
	public function set_update($name) {
		$this -> db -> set('examine_status', '2');
		$this -> db -> set('examine_result', '1');
		$this -> db -> where('business_name', $name);
		if ($this -> db -> update('business_register_member')) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	public function get_find_blog($pagesize, $offset) {
		$this -> db -> select('blog_find_share.id as shareid,user_blog.id as blogid,user_blog.fb_user,blog_type.type_name,
	user_blog.blog_title,user_blog.gl_type,user_blog.blog_state,user_blog.blog_state,user_blog.is_recom');
		$this -> db -> from('blog_find_share');
		$this -> db -> join('user_blog', 'user_blog.id = blog_find_share.blog_id');
		$this -> db -> join('blog_type', 'blog_type.id = user_blog.blog_type');
		//$this->db->join('blog_find_share','blog_find_share.blog_id != user_blog.id');
		$this -> db -> limit($pagesize, $offset);
		$this -> db -> where('blog_find_share.flag', 1);
		$this -> db -> where('user_blog.is_recom_phone !=', '0');
		//$this->db->where('user_blog.blog_type',2);
		//$this->db->where('user_blog.is_recom',1);
		$query = $this -> db -> get();
		return $query;
	}

	//查询总数
	public function count_table_new() {
		$this -> db -> select('blog_find_share.id');
		$this -> db -> from('blog_find_share');
		$this -> db -> join('user_blog', 'user_blog.id = blog_find_share.blog_id');
		$this -> db -> join('blog_type', 'blog_type.id = user_blog.blog_type');
		//$this->db->join('blog_find_share','blog_find_share.blog_id != user_blog.id');
		$this -> db -> where('blog_find_share.flag', 1);
		$this -> db -> where('user_blog.is_recom_phone !=', '0');
		//$this->db->where('user_blog.blog_type',2);
		//$this->db->where('user_blog.is_recom',1);
		$query = $this -> db -> get();
		return $query -> num_rows();
	}

	// add by yjh
	public function count_wmtable_new() {
		$this -> db -> select('user_blog.id');
		$this -> db -> from('user_blog');
		$this -> db -> join('blog_file_sj', 'blog_file_sj.blog_id=user_blog.id');
		$this -> db -> join('blog_type', 'blog_type.id = user_blog.blog_type');
		//$this->db->join('blog_find_share','blog_find_share.blog_id != user_blog.id');
		$this -> db -> where('user_blog.is_recom_phone', '0');
		$this -> db -> where('user_blog.flag', 1);
		$this -> db -> where('user_blog.blog_type', '2');
		$query = $this -> db -> get();
		return $query -> num_rows();
	}

	// add by yjh
	public function pab_whmsc_new($limit, $offset) {
		$this -> db -> select('user_blog.id,user_blog.blog_title,user_blog.fb_user,user_blog.gl_type,user_blog.blog_state,user_blog.blog_state,user_blog.is_recom,blog_type.type_name');
		$this -> db -> limit($limit, $offset);
		$this -> db -> join('blog_file_sj', 'blog_file_sj.blog_id=user_blog.id');
		$this -> db -> join('blog_type', 'blog_type.id = user_blog.blog_type');
		//$this->db->join('blog_find_share','blog_find_share.blog_id != user_blog.id');
		$this -> db -> from('user_blog');
		$this -> db -> where('user_blog.is_recom_phone', '0');
		$this -> db -> where('user_blog.blog_type', '2');
		$this -> db -> where('user_blog.flag', 1);
		$query = $this -> db -> get();
		return $query;

	}

	// add by yjh
	public function get_blogid_arr($arrBlogId) {
		$this -> db -> select('*');
		$this -> db -> from('blog_find_share');
		$this -> db -> where_in('id', $arrBlogId);
		$query = $this -> db -> get();
		return $query;
	}

	// add by yjh
	public function update_recom($arrBlogId, $set) {

		//$this->db->set('is_recom_phone','0');
		$this -> db -> where_in('id', $arrBlogId);
		if ($this -> db -> update('user_blog', $set)) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	// add by yjh
	public function update_recom_flag($arr, $set2) {

		//$this->db->set('flag','0');
		$this -> db -> where_in('id', $arr);
		if ($this -> db -> update('blog_find_share', $set2)) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	//更新数据
	public function not_update($name) {
		$this -> db -> set('examine_status', '2');
		$this -> db -> set('examine_result', '2');
		$this -> db -> where('business_name', $name);
		if ($this -> db -> update('business_register_member')) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	//更新数据
	public function info_update($name) {
		$this -> db -> set('approve_status', '1');
		$this -> db -> where('business_name', $name);
		if ($this -> db -> update('business_member_info')) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	//删除数据
	public function pab_delete($field, $name, $table) {
		$this -> db -> where($field, $name);
		if ($this -> db -> delete($table)) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	//修改数据状态
	public function pab_delete_new($field, $name, $table, $data) {
		$this -> db -> where($field, $name);
		if ($this -> db -> update($table, $data)) {
			return TRUE;
		} else {
			return NULL;
		}
	}

	////////////////////////////////////////////////////////////////////////////////
	public function fashion_channel_tag($search) {
		$this -> db -> select('*');
		$this -> db -> from('fashion_channel_tag');
		$this -> db -> where('tagid', $search);
		$res = $this -> db -> get();
		return $res -> result_array();
	}

	public function fashion_tag_db() {

		return $this -> db -> get("fashion_channel_tag");
	}

	public function fashion_tag_dbwhere($channelid) {
		$this -> db -> select('*');
		$this -> db -> from('fashion_channel_tag');
		$this -> db -> where('channelid', $channelid);
		return $this -> db -> get();
	}

	public function fashion_channel() {

		return $this -> db -> get("fashion_channel");
	}

	public function tag() {

		return $this -> db -> get("tag");
	}

	//查找标签数据
	public function fashion_search($search) {
		$this -> db -> select('*');
		$this -> db -> from('tag');
		$this -> db -> like('tag_name', $search);
		$res = $this -> db -> get();
		return $res -> result_array();
	}

	/*
	 public function fashion_change($channel,$tag_id){
	 $data = array('channelid' => $channel);
	 $this->db->where('tagid', $tag_id);
	 $this->db->update('fashion_channel_tag', $data);
	 }	*/

	public function del_blog($id) {
		$data = array('flag' => 0);
		$this -> db -> where('id', $id);
		return $this -> db -> update('user_blog', $data);
	}

	//改变对应标签
	public function fashion_change($channel, $tag_id) {
		$data = array('channelid' => $channel);
		$this -> db -> where('tagid', $tag_id);
		$this -> db -> update('fashion_channel_tag', $data);
	}

	public function get_blog_content($id) {
		$this -> db -> where('blog_id', $id);
		return $this -> db -> get('user_blog_content') -> result_array();
	}

	//插入分享日志
	public function insert_blog_share_db($db) {
		$data = array('blog_id' => $db['id'], 'blog_type' => $db['blog_type'], 'blog_user_id' => $db['blog_user_id'], 'share_date' => $db['share_date'], 'pic1_absolute_url' => $db['pic1_absolute_url'], 'pic2_absolute_url' => $db['pic2_absolute_url'], 'pic3_absolute_url' => $db['pic3_absolute_url'], 'pic4_absolute_url' => $db['pic4_absolute_url'], 'pic5_absolute_url' => $db['pic5_absolute_url'], 'pic6_absolute_url' => $db['pic6_absolute_url'], 'flag' => $db['flag']);
		$this -> change_blog_type($db['id']);
		return $this -> db -> insert('blog_share', $data);
	}

	//改变推荐状态(已推荐)
	function change_blog_type($id) {
		$data = array('is_recom' => 1);
		$this -> db -> where('id', $id);
		$this -> db -> update('user_blog', $data);
	}

	function get_user_blog($page_index) {
		$this -> db -> limit(10, $page_index * 10);
		$this -> db -> where('is_recom', 1);
		$this -> db -> where('flag', 1);
		return $this -> db -> get('user_blog') -> result_array();
	}

	public function count_user_blog() {
		$this -> db -> where('flag', 1);
		$this -> db -> where('is_recom', 1);
		$num = $this -> db -> get("user_blog");
		return count($num -> result_array());
	}

	//删除 会员列表
	public function delusermember_list($limit, $offset, $table) {
		if (!$limit) {
			$this -> db -> where('flag', 0);
			return $this -> db -> get($table);
		} else {
			$this -> db -> where('flag', 0);
			$this -> db -> limit($limit, $offset);
			return $this -> db -> get($table);
		}
	}

	public function getusermember_list($limit, $offset, $table) {
		if (!$limit) {
			$this -> db -> where('flag', 1);
			return $this -> db -> get($table);
		} else {
			$this -> db -> where('flag', 1);
			$this -> db -> limit($limit, $offset);
			return $this -> db -> get($table);
		}
	}

	//改变会员 删除 还原状态
	public function change_user_type($userid, $type) {
		if ($type == 1) {
			$data = array('flag' => 1);
			$this -> db -> where('user_id', $userid);
			return $this -> db -> update('user_member', $data);
		}// 还原
		if ($type == 0) {
			$data = array('flag' => 0);
			$this -> db -> where('user_id', $userid);
			return $this -> db -> update('user_member', $data);
		}// 删除
	}

	//评量或者还原删除会员
	public function change_user_type_all($arr, $data) {

		$this -> db -> where_in('user_id', $arr);

		return $this -> db -> update('user_member', $data);

	}

	//flag_del区域假删除 更新 方法
	public function all_business_flag_del($id, $where, $change, $table, $how) {
		$data = array($change => $how);
		$this -> db -> where($where, $id);
		$this -> db -> where("parent_id !=", 0);
		return $this -> db -> update($table, $data);
	}

	public function business_flag_del($id, $where, $change, $table, $how) {
		$data = array($change => $how);
		$this -> db -> where($where, $id);
		;
		return $this -> db -> update($table, $data);
	}

	//得到一行数据
	public function get_line_data($id, $field, $table) {
		$this -> db -> where($field, $id);
		return $this -> db -> get($table);
	}

	//会员日志发表日期筛选数量
	public function user_blog_numdate($userid, $startdate, $enddate) {

		// $this->db->select("SELECT `id` FROM `user_blog` WHERE
		// TO_DAYS(fb_date) >= TO_DAYS($startdate) and TO_DAYS(fb_date) <= TO_DAYS($enddate) and ;");

		$this -> db -> where('fb_user', $userid);
		$this -> db -> where('fb_date >=', $startdate);
		$this -> db -> where('fb_date <=', $enddate);
		$query = $this -> db -> get('user_blog');
		return $query -> num_rows();
	}

	//评量屏蔽或解除评论
	public function update_comment_all($arr, $data) {
		$this -> db -> where_in('id', $arr);
		return $this -> db -> update('user_blog_comment', $data);
	}

	public function check_user($username = "", $password = "") {
		$this -> db -> where('titan_admin.usrname', $username);
		$this -> db -> where('titan_admin.password', md5($password."stone.tm"));
		// 真为有                           假为无
		return $this -> db -> get("titan_admin") -> result_array() != array();

	}

}
