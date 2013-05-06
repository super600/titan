            <p>
              <label><?php echo $title;?></label>
              <select name="<?php echo $field;?>" class="small-input" onchange="selectfun<?php echo $field;?>(this);">
				<?php foreach($options as $k=>$v):?>
					<option value="<?php echo $k?>" <?php if(!empty($query)){ if($query[0][$field]==$k){echo "selected";}}?> ><?php echo $v;?></option>	
				<?php endforeach;?>
              </select>
			  <span style="display: none" name="su<?php echo $field;?>"   class="input-notification success png_bg">成功</span>
              <span style="display: none" name="er<?php echo $field;?>"    class="input-notification error png_bg">错误（内容为空）</span> 
            </p>
			<script>
			function selectfun<?php echo $field;?>(obj){
			try{
	        if(obj.value==0){
			$("span[name='su<?php echo $field;?>']").css('display','none');
			$("span[name='er<?php echo $field;?>']").css('display','inline');
			}else{
			$("span[name='su<?php echo $field;?>']").css('display','inline');
			$("span[name='er<?php echo $field;?>']").css('display','none');			
			}
			}catch(e){
			alert(e.message);
			}
			}
			</script>