<div class="container">
	<div class="row">
		<div class="col-sm-12 blog-main">
		<?php echo validation_errors(); ?>
		    <form method="post" name="AddFileType" action="<?php echo site_url('admin/add_file_type') ?>" _lpchecked="1">
			  	<div class="form-group">
			    	<label for="file_type">file_type Name</label>
			    	<input name="file_type" type="text" class="form-control" id="file_type" placeholder="Enter file type">
			  	</div>
				<div>
				    <button name="submit" type="submit" class="btn btn-default">Submit</button>
				</div>
		  		<br>
			</form>
		</div>
	</div>
</div>