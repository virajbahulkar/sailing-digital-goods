
	<div class="row">
		<div class="col-sm-12 blog-main">
		<?php echo validation_errors(); ?>
			
		    <form method="post" name="Addproduct" action="<?php echo site_url('admin/add_product') ?>"enctype="multipart/form-data">
			  	<div class="form-group">
			  	      <label for="product_name">Product Name</label>
			  	      <input name="product_name" type="text" class="form-control" id="product_name" placeholder="Enter Title">
			  	    </div>
			  	    <div class="form-group">
			  	      <label for="product_description">Product description</label>
			  	      <textarea name="product_description" id="product_description" cols="30" rows="10" class="form-control" placeholder="Enter Post Body"></textarea>
			  	    </div>
			  	    <div class="form-group" >
			  	      <label for="product_category">Category</label>
			  	       <select name="product_category" id="product_category" class="form-control">
			  	        
			  	          <?php if(!empty($categories)) : foreach($categories as $category) : ?>       	  
			  	          <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
			  	          <?php endforeach; ?>

			  	      <?php endif; ?>
			  	        
			  	      </select>
			  	    </div>
			  	    
			  	    <div class="form-group">	
			  	       	<label for="product_image">Product Image</label>
			  	       	<input type="file" name="userfile" id="product_image">
			  	       	<p class="help-block">Example block-level help text here.</p>
			  	     </div>
			  	     <div class="form-group" >
			  	       <label for="product_file_type">File Type</label>
			  	        <select name="product_file_type" id="product_file_type" class="form-control">
			  	         
			  	         	<?php if(!empty($fileTypes)) : foreach($fileTypes as $filetype) : ?>           
			  	           	<option value="<?php echo $filetype['id']; ?>"><?php echo $filetype['file_type_name']; ?></option>
			  	          	<?php endforeach; ?>

			  	      		<?php endif; ?>
			  	         
			  	       	</select>
			  	     </div>
			  	     <div class="form-group">
			  	       <label for="product_price">Product Price</label>
			  	       <input name="product_price" type="text" class="form-control" id="product_price" placeholder="Enter price">
			  	     </div>
			  	    <div class="form-group">
			  	      <label for="product_tags">Product Tags</label>
			  	      <input name="product_tags" type="text" class="form-control" id="product_tags" placeholder="Enter Tags">
			  	    </div>
			  	    <div>
			  	    	<button name="submit" type="submit" class="btn btn-default">Submit</button>
			  	    	<a href="" class="btn btn-default">Cancel</a>
			  	    </div>
		  		<br>
			</form>
		</div>
	</div>
