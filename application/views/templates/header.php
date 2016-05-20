<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
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
							<a class="navbar-brand" href="<?php echo base_url(); ?>">Brand</a>
					    </div>
				    </div><!-- /.container-fluid -->
				</nav>
			</div>
			<div class="col-md-6 col-md-offset-6">
				<div class="search">
					<form action="<?php base_url(); ?>site/search" method="post">
						<div class="form-group"> 
							<input type="text" class="form-control" id="search" name="search" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					
				</div>
			</div>
				
				
			</div>
		
				
