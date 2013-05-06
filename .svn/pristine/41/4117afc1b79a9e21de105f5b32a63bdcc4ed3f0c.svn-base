<body class="c1">
<?php $this->load->view("tool/right_style")?>
<!-- Reset Stylesheet -->
<div id="body-wrapper">
 <style>
 input, lable,select{
 padding: 6px;
font-size: 13px;
background: hsl(0, 100%, 100%) url('<?php echo base_url('res/admin/mag/css/images/icons/bg-form-field.gif');?>') top left repeat-x;
border: 1px solid hsl(0, 0%, 84%);
color: hsl(0, 0%, 20%);
 }
 </style>
  <!-- End #sidebar -->
  <div id="main-content" style="margin:0px; padding:0px;">
    <?php
	function substrs($str,$limit_length,$type=false) {          
     //返回的字符串   
     $return_str   = "";   
     //总长度，一个汉字算两个位置   
     $total_length = 0;   
     // 以utf-8格式求字符串的长度，每个汉字算一个长度   
     $len = mb_strlen($str,'utf8');   
     for ($i = 0; $i < $len; $i++) {   
         //以utf-8格式取得第$i个位置的字符，取的长度为1   
         $curr_char   = mb_substr($str,$i,1,'utf8');   
         //如果字符的ACII编码大于127，则此字符为汉字，算两个长度   
         $curr_length = ord($curr_char) > 127 ? 2 : 1;   
         // 计算下一个utf8单位字符的长度，结果存入next_length   
         if ($i != $len -1) {   
             $next_length = ord(mb_substr($str,$i+1,1,'utf8')) > 127 ? 2 : 1;   
         } else {   
             $next_length = 0;//如果到最后一个字符了，则结束   
         }   
         // 如果总长度加上当前长度加上下一个单位的长度大于limit，则返回字符串，否则继续循环   
         if ( $total_length + $curr_length + $next_length > $limit_length ) {   
             if($type){   
                 $return_str .= $curr_char;   
                 return "{$return_str}...";   
             }else{   
                 $return_str .= $curr_char;   
                 return "{$return_str}";   
             }   
         } else {   
             $return_str .= $curr_char;   
             $total_length += $curr_length;   
         }   
     }   
     return $return_str;   
    } 

	?>
    
	<script type="text/javascript">
	function indexchange(obj){
	try{
	if(obj.value==0){
	document.getElementById("checkspan").style.display='none';
	}else{
	document.getElementById("checkspan").style.display='inline';
	}
	
	//alert(obj.value);
	//alert($("input[name='dropdown']").val)
	//alert(document.getElementById("indexchange").innerHTML);
	}catch(e){
	alert(e.message);
	}
	}
	
	function checkname(obj){
	try{
	alert("");
	alert(obj.value);
	}catch(e){
	alert(e.message);
	}
	}
	</script>
	
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>招聘中心</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">招聘中心</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="javascript:void(0);" class="default-tab">招聘中心</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
			<?php if($dbtype=='save'):?>
			<?php $submit="提交信息";?>
			<form name="theform" action=" <?php echo base_url('admin/recruitments/save_'); ?> " onsubmit="return checkinfo();"  method="post">
			<?php endif;?>
			
			<input type="hidden" value="" />
			<?php if($dbtype=='update'):?>
			<?php $submit="更新信息";?>
            <form name="theform" action=" <?php echo base_url('admin/recruitments/edit_save')."/".$query[0]['id']; ?>" onsubmit="return checkinfo();" method="post">
			<?php endif;?>
		  
		    <input type="hidden" value="<?php if(!empty($query)){echo $query[0]['id'];}?>" />
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'岗位名称',
			"field"=>'title',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'工作地点',
			"field"=>'workplace',
			))?>
			

			
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'最低学历',
			"field"=>'degree',
			))?>
			
			<?php $this->load->view("tool/tag_select",
			array(
			"title"=>'工作性质',
			"field"=>'jobnature',
			"options"=>array(
			"0"=>"请选择",
			"1"=>"兼职",
			"2"=>"全职",
			)
			))?>
			
			<?php $this->load->view("tool/tag_select",
			array(
			"title"=>'管理经验',
			"field"=>'manageexpress',
			"options"=>array(
			"0"=>"--请选择--",
			"1"=>"是",
			"2"=>"否",
			)
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'公司地址',
			"field"=>'address',
			))?>
			
			<?php $this->load->view("tool/tag_select",
			array(
			"title"=>'管理经验',
			"field"=>'workexpress',
			"options"=>array(
			"0"=>"--请选择--",
			"1"=>"一年以下",
			"2"=>"一年至两年",
			"3"=>"二年至三年",
			"4"=>"三年至四年",
			"5"=>"四年至五年",
			"6"=>"五年至十年",
			)
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'招聘人数',
			"field"=>'number',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'联系电话',
			"field"=>'phone',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'邮箱',
			"field"=>'e-mail',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'传真',
			"field"=>'fax',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'联系人',
			"field"=>'name',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'薪资待遇',
			"field"=>'salary',
			))?>
			
			<?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'优化名称',
			"field"=>'kyd',
			))?>
			 
			 <?php $this->load->view("tool/tag_middle",
			array(
			"title"=>'优化描述',
			"field"=>'dis',
			))?>
			
		  	<?php $this->load->view("tool/tag_textarea",
			array(
			"title"=>'职位描述',
			"field"=>'conditions',
			))?>
		  
		  <p>
		  <input type="submit" class="button" value=" <?php echo $submit;?> " />
		  </p>
		  </form>
        </div>
        <!-- End #tab1 -->

      </div>
      <!-- End .content-box-content -->
    </div>

    <div class="clear"></div>


  </div>
  <!-- End #main-content -->
</div>
 </body>
