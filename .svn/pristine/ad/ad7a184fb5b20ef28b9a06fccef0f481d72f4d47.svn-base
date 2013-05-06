<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 	@author neo 2012-8-9
 * 后台统一分页
 */
 
 
class Page {
	function pageinfo($total, $pagesize, $baseurl = '', $segmenturl = 4,$pageCurrent=0,$action=null) {

		$ci = &get_instance();

		$ci -> load -> library('pagination');

		$baseurl = empty($baseurl) ? current_url() : $baseurl;

		//用页数来实现分页而不是用记录数
		$config['use_page_numbers'] = TRUE;

		$config['base_url'] = $baseurl;

		$config['total_rows'] = $total;
		//总数

		$config['per_page'] = $pagesize;

		//点击第一页的链接地址
		$config['first_url'] = $baseurl;

		//$config['uri_segment'] = $uri_segment;

		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['num_links'] = $segmenturl;
		$config['cur_tag_open'] = ' <a class="current">';
		$config['cur_tag_close'] = '</a>';
		//	var $prefix				= ''; // A custom prefix added to the path.
		//  var $suffix				= ''; // A custom suffix added to the path.
		
		if(!empty($action)){
			$config['prefix'] = $action.'_';
			$config['suffix'] = '.html';
			$config['first_url'] = $action.'.html';
		}
		//重写当前页面
		$config['rewriteCurrent'] = $pageCurrent;
		//var_dump($config);
		$ci -> pagination -> initialize($config);
		$stspage = array('total' => $config['total_rows'], 
					'num' => $config['per_page'], 
					'page' => (int)(($config['total_rows'] % $config['per_page'] === 0) ? ($config['total_rows'] / $config['per_page']) : ($config['total_rows'] / $config['per_page'] + 1)), 
					'current' => ($pagesize + 1) . '-' . ($pagesize + $total));

		$pageini = array();
		$pagination = $ci -> pagination -> create_links();
		$pageini['stspage'] = $stspage;

		$pageini['pagination'] = $pagination;

		return $pageini;
	}

}
