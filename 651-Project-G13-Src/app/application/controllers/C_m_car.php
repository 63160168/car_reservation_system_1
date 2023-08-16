<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_m_car extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status')!='Sales' ) {
			redirect('index.php/C_login/index_sales');
		}
	}

    public function index()
	{
		$this->load->model('Car_model');
		$data['cars_rent'] = $this->Car_model->searchcar_status_rent();
		$data['cars_booking'] = $this->Car_model->searchcar_status_booking();
		$data['cars_active'] = $this->Car_model->searchcar_status_active();
		$data['cars_repair'] = $this->Car_model->searchcar_status_repair();
		$data['cars_NFR'] = $this->Car_model->searchcar_status_NFR();
		// prepare data for view
    	$data['title'] = 'Car Management';
		// load view
		$this->load->view('top', $data);
		$this->load->view('main_car', $data);
		$this->load->view('bottom');
	}

	public function add_car()
	{
		
		// prepare data for view
    	$data['title'] = 'add car data';
		// load view
		$this->load->view('top', $data);
		$this->load->view('add_car', $data);
		$this->load->view('bottom');
	}
	public function save()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('name_model', 'Name model', 'trim|required');
		$this->form_validation->set_rules('brand', 'brand', 'trim|required');
		$this->form_validation->set_rules('car_gear', 'Car gear', 'trim|required|min_length[2]|max_length[10]');
		$this->form_validation->set_rules('count_unit', 'Count unit', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('year_of_production', 'Year of production', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('number_of_passengers', 'Number of passengers', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('price_per_day', 'price per day', 'trim|required|max_length[8]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'add car data';
			// load view
			$this->load->view('top', $data);
			$this->load->view('add_car', $data);
			$this->load->view('bottom');
		  } else {
			$this->load->model('Car_model');
			$this->Car_model->add();
			$this->session->set_flashdata('result','saving complete');
			redirect('index.php/C_m_car/index');
		  }

		
	}

	public function car_detail($id_car)
	{
        $this->load->model('Car_model');
		$data['cars'] = $this->Car_model->get_detail_car2($id_car);
		// prepare data for view
		$data['title'] = 'detail';
		// load view
		$this->load->view('top', $data);
		$this->load->view('detail_car2', $data);
		$this->load->view('bottom');

	}


	public function edit_car($id_car)
	{
		$this->load->model('Car_model');
		$data['cars'] = $this->Car_model->get_detail_car2($id_car);
		
		// prepare data for view
    	$data['title'] = 'edit car data';
		// load view
		$this->load->view('top', $data);
		$this->load->view('edit_car', $data);
		$this->load->view('bottom');
	}
	public function update()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('id_car', 'Id car', 'trim|required');
		$this->form_validation->set_rules('name_model', 'Name model', 'trim|required');
		$this->form_validation->set_rules('brand', 'brand', 'trim|required');
		$this->form_validation->set_rules('car_gear', 'Car gear', 'trim|required|min_length[2]|max_length[10]');
		$this->form_validation->set_rules('count_unit', 'Count unit', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('year_of_production', 'Year of production', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('number_of_passengers', 'Number of passengers', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('price_per_day', 'price per day', 'trim|required|max_length[8]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'edit car data';
			// load view
			$this->load->view('top', $data);
			$this->load->view('edit_car', $data);
			$this->load->view('bottom');
		  } else {
			$this->load->model('Car_model');
			$this->Car_model->update();
			$this->session->set_flashdata('result','update complete');
			redirect('index.php/C_m_car/index');
		  }

		
	}
	



}