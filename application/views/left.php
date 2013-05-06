<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>新闻管理平台</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->

<link rel="stylesheet" href="<?php echo base_url("res/admin/mag/")?>/css/oo/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url("res/admin/mag/")?>/css/oo/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?php echo base_url("res/admin/mag/")?>/css/oo/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url("res/admin/mag/")?>/js/oo/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?php echo base_url("res/admin/mag/")?>/js/oo/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?php echo base_url("res/admin/mag/")?>/js/oo/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?php echo base_url("res/admin/mag/")?>/js/oo/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="<?php echo base_url("res/admin/mag/")?>/js/oo/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php echo base_url("res/admin/mag/")?>/js/oo/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
	
	  <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
      <!-- Logo (221px wide) -->
      <img id="logo" src="<?php echo base_url("res/admin/mag/")?>/css/oo/logo.png"/>
      <!-- Sidebar Profile links -->
      <div id="profile-links"><!--<?php echo $_SESSION['username'];?>--><span class="username"></span>你好，欢迎使用后台系统</br><!--[<a href="<?php echo site_url('admin/sys_user/send_redirect') ?>" target="_blank">修改密码</a>]--><br />
        <br />
        [<a href="/" target="_blank">前台首页</a>] | [<a onClick="return confirm('提示：您确定要退出系统吗？')" href="<?php echo site_url("admin/mlogin_user/unlogin"); ?>"  target=_parent>注销退出</a>] </div>

      <ul id="main-nav">
        <!-- Accordion Menu -->
   
        <li> <a href="#" class="nav-top-item">首页</a>
			<ul>
				<li><a href='<?php echo base_url('admin/sysadmin/right') ?>' target='main'>首页</a></li>
			</ul>
        </li>
        
 
		
        <li><a href="#" class="nav-top-item">工程管理</a>
			<ul>
				<li><a href='<?php echo base_url('admin/projects/type'); ?>' target='main'>工程风格编辑</a></li>
				<li><a href='<?php echo base_url("admin/projects/add_"); ?>' target='main'>工程案例添加</a></li>
				<li><a href='<?php echo base_url("admin/projects/list_");?>' target='main'>工程案例列表</a></li>
			</ul>
        </li>

		<li><a href="#" class="nav-top-item">产品管理</a>
			<ul>
				
				<li><a href='<?php echo base_url('admin/products/type'); ?>' target='main'>产品类型编辑</a></li>
				<li><a href='<?php echo base_url("admin/products/add_"); ?>' target='main'>产品项目添加</a></li>
				<li><a href='<?php echo base_url("admin/products/list_");?>' target='main'>产品项目列表</a></li>
			</ul>
        </li>
		
		<li><a href="#" class="nav-top-item">招聘中心</a>
			<ul>
			    <li><a href="<?php echo base_url('admin/recruitments/add_'); ?>" target='main'>招聘信息添加</a></li>
				<li><a href='<?php echo base_url("admin/recruitments/list_");?>' target='main'>招聘信息列表</a></li>
			</ul>
        </li>
		
		<li><a href="#" class="nav-top-item">新闻中心</a>
			<ul>
			    <li><a href="<?php echo base_url('admin/newstype/add_'); ?>" target='main'>新闻类型添加</a></li>
				<li><a href='<?php echo base_url('admin/newstype/list_');?>' target='main'>新闻类型列表</a></li>
				<li><a href="<?php echo base_url('admin/news/add_'); ?>" target='main'>新闻信息添加</a></li>
				<li><a href='<?php echo base_url('admin/news/list_');?>' target='main'>新闻信息列表</a></li>
			</ul>
        </li>
		

		
		
        <li><a href="#" class="nav-top-item">系统管理</a>
			<ul>
				<li><a href='<?php echo base_url("admin/projects/add_"); ?>' target='main'>联系我们列表</a></li>
				<li><a href='<?php echo base_url("admin/projects/list_");?>' target='main'>留言管理列表</a></li>
				
				<li><a href='<?php echo base_url('admin/site/passwd_edit'); ?>' target='main'>密码修改</a></li>
				<li><a href='<?php echo base_url('admin/site/information_edit'); ?>' target='main'>基本信息</a></li>
			</ul>
        </li>

       	<li><a href="#" class="nav-top-item">其他</a>
			<ul>
				<li><a href='javascript:alert("暂无其他功能stone.tm")' target='main'>其他 </a></li>
			</ul>
        </li>

      </ul>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>

