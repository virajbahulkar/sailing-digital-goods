<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public $result_cat;
	public $result_ft;
	public $id;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		
		$this->id = $this->uri->segment(3);	
      	$this->result_cat = $this->site_model->getcategory();
      	$this->result_ft = $this->site_model->getfiletype();
	}

  	public function index()
	{	
		$this->load->template('page', $data);
  	} 

  	public function products($offset = 0) 
  	{

  		$method = site_url("site/products");
  		$limit = 8;

  		$results = $this->site_model->getAll($limit, $offset);

  		//storing the result in another array variable to use the key in the view file.
     	$data['categories'] = $this->result_cat['categories'];
     	$data['fileTypes'] = $this->result_ft['fileTypes'];
    
    	$result = $this->site_model->getAll($limit, $offset);
    	
    	$data['num_results'] = $result['num_rows'];

    	$config = $this->pagination_config($data['num_results'], $limit, $method);

    	$this->pagination->initialize($config);

    	$data['pagination'] = $this->pagination->create_links();

       	$data['products_data'] = $result['products_data'];

       	$this->load->template('page', $data);
  	}

    public function product_details() 
    {

    	$data['categories'] = $this->result_cat['categories'];
      	$data['fileTypes'] = $this->result_ft['fileTypes'];

      	$result = $this->site_model->product_single($this->id);

      	$data['single_product'] = $result['single_product'];

		$this->load->template('single-page', $data);
    }

    public function products_by_category($offset = 0) 
    {
       	
    	$limit = 8;
       	
		$data['fileTypes'] = $this->result_ft['fileTypes'];
       	$data['categories'] = $this->result_cat['categories'];

       	$result_product_cat = $this->site_model->get_products_by_category($this->id, $limit, $offset);
       	$data['num_results'] = $result_product_cat['num_rows'];
	  	$data['cat_products'] = $result_product_cat['cat_products'];
	  	$this->load->template('display_by_category', $data);
    }

    public function products_by_filetype($offset = 0) 
    {
         
    	$limit = 8;
      	
        $data['fileTypes'] = $this->result_ft['fileTypes'];
      	$data['categories'] = $this->result_cat['categories'];

       	$result_product_ft = $this->site_model->get_products_by_filetype($this->id, $limit, $offset);
      	$data['num_results'] = $result_product_ft['num_rows'];
   	  	$data['ft_products'] = $result_product_ft['ft_products'];
       	$this->load->template('display_by_filetypes', $data);
    }

    public function show_all() 
    {
    	$this->products();
    }

    public function download_image() 
    {

		$name = $_POST['img'];
		$image_path = "uploads/" . $name;
		
		header("Content-Type: application/octet-stream");
      	header("Content-Disposition: attachment; filename=" . $name);
       	readfile($image_path);
    }

    public function search($offset = 0) 
    {	
    	$method = site_url("site/search");

    	$limit = 8;

    	$data['fileTypes'] = $this->result_ft['fileTypes'];
      	$data['categories'] = $this->result_cat['categories'];

      	$result = $this->site_model->getAll($limit, $offset);
    	
    	$data['num_results'] = $result['num_rows'];

    	$config = $this->pagination_config($data['num_results'], $limit, $method);
    	$this->pagination->initialize($config);

    	$data['pagination'] = $this->pagination->create_links();
    	$terms = $this->input->post('search');
	    $result_search = $this->site_model->get_search($this->id, $terms, $offset, $limit);
	   
	    $data['search_result'] = $result_search['search_result'];
	    $this->load->template('search-result-page', $data);
    }

    public function pagination_config($d, $l, $m)
    {
    	$config = array();
    	$config['base_url'] = $m;
    	$config['total_rows'] = $d;
    	$config['per_page'] = $l;
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
    	return $config;
    }
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */