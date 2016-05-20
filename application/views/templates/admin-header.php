	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sailing Digital Goods</title>
	<?php 
		echo link_tag('assets/stylesheets/css/global.css', 'stylesheet'); 
		echo link_tag('assets/stylesheets/css/bootstrap.min.css', 'stylesheet'); 
		
	?>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default">
				  	<div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo base_url(); ?>admin">Dashboard</a>
							<a class="admin-topbar-links" href="<?php echo base_url(); ?>admin/new_product">Add Product</a>
							<a class="admin-topbar-links" href="<?php echo base_url(); ?>admin/new_category">Add category</a>
							<a class="admin-topbar-links" href="<?php echo base_url(); ?>admin/new_file_type">Add file types</a>
							
					    </div>
					    <div class="admin-topbar-links link-to-admin-panel pull-right">
					    	<a href="<?php echo base_url(); ?>">Visit Website</a>
					    </div>
				    </div><!-- /.container-fluid -->
				</nav>
				
				
			</div>
		</div>
				
