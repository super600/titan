<?php $this -> load -> view("tool/public_head",array("posturl"=>"admin/site/information_save","title"=>"公司信息添加"))?>
				<?php $this -> load -> view("tool/tag_small",array("title"=>"联系人","field"=>"name"))?>
				<?php $this -> load -> view("tool/tag_small",array("title"=>"公司传真","field"=>"fax"))?>
				<?php $this -> load -> view("tool/tag_small",array("title"=>"公司email","field"=>"email"))?>
				<?php $this -> load -> view("tool/tag_small",array("title"=>"公司地址","field"=>"address"))?>
				<?php $this -> load -> view("tool/tag_small",array("title"=>"负责人手机号'","field"=>"mobel_phone"))?>
				<?php $this -> load -> view("tool/tag_small",array("title"=>"分布电话","field"=>"phone"))?>
				<?php $this -> load -> view("tool/tag_img",array( 'field'=>'logo',
																	'field2'=>'logo_ext',	
																	"id"=>1
																	));?>		
				<?php $this->load->view("tool/tag_textarea",array(
															"title"=>'公司联系内容',
															"field"=>'content',
															));?>																
<?php $this -> load -> view("tool/public_foot")?>

