	<div class="row">
		<div class="widget_search_filter">
			<div class="col-md-3">
				<div class="category-wrapper">
					<p >Category</p>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>site/show_all">Show All</a>
						</li>
						<?php if(!empty($categories)) : foreach($categories as $category) : ?>
										
						<li>

							<a class="<?php if($category['id'] == $this->uri->segment(3)) { echo "active"; } ?>" href="<?php echo base_url(); ?>site/category/<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a>
						</li>
							
						<?php endforeach; ?>

						<?php else : ?>
						
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				
				<div class="row">
					
					<?php if(!empty($cat_products)) : foreach($cat_products as $cpdata) : ?>
					<div class="col-md-3">
						<div class="prdt-wrap">
						
							<a href="<?php echo base_url(); ?>site/product_details/<?php echo $cpdata['id']; ?>">
								<p class="text-center"><?php echo $cpdata['product_name']; ?></p>
								<div class="prdt-img">
									<img src="<?php echo base_url() . 'uploads/thumbs/' . $cpdata['product_image'];  ?>" alt="" class="img-responsive ">
								</div>
								
								<p class="text-center">
								<?php if($cpdata['product_price']=="0")
								{
									echo "Free Download";
								}
								else
								{
									echo "Rs. ".$cpdata['product_price'];
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
				<!-- <div class="row">
					<div class="col-md-12">
						<nav>
						  <?php if (strlen($pagination)): ?>
						    <ul class="pagination">
						    
						    	
							  	<?php echo $pagination; ?> 	

						    </ul>
						  <?php endif; ?>
						    	    
						  
						</nav>
					</div>
				</div> -->
			</div>
		</div>
	</div>