<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	public function getAll($limit, $offset) 
	{

		// Get product details
		$product_data = $this->db->query("SELECT pr.*, ft.file_type_name, cat.category_name
									FROM product AS pr
									LEFT JOIN file_types AS ft
									ON pr.product_filetype_id = ft.id
									LEFT JOIN categories as cat
									ON pr.product_category_id = cat.id
									LIMIT " . $offset .  "," . $limit);

		
		$return['products_data'] = $product_data->result_array();

		//count total products
		$paginate_products = $this->db->select('COUNT(*) as count', FALSE)
							->from('product');
		$tmp = $paginate_products->get()->result();
		$return['num_rows'] = $tmp[0]->count;


		return $return;
	}

	public function getcategory() 
	{
		//get categories
		$get_category = $this->db->query("SELECT DISTINCT cat.* FROM categories AS cat
										LEFT JOIN product AS pr
										ON cat.id = pr.product_category_id
										WHERE cat.id = pr.product_category_id");
		$return['categories'] = $get_category->result_array();
		
		return $return;
	}

	public function getfiletype() 
	{
		//get filetypes
		$get_file_type = $this->db->query("SELECT DISTINCT ft.* FROM file_types AS ft
										LEFT JOIN product AS pr
										ON ft.id = pr.product_filetype_id
										WHERE ft.id = pr.product_filetype_id");
		$return['fileTypes'] = $get_file_type->result_array();

		return $return;
	}

	public function product_single($id) 
	{
		//get data of single product
		$product_data = $this->db->query("SELECT pr.*, ft.file_type_name, cat.category_name
									FROM product AS pr
									LEFT JOIN file_types AS ft
									ON pr.product_filetype_id = ft.id
									LEFT JOIN categories as cat
									ON pr.product_category_id = cat.id
									WHERE pr.id = '$id'");
		$return['single_product'] = $product_data->result_array();

		return $return;
	}

	public function get_products_by_category($id, $limit, $offset = 0) 
	{
		//get products by categories
		$get_products = $this->db->query("SELECT pr.*, ft.file_type_name, cat.category_name 
									FROM product AS pr
									LEFT JOIN file_types AS ft
									ON pr.product_filetype_id = ft.id 
									LEFT JOIN categories as cat
									ON pr.product_category_id = cat.id
									WHERE cat.id = ". $id);
		$return['cat_products'] = $get_products->result_array();

		//count products in the category
		$paginate_products = $this->db->select('COUNT(*) as count', FALSE)
							->from('categories')
							->join('product', 'categories.id = product.product_category_id')
							->where('categories.id = ' . $id)
							->group_by('categories.id');
				
		$tmp = $paginate_products->get()->result();

		$return['num_rows'] = $tmp[0]->count;
			
		return $return;
	}

	public function get_products_by_filetype($id, $limit, $offset = 0) 
	{
		//get products by file types
		$get_products = $this->db->query("SELECT pr.*, ft.file_type_name, cat.category_name 
									FROM product AS pr
									LEFT JOIN file_types AS ft
									ON pr.product_filetype_id = ft.id 
									LEFT JOIN categories as cat
									ON pr.product_category_id = cat.id
									WHERE ft.id = ". $id);
		$return['ft_products'] = $get_products->result_array();

		//count products by file types
		$paginate_products = $this->db->select('COUNT(*) as count', FALSE)
							->from('file_types')
							->join('product', 'file_types.id = product.product_filetype_id')
							->where('file_types.id = ' . $id)
							->group_by('file_types.id');
		
		$tmp = $paginate_products->get()->result();

		$return['num_rows'] = $tmp[0]->count;
			
		return $return;
	}

	public function get_search($id, $data, $offset, $limit) 
	{
	 	
		$get_search_results = $this->db->query("SELECT pr.* 
									FROM product AS pr
									LEFT JOIN file_types AS ft
									ON pr.product_filetype_id = ft.id 
									LEFT JOIN categories as cat
									ON pr.product_category_id = cat.id 
									WHERE pr.product_name LIKE '%$data%'
									OR pr.product_tags LIKE '%$data%'
									OR cat.category_name LIKE '%$data%'
									OR ft.file_type_name LIKE '%$data%' 
									LIMIT " . $offset .  "," . $limit);

		//count total products
		$paginate_products = $this->db->select('COUNT(*) as count', FALSE)
							->from('product');
		$tmp = $paginate_products->get()->result();
		$return['num_rows'] = $tmp[0]->count;
		
	  	
	  	$return['search_result'] = $get_search_results->result_array();
    	return $return;
	}

}