            <p>
              <label><?php echo $title;?></label>
              <input id="passwd1_<?php echo $field;?>" class="text-input small-input" type="password" id="small-input" value="" name="<?php echo $field;?>" />
              <input id="passwd2_<?php echo $field;?>" class="text-input small-input" type="password" id="small-input" value="" name="<?php echo $field;?>" />
              <span style="display: none" id="suc_<?php echo $field;?>" class="input-notification success png_bg">密码有效</span>
              <span style="display: none" id="err_<?php echo $field;?>"  class="input-notification error png_bg">错误密码无效</span> 
              <script>
              		function clear<?php echo $field;?>(){
              			$("#suc_<?php echo $field;?>").hide();
              			$("#err_<?php echo $field;?>").hide();
              		}
              		$("#passwd2_<?php echo $field;?>,#passwd1_<?php echo $field;?>").blur( function () { 
						 if($("#passwd2_<?php echo $field;?>").val()!=$("#passwd1_<?php echo $field;?>").val()){
						 	clear<?php echo $field;?>();$("#err_<?php echo $field;?>").show();
						 }else{
						 	clear<?php echo $field;?>();$("#suc_<?php echo $field;?>").show();
						 }
					}); 
              </script>
              <!-- Classes for input-notification: success, error, information, attention -->
              <br />
              <small><?php echo empty($mesage)?"":$mesage;?></small> 
            </p>