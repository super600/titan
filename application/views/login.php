<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>阿门后台</title>
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
</head>
<body id="login">
	<center>
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>Simpla Admin</h1>
    <!-- Logo (221px width) -->
    <img id="logo" src="css/oo/logo.png" alt="Simpla Admin logo" /> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form action="<?php echo site_url('admin/mlogin_user'); ?> "  method="post" name="form1">
      <div class="notification information png_bg">
        <div> 请输入用户名，密码，验证码 </div>
      </div>
      <p>
        <label>&nbsp;&nbsp;用户名</label>
        <input class="text-input" name="username" type="text" />
      </p>
      <div class="clear"></div>
      <p>
        <label>&nbsp;&nbsp;密码</label>
        <input class="text-input" name="password" type="password" />
      </p>
      <div class="clear"></div>
      <p>
    	<label>&nbsp;&nbsp;验证吗</label>
    	
    		<input class="text-input" name="checkcode" style="width: 90px;" type="text" />
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<img  src="<?php echo site_url('admin/sysadmin/code');?>" style="cursor:hand" onclick='this.src=this.src+"/";'title="看不清，换一个"/>
				
      </p>
      
      <div class="clear"></div>
      <p>
          
          <input   class="button" type="submit" value="登录" style="margin-left: 50px;"/>
         <input   class="button" type="reset" value="重置" />
         
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
</center>
<!-- End #login-wrapper -->
</body>
</html>
