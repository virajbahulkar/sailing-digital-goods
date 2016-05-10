	<div class="row">
		<div class="widget_search_filter">
			<div class="col-md-3">
				<div class="category-wrapper">
					<p >Category</p>
					<ul>
						<?php if(!empty($categories)) : foreach($categories as $category) : ?>
										
						<li>
							<a href="#"><?php echo $category['category_name']; ?></a>
						</li>
							
						<?php endforeach; ?>

						<?php else : ?>
						
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<p >File Types</p>
						<ul class="filetypes">
							<?php if(!empty($fileTypes)) : foreach($fileTypes as $filetype) : ?>
									
							<li><a href="#"><?php echo $filetype['file_type_name']; ?></a></li>

							<?php endforeach; ?>
							
							<?php else : ?>

							<p>No records were returned.</p>
								
							<?php endif; ?>
						</ul>
					</div>
				</div>		
				<div class="row">
					<div class="col-md-12">
						<p>Total <?php echo $num_results; ?> results</p>
					</div>
					<?php if(!empty($products_data)) : foreach($products_data as $pdata) : ?>
					<div class="col-md-3">
						<div class="prdt-wrap">
						
							<a href="<?php echo base_url(); ?>site/product_details/<?php echo $pdata['id']; ?>">
								<p class="text-center"><?php echo $pdata['product_name']; ?></p>
								<div class="prdt-img">
									<img src="<?php echo base_url() . 'uploads/thumbs/' . $pdata['product_image'];  ?>" alt="" class="img-responsive ">
								</div>
								
								<p class="text-center">
								<?php if($pdata['product_price']=="0")
								{
									echo "Free Download";
								}
								else
								{
									echo "Rs. ".$pdata['product_price'];
								}
								?>
								</p>
							</a>
							    
						</div>
					</div>

					     <?php endforeach; ?>
					<?php endif; ?>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<nav>
						  <?php if (strlen($pagination)): ?>
						    <ul class="pagination">
						    
						    	
							  	<?php echo $pagination; ?> 	

						    </ul>
						  <?php endif; ?>
						    	    
						  
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
		

	
	  
