<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

  	public function index()
	{	
		$this->load->template('page', $data);
  	} 

  	function products( $offset = 0) {

  		$limit = 8;

  		// $this->input->load_query($query_id, $limit, $offset);

  		// $query_array = array(
  		// 	'product_name' => $this->input->get('product_name') 
  		// );

  		// echo "<pre>";
  		// print_r ($query_array);
  		// echo "</pre>";
  		// exit;

  		$results = $this->site_model->getAll(/*$query_array,*/ $limit, $offset);

		// $id = $this -> uri -> segment(3);
		$result_cat = $this->site_model->getcategory();
	    $result_ft = $this->site_model->getfiletype();

	    //storing the result in another array variable to use the key in the view file.
     	$data['categories'] = $result_cat['categories'];
     	$data['fileTypes'] = $result_ft['fileTypes'];
    
    	$result = $this->site_model->getAll(/*$query_array, */$limit, $offset);

    	
    	$data['num_results'] = $result['num_rows'];

    	$config = array();
    	$config['base_url'] = site_url("site/products");
    	$config['total_rows'] = $data['num_results'];
    	$config['per_page'] = $limit;
    	$config['url_segment'] = 3;
    	$config['cur_tag_open'] = '<li><a class="current">';
    	$config['cur_tag_close'] = '</a></li>';
    	$config['next_tag_open'] = '<li>';
	   	$config['next_tag_close'] = '</li>';
    	$config['next_link'] = '&raquo;';
    	$config['prev_tag_open'] = '<li>';
	   	$config['prev_tag_close'] = '</li>';
    	$config['prev_link'] = '&laquo;';
    	$config['num_tag_open'] = '<li>';
    	$config['num_tag_close'] = '</li>';

    	$this->pagination->initialize($config);

    	$data['pagination'] = $this->pagination->create_links();

       	$data['products_data'] = $result['products_data'];

       	$this->load->template('page', $data);
  	}

    public function product_details() {

    	$result_cat = $this->site_model->getcategory();
	    $result_ft = $this->site_model->getfiletype();

	    $data['categories'] = $result_cat['categories'];
      	$data['fileTypes'] = $result_ft['fileTypes'];

      	$id = $this -> uri -> segment(3);
	   	$result = $this->site_model->product_single($id);

      	$data['single_product'] = $result['single_product'];

		$this->load->template('single-page', $data);
    }

    // function search() {

    // 	$query_array = array(
    // 		'product_name' => $this->input->post('product_name') 
    // 	);

    // 	$query_id = $this->input->save_query($query_array);

    // 	redirect("site/products/$query_id");
    // }

    // public function category($offset = 0) {
    // 	// $limit = 8;

    // 	// $result = $this->site_model->getAll($limit, $offset);

    // 	// $data['num_results'] = $result['num_rows'];

    // 	// $config = array();
    // 	// $config['base_url'] = base_url() . "/site/index"; 
    // 	// $config['total_rows'] = $data['num_results'];
    // 	// $config['per_page'] = $limit;
    // 	// $config['url_segment'] = 3;
    // 	// $config['cur_tag_open'] = '<li><a class="current">';
    // 	// $config['cur_tag_close'] = '</a></li>';
    // 	// $config['next_tag_open'] = '<li>';
	   // 	// $config['next_tag_close'] = '</li>';
    // 	// $config['next_link'] = '&raquo;';
    // 	// $config['prev_tag_open'] = '<li>';
	   // 	// $config['prev_tag_close'] = '</li>';
    // 	// $config['prev_link'] = '&laquo;';
    // 	// $config['num_tag_open'] = '<li>';
    // 	// $config['num_tag_close'] = '</li>';

    // 	// $this->pagination->initialize($config);

    // 	// $data['pagination'] = $this->pagination->create_links();

    // 	// $data['products_data'] = $result['products_data'];

    // 	$result_cat = $this->site_model->getcategory();

    // 	$data['categories'] = $result_cat['categories'];

    // 	$this->load->template('page', $data);
    // }

}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */