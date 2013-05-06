<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once( APPPATH . 'libraries/libs/Smarty.class.php' );
class csmarty extends Smarty{
	function __construct() {
		parent::__construct();
		$this->template_dir =  FCPATH ."template"; 
		$this->compile_dir = FCPATH  ."templates_c"; 
		$this->cache_dir = FCPATH ."cache";
		//$this->caching = 0;
		//$this->cache_lifetime = 120; 
		//$this->debugging = true;
		$this->compile_check = true; 
		//$this->force_compile = true; 
		//$this->allow_php_templates= true; 
		$this->left_delimiter = "<{"; 
		$this->right_delimiter = "}>"; 
		$this->assign('base_url', base_url()); 
		
	}
}
