<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pick_up_car extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status')!='Sales' ) {
			redirect('index.php/C_login/index_sales');
		}
	}

    public function index()
	{
        $this->load->model('Booking_model');
        $data['bookings2'] = $this->Booking_model->get_status_active_bysales();
		// prepare data for view
    	$data['title'] = 'Pick up the car';
		// load view
		$this->load->view('top', $data);
		$this->load->view('pick_up_car', $data);
		$this->load->view('bottom');
	}

    public function search($kw="")
	{
		// check if this function is called by form submit
		if ($this->input->post('kw')) {
			// load model
			$this->load->model('Booking_model');
			// call search() function in song_model
			// prepare data for view
			$data['bookings1'] = $this->Booking_model->search_status_active_bysales($this->input->post('kw'));
			// echo $this->db->last_query();
		} 
        $this->load->model('Booking_model');
        $data['bookings2'] = $this->Booking_model->get_status_active_bysales();
	
		$data['title'] = 'Home';
		$this->load->view('top', $data);
		$this->load->view('pick_up_car', $data);
		$this->load->view('bottom');
	
	}

    public function detail_booking($id)
    {
        
        $this->load->model('Booking_model');
        //echo $username;
        $book = $this->Booking_model->get_data_booking_bysales ($id);
        //echo $this->db->last_query();
        if ($book) {
            $this->load->model('Booking_model');
            $data['bookings'] = $this->Booking_model->get_data_booking_bysales ($id);
            $data['title'] = 'detail';
            // load view
            $this->load->view('top', $data);
            $this->load->view('detail_booking2', $data);
            $this->load->view('bottom');
            //print_r($book);
        } else {
    
            echo "failed ";
           

        }
    }
    public function form_add_data_pickupcar($id)
	{
        //$this->load->model('Booking_model');
        $data['id_car'] = $this->session->flashdata('id_car');

		
        $data['id_booking'] = $id;
    	$data['title'] = 'Add data pick up the car';
		// load view
		$this->load->view('top', $data);
		$this->load->view('add_data_pick_up_car', $data);
		$this->load->view('bottom');
	}

    public function add_data_pickupcar()
	{
        $id_booking = $this->input->post('id_booking');
        $id_car = $this->input->post('id_car');
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		$car_kilometer = $this->input->post('car_kilometer');
		
		$this->load->model('Pick_up_car_model');
		$this->Pick_up_car_model->add( $id_booking,$date,$time,$car_kilometer);

        $this->load->model('Booking_model');
        $this->Booking_model->change_status_toExpired($id_booking);

   

        $this->load->model('Car_model');
		$this->Car_model->changestatusActive($id_car);
		$this->session->set_flashdata('result','pick up car complete');
		redirect('index.php/C_pick_up_car/index');
		
	}


}