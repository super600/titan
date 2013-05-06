			<!--上传 图片 -->

	<script>

		var runUpload<?php echo $id;?> = function() {
			var swfu<?php echo $id;?>;
	
			var settings<?php echo $id;?> = {
				flash_url : "<?php echo base_url();?>/res/swfupload/swfupload.swf",
				upload_url: "<?php echo base_url('files/img');?>",
				post_params: {"stones" : "<?php echo session_id(); ?>"},
				file_size_limit : "2 MB",
				file_post_name : "userfile",
				file_types : "*.jpg;*.png;*.gif;*.jpeg",
				file_types_description : "All Files",
				file_upload_limit : 5,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress<?php echo $id;?>",
					cancelButtonId : "btnCancel<?php echo $id;?>"
				},
				debug: false,

				// Button settings
				button_width: "65",
				button_height: "20",
				button_placeholder_id: "spanButtonPlaceHolder<?php echo $id;?>",
				button_text: '<span class="theFont">上传</span>',
				button_text_style: ".theFont { font-size: 14;}",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				swfupload_preload_handler : preLoad,
				swfupload_load_failed_handler : loadFailed,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress<?php echo $id;?>,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess<?php echo $id;?>,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
			};
			
			function uploadProgress<?php echo $id;?>(file, bytesLoaded, bytesTotal) {
				try {
					var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);
					console.log(percent);
					$('#Progress<?php echo $id;?>').html(percent);
				} catch (e) {
				}
			}
			
			function uploadSuccess<?php echo $id;?>(obj,message){
				//
				console.log(message);
				json=JSON.parse(message);
				
				console.log(json);
				var img='<img style="float:left;" src="'+json.url+"_x"+json.ext+'" width="50" height="50">'
				$("#imgbox<?php echo $id?>").html(img);
				$("#img_url<?php echo $id?>").val(json.url);
				$("#img_ext<?php echo $id?>").val(json.ext);
				
			}
			swfu<?php echo $id;?> = new SWFUpload(settings<?php echo $id;?>);
	     };
	     //定义上传方法
	     $(function(){
	     	runUpload<?php echo $id;?>();
		 });
	</script>
			
        <div id="imgbox<?php echo $id;?>">
	        <?php if(!empty($name)):?>
	        	<?php echo '<img style="float:left;" src="'.$name.'" width="50" height="50" />';?>
	       	<?php endif?>
		</div>
		
		<div>
			<div  style="float: left;height: 30px;padding: 10px;border:1px solid #ADADAD">
				<span id="spanButtonPlaceHolder<?php echo $id;?>"></span>
				<input id="btnCancel<?php echo $id;?>" type="button" value="取消上传" 
					onclick="swfu<?php echo $id;?>.cancelQueue();" 
					disabled="disabled" />
			</div>
			
			<div style="float: left;" id="Progress<?php echo $id;?>"></div>
			<input id="img_url<?php echo $id;?>" name="<?php echo $field?>" value="<?php echo empty($query[0][$field])?"":$query[0][$field];?>" type="hidden">
			<input id="img_ext<?php echo $id;?>" name="<?php echo $field2?>" value="<?php echo empty($query[0][$field2])?"":$query[0][$field2];?>" type="hidden">
		</div>
