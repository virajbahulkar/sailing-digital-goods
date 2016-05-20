	
	<?php if(!empty($single_product)) : foreach($single_product as $sdata) : ?>
	<div class="row">
		<div class="widget_search_filter">
			<div class="col-xs-6">
				<div class="product-image">
					<img src="<?php echo base_url() . 'uploads/' . $sdata['product_image'];  ?>" alt="" class="img-responsive ">
					<hr>
					Tags: <?php echo $sdata['product_tags']; ?>
				</div>
			</div>
			<div class="col-xs-6">
				
				<h1><?php echo $sdata['product_name']; ?></h1>
				<p>Category: <?php echo $sdata['category_name']; ?></p>
				<hr>
				<p><?php echo $sdata['product_description']; ?></p>
				<?php if($sdata['product_price']=="0") : ?>
					
				<form action="<?php echo site_url('site/download_image'); ?>" method="post">
					<input type="hidden" name="img" value="<?php echo $sdata['product_image']; ?>">
					<button type="submit" name="download">Free Download</button>
				</form>	
								
				<?php else :  ?>
				<?php echo "Rs. ".$sdata['product_price']; ?>
				<button>BUY</button>
				<?php endif; ?>	
				
			</div>
		</div>
	</div>
	
	<?php endforeach; ?>
					<?php endif; ?>
						
		

	
	  
