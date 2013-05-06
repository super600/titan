<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("res/admin/mag");?>/css/oo/base.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url("res/admin/mag");?>/css/oo/main.css" />

<!--<link rel="stylesheet" href="css/oo/reset.css" type="text/css" media="screen" />-->

<link rel="stylesheet" href="<?php echo base_url("res/admin/mag");?>/css/oo/style_right.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo base_url("res/admin/mag");?>/css/oo/invalid.css" type="text/css" media="screen" />

</head>
<body leftmargin="8" topmargin='8'>
<!--<div id="main-content">-->
	
    <ul class="shortcut-buttons-set">
	   <li><a class="shortcut-button" href="<?php echo site_url('admin/news_type/news_type_list'); ?>"><span> <img src="css/images/icons/list.png" alt="icon" /><br />
        新闻分类 </span></a>
		</li>
		
      <li><a class="shortcut-button" href="<?php echo site_url('admin/news/news_list'); ?>"><span> <img src="css/images/icons/listmanage.png" alt="icon" /><br />
        新闻列表 </span></a>
		</li>
		
		
      <li><a class="shortcut-button" href="<?php echo site_url('admin/sys_user/send_url') ?>"><span> <img src="css/images/icons/update.png" alt="icon" /><br />
        添加管理员 </span></a>
		</li>
		
		
      <li><a class="shortcut-button" href="<?php echo site_url('admin/sys_user/manager_list') ?>"><span> <img src="css/images/icons/business.png" alt="icon" /><br />
        管理员管理 </span></a>
		</li>
		
      <li><a class="shortcut-button" href="<?php echo site_url('admin/news/redirect_url'); ?>"><span> <img src="css/images/icons/phone.png" alt="icon" /><br />
        添加新闻 </span></a>
		</li>
		
      <li><a class="shortcut-button" href="<?php echo site_url('admin/sys_user/role_manage') ?>"><span> <img src="css/images/icons/comment_48.png" alt="icon" /><br />
        角色管理</span></a>     
		</li>
		
		

    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>系统基本信息</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
      <table width="100%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC">
			  <tr bgcolor="#FFFFFF">
				<td width="40%" bgcolor="#FFFFFF">您的级别：管理员</td>
				<td width="40%" bgcolor="#FFFFFF">版本信息：stone.tm 后台系统1.0</td>
			  </tr>
			  <tr bgcolor="#FFFFFF">
				<td>当前服务器：<?php echo $fuwuqi;?></td>
				<td>php版本：php<?php echo $banben;?> </td>
			  </tr>
			<tr bgcolor="#FFFFFF">
				<td>数据库类型：mysql<?php echo $mydb;?></td>
				<td>单个文件上传最大允许：<?php echo $size;?></td>
			  </tr>
			  <tr bgcolor="#FFFFFF">
				<td>本次登录ip：<?php echo $_SERVER['REMOTE_ADDR'];?></td>
				<td>服务器ip：<?php //echo $_SERVER['SERVER_ADDR'];?> 未显示</td>
			  </tr>
			   <tr bgcolor="#FFFFFF">
				<td>网站编码：UTF8</td>
				<td>当前时区：<?php echo date_default_timezone_get();?></td>
			  </tr>
			  <tr bgcolor="#FFFFFF">
				<td>开发者：<font color="red">neo,tbt</font></td>
				<td>开发组：Stoner</td>
			  </tr>
		</table>

      </div>
      <!-- End .content-box-content -->
    </div>

    <div class="notification success png_bg"> <a href="#" class="close"></a>
      <div> 环境需求： 为保证系统正常运行请选择php5.0版本以上,mysql4.0版本以上</div>
    </div>
	
	<div class="notification success png_bg"> <a href="#" class="close"></a>
      <div> 本系统由云浮市阿门网络科技有限公司开发，如有疑问请联系云浮阿门网络技术有限公司，电话：83200498</div>
    </div>

</body>
</html>