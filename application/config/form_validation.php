<?php 
	$config = array(

		'AddCategory' => array(
			array(
				'field' => 'category_name',
				'label' => 'Category',
				'rules' => 'trim|required'
			)
		),

		'AddFileType' => array(
			array(
				'field' => 'file_type',
				'label' => 'File Types',
				'rules' => 'trim|required'
			)
		),

		'Addproduct' => array(
		    array(
		        'field' => 'userfile',
		        'label' => 'Product Image',
		        'rules' => 'callback_handle_upload'
		    )
		)
	);
?>