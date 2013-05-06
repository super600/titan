            <p>
              <label><?php echo $title;?></label>
              <input  id="id_<?php echo $field;?>" class="text-input medium-input datepicker" type="text" id="medium-input" value="<?php echo empty($query[0][$field])?"":$query[0][$field];?>" name="<?php echo $field;?>" />
              <span style="display: none" id="suc_<?php echo $field;?>" class="input-notification success png_bg">成功</span>
              <span style="display: none" id="err_<?php echo $field;?>"  class="input-notification error png_bg">错误（内容为空）</span> 
              <script>
            
              		function clear<?php echo $field;?>(){
              			$("#err_<?php echo $field;?>").hide();
              			$("#suc_<?php echo $field;?>").hide();
              		}
              		$("#id_<?php echo $field;?>").blur( function () { 
              			  
						 if($(this).val()==""){
						 	clear<?php echo $field;?>();$("#err_<?php echo $field;?>").show();
						 }else{
						 	clear<?php echo $field;?>();$("#suc_<?php echo $field;?>").show();
						 }
					}); 
              </script>
             </p>