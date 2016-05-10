<div class="row">
	<?php foreach($query as $item) : ?> 

		<div class="col-md-3">
			<div class="prdt-wrap">
			
				<a href="<?php base_url(); ?>site/product_details/<?php echo $item->id; ?>">
					<p class="text-center"><?php echo $item->product_name; ?></p>
					<div class="prdt-img">
						<img src="<?php echo base_url() . 'uploads/thumbs/' . $item->product_image;  ?>" alt="" class="img-responsive ">
					</div>
					
					<p class="text-center">
					<?php if($item->product_price == "0")
					{
						echo "Free Download";
					}
					else
					{
						echo "Rs. ".$item->product_price;
					}
					?>
					</p>
				</a>
				    
			</div>
		</div>
	<?php 	endforeach; ?>
</div>
