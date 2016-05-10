<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	function getAll(/*$query_array, */$limit, $offset) {

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

	function getcategory() {
		//get categories
		$get_category = $this->db->query("SELECT cat.category_name, group_concat(pr.product_name) 								  AS product_name 
        									FROM categories cat LEFT JOIN product pr ON cat.id = pr. product_category_id
        									GROUP BY cat.category_name
        									ORDER BY cat.category_name
        									");
		$return['categories'] = $get_category->result_array();

		return $return;
	}

	function getfiletype() {
		//get categories
		$get_file_type = $this->db->query("SELECT * FROM file_types");
		$return['fileTypes'] = $get_file_type->result_array();

		return $return;
	}

	function product_single($id) {
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

	// function get_search($terms){

	//     $this->db->select('product_name');
	//     $this->db->from('product');
	//     $this->db->join('categories', 'id', 'inner');
	//     $this->db->like('category_name', $terms);
	    
	//     $query = $this->db->get();
	//     return $query->result_array();
	// }

	// function product_by_category() {

	// 	$product_category = $this->db->query("");
	// 	$return['categories'] = $product_category->result_array();
	// }
}