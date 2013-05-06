<body class="c1">
<?php $this->load->view("tool/right_style")?>
<!-- Reset Stylesheet -->
<div id="body-wrapper">
 
  <!-- End #sidebar -->
  <div id="main-content" style="margin:0px; padding:0px;">
    <?php
	
	function substrstt($str,$limit_length,$type=false) {          
     //返回的字符串   
	 //var_dump($limit_length);
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
		 //时间
	 //$tim2=date("Y-m-d",strtotime($v2['time'])); 
     return $return_str;   
	 }
 }
	
	?>
    
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>招聘信息列表</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">招聘信息列表</a></li>
          <!-- href must be unique and match the id of target div -->
          
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->

                    <div class="notification attention png_bg" style="display:none;"> <a href="#" class="close"><img src="<?php echo base_url("res/admin/mag/css/images/icons/cross_grey_small.png");?>" title="Close this notification" alt="close" /></a>
               <div> 谨慎操作 </div>
          </div>
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox" />
                </th>
                <th>岗位名称</th>
                <th>风格名称</th>
                
                <th>时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="5">
                  <div class="bulk-actions align-left" style="display:none;">
                    <select name="dropdown">
                      <option value="option1">Choose an action...</option>
                      <option value="option2">Edit</option>
                      <option value="option3">Delete</option>
                    </select>
                    <a class="button" href="#">Apply to selected</a> </div>
                    
                    
                  <div class="pagination"> 

                  	计 <b><?php echo $page['page']; ?></b> 页/ 共 <b><?php echo $page['total']; ?></b> 条							 <?php echo $this->pagination->create_links(); ?>
                  </div>
                  
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach($query as $k => $v):?>
              	   <tr>
	                <td>
	                  <input type="checkbox" />
	                </td>
	                <!--<td><?php $contentinfo=substrstt($v['title'],10,true); if(!empty($contentinfo)) echo $contentinfo; ?></td>-->
					<td><?php echo $v['title']; ?></td>
	                <td><a href="#" title="title">Sit amet</a></td>
	                <td><?php echo date("Y-m-d",$v['time']);?></td>
	                <td>
	                  <!-- Icons -->
	                  <a href="<?php echo base_url("admin/recruitments/edit_")."/".$v['id'];?>" title="Edit"><img src="<?php echo base_url("res/admin/mag/css/images/icons/pencil.png");?>" alt="Edit" /></a> 
	                  <a href="<?php echo base_url("admin/recruitments/del_")."/".$v['id'];?>" title="Delete" onclick="return confirm('确认删除？')"><img src="<?php echo base_url("res/admin/mag/css/images/icons/cross.png");?>" alt="Delete" /></a> 
	                  <a href="#" title="Edit Meta"><img src="<?php echo base_url("res/admin/mag/css/images/icons/hammer_screwdriver.png");?>" alt="Edit Meta" /></a> 
	                </td>

	              </tr>
              <?php endforeach;?>

         
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->

      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-left" style="display:none">
      <div class="content-box-header">
        <h3>Content box left</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>Maecenas dignissim</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-right closed-box" style="display:none;">
      <div class="content-box-header">
        <!-- Add the class "closed" to the Content box header to have it closed by default -->
        <h3>Content box right</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>This box is closed by default</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="clear"></div>
    <!-- Start Notifications -->
    <div class="notification attention png_bg" style="display:none;"> <a href="#" class="close"><img src="<?php echo base_url("res/admin/mag/css/images/icons/cross_grey_small.png");?>" title="Close this notification" alt="close" /></a>
      <div> Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>

    <!-- End Notifications -->

  </div>
  <!-- End #main-content -->
</div>
 </body>
