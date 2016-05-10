<h1>Categories</h1>

<table class="table table-striped">
    <tbody>
    	<tr>
	      
	      <th>Product Name</th>
	      <th>Category</th>
	      <th>File Type</th>
	      <th>Price</th>
    	</tr>


    	<?php  
     	if(!empty($products_data)) : foreach($products_data as $pdata) : ?>
     	     	<tr>
	        
	        <td><a href=""><?php echo $pdata['product_name']; ?></a></td>
	        
	        <td><?php echo $pdata['category_name']; ?></td>

	        <td><?php echo $pdata['file_type_name']; ?></td>

	        <td>
	        	<?php 
		        	if($pdata['product_price']=="0") {
						echo "Free";
					} else {
						echo "Rs. ".$pdata['product_price'];
					}
				?>
	        </td>
	      
	  
    	</tr>
      	     <?php endforeach; ?>
      	<?php endif; ?>
        
  	</tbody>
</table>

