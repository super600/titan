<?php
/**
 *
 * god
 *
 */
class god extends CI_Model {
	var $prefix="titan_";
	public function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model("base_model");
		$this -> load -> library("csmarty");
		$this->csmarty->assign("information",$this->getInformation());
		//$this->csmarty->assign("information",$this->getInformation());
	}

	public function insert_img($params){
		$this->db->insert('am_img', $params); 
		return $this->db->insert_id();
	}
	
	public function getProduct($num,$len=10/**/){
		$this->db->limit($len);
		return $this->db->get($this->prefix."product")->result_array();
	}
	
	/*
	 *  $this->csmarty->assign("product",$this->god->getProduct(10,));
		$this->csmarty->assign("project",$this->god->getProject(10,));
		$this->csmarty->assign("news",$this->god->getNews(10,));
		$this->csmarty->assign("information",$this->god->getInformation());
	 * */ 
	 
	 public function getProject($num,$len=10/**/){
	 	$this->db->limit($len);
		return $this->db->get($this->prefix."project")->result_array();
	 }
	 
	 public function getNews($num,$len=10/**/){
	 	$this->db->limit($len);
		return $this->db->get($this->prefix."news")->result_array();
	 }
	 
	 
	 
	 public function getDetail($id,$database=null){
	 	$res=array();
	 	if(empty($database)){die();}
		$this->db->where("id",$id);
		$this->detail =$this->db->get($this->prefix.$database)->result_array();
		if(empty($this->detail)){
			show_404();
		}

		#得到大于上一页的数据
		$this->db->select("id,title");
		$this->db->where('id <',$id);
		//$this->db->where($this->prefix."project.companyid",$this->companyid);
		$this->db->order_by("id",'desc');	
		$this->db->limit(1);
		$res=$this->db->get($this->prefix.$database)->result_array();
		//var_dump($res);
		@$return['shang']=$res[0];
		
		#得到大于下一页的数据
		$this->db->select("id,title");
		$this->db->where('id >',$id);
		//$this->db->where($this->prefix."project.companyid",$this->companyid);
		$this->db->order_by("id",'asc');	
		$this->db->limit(1);
		$res=$this->db->get($this->prefix.$database)->result_array();
		@$return['xia']=$res[0];
		
			
	 	$this->db->where("id",$id);
		$return['resource']=$this->db->get($this->prefix.$database)->result_array();
		return $return;
	 }
	 
	 public function getInformation(){
	 	$res= $this->db->get($this->prefix ."information")->result_array();
		return $res[0];
	 }
	 
	 public function getIntroduce(){
	 	$res= $this->db->get($this->prefix ."information")->result_array();
		return $res[0];
	 }
	
	 public function getPageResource($page=0,$pagesize=null,$database=null,$type=null,$select="*"){
		if($pagesize!=null){
			if($database!=null){
				$this -> db -> select("id");
				if($type!=null){$this->db->where("type",$type);}
				$nums = $this -> db -> get($this->prefix.$database)->result_array();
				$res['total'] = count($nums);
				$offset = $pagesize * ($page > 0 ? ($page - 1) : 0);
				$this -> db -> select($select);
				$this -> db -> limit($pagesize, $offset);
				$this->db->order_by("id", "desc");
				if($type!=null){$this->db->where("type",$type);}
				$res["Resource"]=$this -> db -> get($this->prefix.$database) -> result_array();
				return $res;
			}else{show_error("database 参数未传");}
		}else{show_error("pagesize 参数未传");}
	}
	  
	/**
	 * @see 简化 function getwhere 
	 * @version   alpha  2013 - 3 - 30
	 * */
	public function SetPageSeo($method){
		if($method!=null){
			//var_dump($res);die();
			$res=$this->getPageSeo($this->companyid,$method);
			$this->load->setKeyword(empty($res[0]['keyword_content'])?"":$res[0]['keyword_content']);
			$this->load->setDescription(empty($res[0]['description_content'])?"":$res[0]['description_content']);
			$this->load->setHtmltitle((empty($res[0]['title_content'])?"":$res[0]['title_content']).'_'.$this->basedata[0]['companyname']);
			//$this->load->setHtmltitle("123213");
		}
	}
	 
	public function getWhere($switch=null){
		//添加网站访问次数
		$methodClass="stone::";
		//echo $methodClass;exit();
		//$this->add_visitor("major");
		if(!empty($methodClass)){//设置seo关键词
			switch ($switch) {
				case $methodClass."index":$this->SetPageSeo("index");break;
				case $methodClass."introduce":$this->SetPageSeo("introduce");break;
				case $methodClass."news":$this->SetPageSeo("news");break;
				case $methodClass."products":$this->SetPageSeo("products");break;
				case $methodClass."purchase":$this->SetPageSeo("purchase");break;
				case $methodClass."projects":$this->SetPageSeo("projects");break;
				case $methodClass."jobs":$this->SetPageSeo("jobs");break;
				case $methodClass."info":$this->SetPageSeo("info");break;
				case $methodClass."contact":$this->SetPageSeo("contect");break;
				//不同类别的 category
				case $methodClass."productcategory"://$this->SetCatSeo("productcategory");break;
					$res=$this->getCatSeo($this->category);
					//var_dump($res);
					$this->load->setKeyword(empty($res[0]['keyword_content'])?"":$res[0]['keyword_content']);
					$this->load->setDescription(empty($res[0]['description_content'])?"":$res[0]['description_content']);
					$this->load->setHtmltitle((empty($res[0]['title_content'])?"":$res[0]['title_content']).'_'.$this->basedata[0]['companyname']);
			
					break;
				case $methodClass."productcategorybig"://$this->SetCatSeo("productcategory");break;
					$res=$this->getCatSeo($this->category);
					//var_dump($res);
					$this->load->setKeyword(empty($res[0]['keyword_content'])?"":$res[0]['keyword_content']);
					$this->load->setDescription(empty($res[0]['description_content'])?"":$res[0]['description_content']);
					$this->load->setHtmltitle((empty($res[0]['title_content'])?"":$res[0]['title_content']).'_'.$this->basedata[0]['companyname']);
			
					break;
				/*-------------------------下面有详细页面编辑---------------------------------------------------------------*/
				
				case $methodClass."purchasedetail":
					$this->load->setKeyword($this->PurchesaDetail[0]['keywords']);
					$this->load->setDescription($this->PurchesaDetail[0]['description']);
					$this->load->setHtmltitle($this->PurchesaDetail[0]['htmltitle'].'_'.$this->basedata[0]['companyname']);
					break;
				case $methodClass."productdetail":
					$this->load->setKeyword($this->ProductDetail[0]['keywords']);
					$this->load->setDescription($this->ProductDetail[0]['description']);
					$this->load->setHtmltitle($this->ProductDetail[0]['htmltitle'].'_'.$this->basedata[0]['companyname']);
					break;
				case $methodClass."jobdetail":
					$this->load->setKeyword($this->JobDetail[0]['keywords']);
					$this->load->setDescription($this->JobDetail[0]['description']);
					$this->load->setHtmltitle($this->JobDetail[0]['jobname'].'_'.$this->basedata[0]['companyname']);
					break;
				case $methodClass."projectdetail":
					$this->load->setKeyword($this->ProjectDetail[0]['keywords']);
					$this->load->setDescription($this->ProjectDetail[0]['description']);
					$this->load->setHtmltitle($this->ProjectDetail[0]['title'].'_'.$this->basedata[0]['companyname']);
					break;
				case $methodClass."newdetail":
					$this->load->setKeyword($this->NewsDetail[0]['keywords']);
					$this->load->setDescription($this->NewsDetail[0]['description']);
					$this->load->setHtmltitle($this->NewsDetail[0]['title'].'_'.$this->basedata[0]['companyname']);
				break;
			}
			
			
			switch($switch){
				//时间仓储 没写好 还望以后的仁兄慢慢完善 class 参数 有个 :: 注意下
				case $methodClass."index":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a></span>";break;
				case $methodClass."introduce":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/introduce.html')."'>企业简介</a></span>";break;
				case $methodClass."news":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/news.html')."'>新闻中心</a></span>";break;
				case $methodClass."newdetail":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/news.html')."'>新闻中心</a>>></span> <span><a href=''>详细新闻</a></span>";break;
				case $methodClass."products":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/products.html')."'>产品供应</a></span>";break;
				case $methodClass."purchasedetail":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/purchase.html')."'>产品采购</a>>></span> <span><a href=''>产品采购详情</a></span>";break;
				case $methodClass."purchase":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/purchase.html')."'>产品采购</a></span>";break;
				
				case $methodClass."productdetail":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/products.html')."'>产品供应</a>>></span>".$this->ProductUrl." <span><a href=''>产品详细介绍</a></span>";break;
				case $methodClass."projects":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/projects.html')."'>工程案例</a></span>";break;
				case $methodClass."projectdetail":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/projects.html')."'>工程案例</a>>></span> <span><a href=''>工程案例详细介绍</a></span>";break;
				case $methodClass."jobs":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/jobs.html')."'>人才招聘</a></span>";break;
				case $methodClass."jobdetail":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/jobs.html')."'>人才招聘</a>>></span><span><a href=''>人才招聘详细</a></span>";break;
				case $methodClass."info":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/info.html')."'>信息反馈</a></span>";break;
				case $methodClass."contact":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/contect.html')."'>联系我们</a></span>";break;
				
				case $methodClass."productcategory":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/products.html')."'>产品供应</a>>></span>"."<span><a href='".base_url('/productcategorybig_'.$this->categoryNameBig['id'].'.html')."'>".$this->categoryNameBig['typename']."</a>>></span>"."<span><a href='".base_url('/productcategory_'.$this->category.'.html')."'>".$this->categoryName."</a></span>";break;
				case $methodClass."productcategorybig":$methodClass=str_replace("::", '', $methodClass);return "<span><a href='".base_url()."'>首页</a>>></span><span><a href='".base_url('/products.html')."'>产品供应</a>>></span><span><a href='".base_url('/productcategorybig_'.$this->category.'.html')."'>".$this->categoryName."</a></span>";break;
				default :return "<span>首页</span>";break;
			}
		}
	}



	public function getCategory($type){
		$data['category']=$this->db->query("select typename,id,fromid from titan_types where titan_types.actiontype = '".$type."'")->result_array();
		return $this->load->view("template_tool/category",$data,true);
	}
}
