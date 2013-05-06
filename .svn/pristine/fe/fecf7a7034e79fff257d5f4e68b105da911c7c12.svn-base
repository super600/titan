	<!----------------------------->
	<link rel="stylesheet" href="<?php echo base_url("res/kindeditor");?>/themes/simple/simple.css" />
	<link rel="stylesheet" href="<?php echo base_url("res/kindeditor");?>/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo base_url("res/kindeditor");?>/kindeditor.js"></script>
	<script charset="utf-8" src="<?php echo base_url("res/kindeditor");?>/lang/zh_CN.js"></script>
	<script charset="utf-8" src="<?php echo base_url("res/kindeditor");?>/plugins/code/prettify.js"></script>
	
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[id="content1"]', {
				cssPath : '<?php echo base_url();?>/res/kindeditor/plugins/code/prettify.css',
				uploadJson : '<?php echo base_url("files/base");?>',
				//fileManagerJson : '../php/file_manager_json.php',
				allowFileManager : false,
				filePostName : "userfile",
				allowFlashUpload:false,
				//同步数据
				afterBlur: function(){this.sync();},
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=introduce]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=introduce]')[0].submit();
					});
				}
			});
			
			prettyPrint();
		});
		
		
	</script>	

	<!----------------------------->