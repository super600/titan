<body class="c1">
<?php $this->load->view("tool/right_style")?>
<!-- Reset Stylesheet -->
<div id="body-wrapper">
 
  <!-- End #sidebar -->
  <div id="main-content" style="margin:0px; padding:0px;">
    
    
    <div class="clear"></div>
    <!-- End .clear -->
	
<a href="<?php echo base_url("admin/newstype/add_")?>" class="button" style="float:right;">新闻类型列表</a>
	<div class="content-box">
      <!-- Start Content Box -->
      
	  <div class="content-box-header">
	    
        <h3>新闻类型列表 </h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">新闻类型列表</a></li>
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
                <th>名称</th>
                <th>备注</th>
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
	                <td><?php echo $v['name']?></td>
	                <td><a href="#" title="title"><?php echo $v['discription']?></a></td>
	                <td><?php echo date("Y-m-d",$v['time']);?></td>
	                <td>
	                  <!-- Icons -->
	                  <a href="<?php echo base_url("admin/newstype/edit_")."/".$v['id'];?>" title="Edit"><img src="<?php echo base_url("res/admin/mag/css/images/icons/pencil.png");?>" alt="Edit" /></a> 
	                  <a href="<?php echo base_url("admin/newstype/del_")."/".$v['id'];?>" title="Delete"><img src="<?php echo base_url("res/admin/mag/css/images/icons/cross.png");?>" onclick="return confirm('确认删除？');" alt="Delete"/></a> 
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
    <div class="notification attention png_bg" style="display:none;"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>

    <!-- End Notifications -->

  </div>
  <!-- End #main-content -->
</div>
 </body>
