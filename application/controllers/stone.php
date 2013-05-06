<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class stone extends CI_Controller {
	var $prepare=array();
	public function __construct() {// session_start();
		error_reporting(E_ALL);
		parent::__construct();
		$this -> load -> model("base_model");
		$this -> load -> model("god");
		include FCPATH."/template/config/prepare.php";
		$this->prepare=$prepare;
		header("content-type: text/html; charset=utf-8");
		//$this->csmarty->assign("producttype",$this->db->query("select typename,id,fromid from titan_types where titan_types.actiontype = 'products'")->result_array());
		$this->csmarty->assign("producttype",$this->god->getCategory("products"));
		$this->csmarty->assign("projecttype",$this->god->getCategory("projects"));
				
	}

	/**
	 * @author neo
	 * @todo 首页
	 * */
	public function wel() {
		//$this -> load -> view("wel");
	}

	public function home($type = 0) {
        //$this->csmarty->assign("title","恭喜你smarty安装成功！");  
        //$this->csmarty->assign("base_url",base_url());
        //var_dump($this->prepare);
       	//exit();
        $this->csmarty->assign("product",$this->god->getProduct($this->prepare['productNum_index'],$this->prepare['productCat_index']));
		$this->csmarty->assign("project",$this->god->getProject($this->prepare['projectNum_index'],$this->prepare['projectNum_index']));
		$this->csmarty->assign("news",$this->god->getNews($this->prepare['newsNum_index'],$this->prepare['newsNum_index']));
		$this->csmarty->assign("where",$this->god->getWhere(__METHOD__));
		//$this->csmarty->assign("information",$this->god->getProject(10));
		//$this->csmarty->assign("information",$this->god->getProject(10));
		//$this->csmarty->assign("information",$this->god->getProject(10));
        $this->csmarty->display('index.html');  
	}

	public function introduce($type = 0) {
		
	}
	/*------------end--------*/
	/*------------start--------*/
	public function news($page = 0) {
		$pagesize = 15;
		$res=$this->god->getPageResource($page,$pagesize,"news");
		$this->csmarty->assign("news",$res['Resource']);
		//$this->data['news']=$res['Resource'];
		$pages = $this -> page -> pageinfo($res['total'], $pagesize, base_url(), 4,$page,"news");
		$this->csmarty->assign("page",$pages['stspage']);
		$this->csmarty->assign("links",$this->pagination->create_links());
        $this->csmarty->display('news.html');  
	}
/*
				 璁�<b><?php echo $page['page']; ?></b> 椤礬/ 鍏�<b><?php echo $page['total']; ?></b> 鏉�
			 <?php echo $this->pagination->create_links(); ?>*/

	public function newsdetail($id = 0) {
		if($id==0){die("forbidden");}
		$get=$this->god->getDetail($id,"news");
		//var_dump($get);
		$this->csmarty->assign("newsdetail",$get['resource'][0]);
		$this->csmarty->assign("shang",$get['shang']);
		$this->csmarty->assign("xia",$get['xia']);
		$this->csmarty->display('newsdetail.html');  
	}
	/*------------end--------*/
	/*------------start--------*/
	public function products($type = 0) {
		
	}
	public function productsDetail($type = 0) {
		
	}
	/*------------end--------*/
	/*------------start--------*/
	public function purchase($type = 0) {
		
	}
	public function purchaseDetail($type = 0) {
		
	}
	/*------------end--------*/
	/*------------start--------*/
	public function projects($type = 0) {
		
	}
	
	public function projectsDetail($type = 0) {
		
	}
	public function jobs($type = 0) {
		
	}
	/*------------end--------*/
	/*------------start--------*/
	public function jobsDetail($type = 0) {
		
	}
	/*------------end--------*/
	
	public function info($type = 0) {
		
	}
	public function contact($type = 0) {
		
	}

}
	