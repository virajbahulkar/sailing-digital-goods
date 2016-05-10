<div class="container">
	<div class="row">
		<div class="col-sm-12 blog-main">
		<?php echo validation_errors(); ?>
		    <form method="post" name="AddCategory" action="<?php echo site_url('admin/add_category') ?>">
			  	<div class="form-group">
			    	<label for="Category">Category Name</label>
			    	<input name="category_name" type="text" class="form-control" id="Category" placeholder="Enter Category">
			  	</div>
				<div>
				    <button name="submit" type="submit" class="btn btn-default">Submit</button>
				</div>
		  		<br>
			</form>
		</div>
	</div>
</div>