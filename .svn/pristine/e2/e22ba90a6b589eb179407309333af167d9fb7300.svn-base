<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('smarty/Smarty.class.php');
class CI_Smarty extends Smarty{
        function __construct() {
                parent::__construct();
                $this->template_dir =  APPPATH."views"; 
                $this->compile_dir = APPPATH."templates_c"; 
                $this->cache_dir = APPPATH."cache";
                $this->caching = 0;
                //$this->cache_lifetime = 120; //
                $this->debugging = true;
                $this->compile_check = true; //
                //$this->force_compile = true; //
                //$this->allow_php_templates= true; //
                $this->left_delimiter = "<{"; //
                $this->right_delimiter = "}>"; //
                $this->smarty->assign('base_url', base_url()); ///
      }
}
/* End of file Smarty.php */
/* Location: ./application/libraries/Smarty.php */