<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_return_car extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status')!='Sales' ) {
			redirect('index.php/C_login/index_sales');
		}
	}
    public function index()
	{
        $this->load->model('Car_model');
    $data['cars_active'] = $this->Car_model->searchcar_status_active();
		// prepare data for view
    $data['title'] = 'Return the car';
		// load view
		$this->load->view('top', $data);
		$this->load->view('return_car', $data);
		$this->load->view('bottom');
	}
    public function search($kw="")
	{
		// check if this function is called by form submit
		if ($this->input->post('kw')) {
			// load model
			$this->load->model('Car_model');
			// call search() function in song_model
			// prepare data for view
            $data['cars_active'] = $this->Car_model->searchcar_status_active();
			$data['cars'] = $this->Car_model->search_by_count_unit($this->input->post('kw'));
			// echo $this->db->last_query();
		} 
		$data['title'] = 'Return the car';
		$this->load->view('top', $data);
		$this->load->view('return_car', $data);
		$this->load->view('bottom');
	
	}
    public function car_detail($id_car)
	{
        $this->load->model('Car_model');
        $test = $this->Car_model->get_detail_car_sA($id_car);
        if ($test) {
            
            $data['cars'] = $this->Car_model->get_detail_car_sA($id_car);
            // prepare data for view
            $data['title'] = 'detail';
            // load view
            $this->load->view('top', $data);
            $this->load->view('detail_retrun_car', $data);
            $this->load->view('bottom');
        }else{
            $this->session->set_flashdata('warning','No result');
            redirect('index.php/C_return_car/index');
            
        }

	}
    public function form_return_car($id)
	{
       
    
        $data['id_car'] = $id;
    	$data['title'] = 'Form return car';
		// load view
		$this->load->view('top', $data);
		$this->load->view('form_return_car', $data);
		$this->load->view('bottom');
	}
    public function add_return_car()
	{
       
        $id_car = $this->input->post('id_car');
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		
		
		$this->load->model('Return_car_model');
		$this->Return_car_model->add( $id_car,$date,$time);

        $this->load->model('Car_model');
		$this->Car_model->changestatusRepair($id_car);
		$this->session->set_flashdata('result','return car complete');
		redirect('index.php/C_return_car/index');
		
	}



}