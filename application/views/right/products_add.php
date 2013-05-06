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
        <h3>产品添加</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">产品添加</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="javascript:void(0);" class="default-tab">产品列表</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
			<?php if($dbtype=='save'):?>
			<?php $submit="提交信息";?>
			<form name="theform" action=" <?php echo base_url('admin/products/save_'); ?> " onsubmit="return checkinfo();"  method="post">
			<?php endif;?>
			
			<input type="hidden" value="" />
			<?php if($dbtype=='update'):?>
			<?php $submit="更新信息";?>
            <form name="theform" action=" <?php echo base_url('admin/products/edit_save')."/".$query[0]['id']; ?>" onsubmit="return checkinfo();" method="post">
			<?php endif;?>
		
		    <input type="hidden" value="<?php if(!empty($query)){echo $query[0]['id'];}?>" />
			<?php $this->load->view("tool/tag_middle",array(
													"title"=>'案例名称',
													"field"=>'title',
													))?>
			
			<?php $this->load->view("tool/tag_middle",array(
													"title"=>'优化名称',
													"field"=>'keywords',
													))?>
			 
			 <?php $this->load->view("tool/tag_middle",array(
													"title"=>'优化描述',
													"field"=>'description',
													))?>
			 
		  	<?php $this->load->view("tool/tag_multbiginput",array(
														"title"=>'项目简介',
														"field"=>'profile',
														))?>
		 
		  	<?php $this->load->view("tool/tag_select",array(
													"title"=>'风格类型',
													"field"=>'type',
													"options"=>array(
														"0"=>"请选择",
														"1"=>"案例风格1",
														"2"=>"案例风格2",
														"3"=>"案例风格3",
													)))?>
													
			<?php $this->load->view("tool/tag_types",array("title"=>"类型","field"=>"type","actiontype"=>"products"))?>
			
		  	<?php $this->load->view("tool/tag_textarea",array(
														"title"=>'案例详情',
														"field"=>'content',
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
