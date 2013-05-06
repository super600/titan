	<?php foreach($category as $k=>$v):?>
		<?php if($v['fromid']==0):?>
			<li><a href="<?php echo base_url("productcategorybig_").$v['id'].".html";?>"><?php echo $v['typename']?></a></li>
			<?php foreach($category as $kc=>$vc):?>
				<?php if($vc['fromid']==$v['id']):?>
					<li class="csubset" ><a href="<?php echo base_url("productcategory_").$vc['id'].".html";?>"><?php echo $vc['typename']?></a></li>
				<?php endif;?>
			<?php endforeach;?>
		<?php endif;?>
	<?php endforeach;?>
		