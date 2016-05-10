<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	function getAll() {
		// Get issues by students
		$product_data = $this->db->query("SELECT pr.*, ft.file_type_name, cat.category_name
									FROM product AS pr
									LEFT JOIN file_types AS ft
									ON pr.product_filetype_id = ft.id
									LEFT JOIN categories as cat
									ON pr.product_category_id = cat.id");
		$return['products_data'] = $product_data->result_array();

		//get categories
		$get_category = $this->db->query("SELECT * FROM categories");
		$return['categories'] = $get_category->result_array();


		//get file types
		$get_file_type = $this->db->query('SELECT * FROM file_types');
		$return['fileTypes'] = $get_file_type->result_array();

		// echo "<pre>";
		// print_r ($return['all']);
		// echo "</pre>";
		// exit;

		// Get issues by admin
		// $product_category_id = $this->db->query("SELECT ti.id, ti.issue_date, ti.issue_title, ti.priority, ti.assignee, 
		// 							ti.status, tap.first_name, tap.last_name
		// 							FROM tblissue AS ti
		// 							LEFT JOIN tbladminprofile AS tap
		// 							ON ti.admin_id = tap.id 
		// 							WHERE tap.id IS NOT NULL
		// 							ORDER BY ti.issue_date DESC");
		// $return['category_id'] = $product_category_id->result_array();

		return $return;
	}

	function add_product($data) {
		$this->db->insert('product', $data);
		return;
	}

	function add_category($data) {


		$this->db->insert('categories', $data);
		return;
	}

	function add_file_type($data) {
		$this->db->insert('file_types', $data);
		return;
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */