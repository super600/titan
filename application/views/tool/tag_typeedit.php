<html>
<head>
	
	<?php $this->load->view("tool/jqueryui");?>
	<script>

	function addBigType(companyid){
		var url="<?php echo base_url("admin/".$actiontype."/type_add");?>/big/";
		var val=prompt("请输入大分类名字");
		
		if(val=="" || val ==null){alert("您未输入");return false;}
		
		url=url+val;
		$.get(url,function(data){
			//alert(data);
			if(data=='success'){
				location.reload();
			}else{
				alert(data);
			}
		});
	}
	
	
	function addSmallType(fromid){
		var url="<?php echo base_url("admin/".$actiontype."/type_add");?>/"+fromid+"/";
		var val=prompt("请输入小分类名字");
		if(val==""  || val ==null){alert("您未输入");return false;}
		url=url+val;
		//alert(url);
		$.get(url,function(data){
			//alert(data);
			if(data=='success'){
				location.reload();
			}else{
				alert(data);
			}
		});
	}
	
	function typeNameChange(typeid){
		if(typeid=="" || typeid==null ){
			alert("错误");
			return false;
		}
		var newtypename = prompt("请输入类型的新名字")
		if(newtypename=="" || newtypename==null ){
			alert("错误");
			return false;
		}
		
		var url="<?php echo base_url("admin/".$actiontype."/typename_change");?>";

		object={
			"typeid":typeid,
			"typename":newtypename
		}
		$.post(url,object,function(data){
			if(data=='success'){
				//console.log(data);
				location.reload();
			}
			//console.log(data);
		});
	}
	
	function typeDel(typeid){
		if(!confirm("你确定要删除?")){
			return false;
		}
		var url="<?php echo base_url("admin/".$actiontype."/type_del");?>/"+typeid;
		$.get(url,function(data){
			if(data=='success'){
				location.reload();
			}else{
				alert(data);
			}
		});
	}
	
	function  editTypeSeo(id,val){
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height:250,
			width:500,
			modal: true,
			buttons: {
				"更新": function() {
					title_content= $("input[title=title]").val();
					keyword_content=$("input[title=keyword]").val();
					description_content= $("input[title=description]").val();
					url="<?php echo base_url("admin/".$actiontype."/typeseo_add")?>";
					object={"typeid":id,"title":title_content,
											"keyword":keyword_content,
											"description":description_content};
					//console.log(object);
					$.post(url,object,function(data){
						//console.log(data);
						if(data!='success'){
							alert(data);
						}else{
							alert("添加成功");
							$( "#dialog-confirm").dialog( "close" );
						}
					});
				},
				Cancel: function() {
					$( this ).dialog( "close" );
					$("input[title=title]").val("");
					$("input[title=keyword]").val("");
					$("input[title=description]").val("");
					id=null;
				}
			},
			close:function(){
				$( this ).dialog( "close" );
				$("input[title=title]").val("");
				$("input[title=keyword]").val("");
				$("input[title=description]").val("");
				id=null;
			},
			
			open:  function () {
				//修改tips
				$("#typetips").html(val);
				//请求服务器获取对应id的数据
				var url="<?php echo base_url("admin/".$actiontype."/gettypeseo");?>/"+id;
				$.get(url,function(data){
					var data=JSON.parse(data);
					//console.log(data[0]);
					//sdata
					try{
						$("input[title=title]").val(data[0].title_content);
						$("input[title=keyword]").val(data[0].keyword_content);
						$("input[title=description]").val(data[0].description_content);
					}catch(e){
						//console.log(e);
					}
				});
			}
		});
	}
	$(function(){
		//$( "#menu" ).menu();
		
		$( "input[type=button]").button();
	});
	</script>
	<style>
	.ui-menu { width: 250px; }
	.del{float:left;}
	</style>
</head>
<body>
<input type="button" onclick="javascript:history.go(-1)" value="返回"/>
<input type="button" onclick="javascript:addBigType()" value="添加大分类"/>

<ul id="menu">
	<?php if(!empty($query)): ?>
	<?php foreach($query as $k => $v):?>
		<?php //if($v['fromid']==0):?>
		<li>
			<?php $kv=explode('-', $k)?>
			<a href="#"><?php echo $kv[1]?></a> <a style =" color:green;"  href="javascript:addSmallType(<?php echo $kv[0]?>)">[添加子分类]</a>
								&nbsp;&nbsp;<a style="color:#320;" href="javascript:typeNameChange(<?php echo $kv[0]?>)">[名字修改]</a>
								&nbsp;&nbsp;<a style="color:red;font:8px" href="javascript:typeDel(<?php echo $kv[0]?>)">[删除]</a>
								&nbsp;&nbsp;<a href="javascript:editTypeSeo(<?php echo $kv[0]?>,'<?php echo $kv[1]?>')">[编辑seo关键词]</a>
			<?php if(!empty($v)):?>
				<ul>
					<?php foreach($v as $kc => $vc):?>
						<li><a href="#"><?php echo $vc['typename']?></a>
							
								&nbsp;&nbsp;<a style="color:#320;" href="javascript:typeNameChange(<?php echo $vc["id"]?>)">[名字修改]</a>
								&nbsp;&nbsp;<a style="color:red;" href="javascript:typeDel(<?php echo $vc["id"]?>)">[删除]</a>
								&nbsp;&nbsp;<a href="javascript:editTypeSeo(<?php echo $vc["id"]?>,'<?php echo $vc["typename"]?>')">[编辑seo关键词]</a></li>
					<?php endforeach;?>
				</ul>
			<?php endif;?>
		</li>
		<?php //endif;?>
	<?php endforeach;?>
	<?php else:echo "暂时无分类赶快添加吧^_^";endif;?>
	<!--<li class="ui-state-disabled"><a href="#">Amesville</a></li>-->
</ul>

<!---- dialog start --->
<div id="dialog-confirm" style="display: none" title="seo关键词编辑">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
			请把相应的seo关键词填入对应的框内! &nbsp;&nbsp;&nbsp;类别:<span style="color:red;" id="typetips"></span>
	</p>
	<form class="seoform">
		<table>
		<tr>
			<td>title</td><td><input title="title" type="text" /></td>
		</tr>
		<tr>
			<td>keyword</td><td><input title="keyword" type="text" /></td>
		</tr>
		<tr>
			<td>description</td><td><input title="description" type="text" /></td>
		</tr>
		</table>
	</form>
</div>
<!---- dialog end --->
<style>
	.seoform table{
		width:100%;
	}
	.seoform input{
		width:100%;
	}
</style>


</body>
</html>