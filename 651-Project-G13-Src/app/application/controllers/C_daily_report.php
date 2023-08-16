<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_daily_report extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status')!='Manager' ) {
			redirect('index.php/C_login/index_sales');
		}
	}

    public function index()
	{
        $this->load->model('Booking_model');
        $data['allbookings'] = $this->Booking_model->getall_data_booking();

        $this->load->model('Pick_up_car_model');
        $data['allpickups'] = $this->Pick_up_car_model->getall_data_pickup();

        $this->load->model('Return_car_model');
        $data['allreturns'] = $this->Return_car_model->getall_data_returnCar();

		// prepare data for view
    	$data['title'] = 'Daily Report';
		// load view
		$this->load->view('top', $data);
		$this->load->view('daily_report', $data);
		$this->load->view('bottom');
	}

    public function search($kw="")
	{

		if ($this->input->post('kw')) {

            $this->load->model('Booking_model');
            $data['allbookings'] = $this->Booking_model->getall_data_booking();
            $data['bookings'] = $this->Booking_model->searchdate($this->input->post('kw'));
    
            $this->load->model('Pick_up_car_model');
            $data['allpickups'] = $this->Pick_up_car_model->getall_data_pickup();
            $data['pickups'] = $this->Pick_up_car_model->searchdate($this->input->post('kw'));
    
            $this->load->model('Return_car_model');
            $data['allreturns'] = $this->Return_car_model->getall_data_returnCar();
            $data['returns'] = $this->Return_car_model->searchdate($this->input->post('kw'));
    
			

			
		} 
		$data['title'] = 'Daily Report';
		$this->load->view('top', $data);
		$this->load->view('daily_report', $data);
		$this->load->view('bottom');
	
	}



}