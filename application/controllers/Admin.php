<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {   
        $result = $this->admin_model->getAll();

        // echo "<pre>";
        // print_r ($result['merge']);
        // echo "</pre>";
        // exit;

        $data['products_data'] = $result['products_data'];

        // echo "<pre>";
        // print_r ($data['all']);
        // echo "</pre>";
        // exit;

        //storing the result in another array variable to use the key in the view file.
        $data['categories'] = $result['categories'];
        $data['fileTypes'] = $result['fileTypes'];
        
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin', $data);
        $this->load->view('templates/admin-footer', $data);
    }

    public function new_product() {

        $result = $this->admin_model->getAll();

        //storing the result in another array variable to use the key in the view file.
        $data['products_data'] = $result['products_data'];

        $data['categories'] = $result['categories'];
        $data['fileTypes'] = $result['fileTypes'];
        
        $this->load->view('templates/admin-header', $data);
        $this->load->view('add_product', $data);
        $this->load->view('templates/admin-footer', $data);
    }

    public function new_category() {
        
        $this->load->view('templates/admin-header');
        $this->load->view('add_category');
        $this->load->view('templates/admin-footer');
    }

    public function new_file_type() {
        
        $this->load->view('templates/admin-header');
        $this->load->view('add_file_types');
        $this->load->view('templates/admin-footer');
    }

    public function add_product() 
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 3000000;
        $config['max_width']      = 5200;
        $config['max_height']     = 5200;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if ( $this->form_validation->run('Addproduct') == FALSE ) {
           
            $this->new_product();

        } else {

            $data = array(
                'product_name' => $this->input->post('product_name'),
                'product_description' => $this->input->post('product_description'),
                'product_image' => $this->input->post('userfile'),
                'product_price' => $this->input->post('product_price'),
                'product_tags' => $this->input->post('product_tags'),
                'product_filetype_id' => $this->input->post('product_file_type'),
                'product_category_id' => $this->input->post('product_category')
            );

            $this->admin_model->add_product($data);
            redirect('admin/new_product','refresh');           
        }
    }

    public function handle_upload()
    {
        if ( isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']) )
        {
            if ( $this->upload->do_upload('userfile') )
            {
                $upload_data = $this->upload->data();
                // Store name of file in POST for later storing it into DB
                $_POST['userfile'] = $upload_data['file_name'];

                $config['source_image']     = $upload_data['full_path'];
                $config['new_image']        = './uploads/thumbs/';
                $config['maintain_ratio']   = true;
                $config['width']            = 300;
                $config['height']           = 200;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                return true;
            }
            else
            {
                // File not according to permitted config
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        }
    }

    public function add_category() 
    {
        $data = array(
            'category_name' => $this->input->post('category_name')
        );
        
        $this->admin_model->add_category($data);
        $this->new_category();
    }

    public function add_file_type() 
    {
        $data = array(
            'file_type_name' => $this->input->post('file_type')
        );

        $this->admin_model->add_file_type($data);
        $this->new_file_type();
    }
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */