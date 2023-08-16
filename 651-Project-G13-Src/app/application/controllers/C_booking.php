<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_booking extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status')!='Customer' ) {
            $this->session->set_flashdata('warning','You must to login first');
			redirect('index.php/C_login/index');
		}
	}

    public function index()
	{
       
		// prepare data for view
        $data['title'] = 'booking';
		// load view
		$this->load->view('top', $data);
		$this->load->view('booking', $data);
		$this->load->view('bottom');
	}

    public function payment()
	{
        $user_id = $this->session->userdata('user_id');
		$date = $this->input->post('date');
		$numdate = $this->input->post('numdate');
		$id_car = $this->input->post('id_car');
		/*
        echo $date."---";
		echo $user_id."---";
		echo $numdate."----";
		echo $id_car;*/
		
		$this->session->set_flashdata('date',$date);
		//$this->session->set_flashdata('id_car',$id_car);
		$this->session->set_flashdata('numdate',$numdate);

		$this->load->model('Car_model');
        $data['cars'] = $this->Car_model->get_detail_car($id_car);

		$data['title'] = 'payment';
		// load view
		$this->load->view('top', $data);
		$this->load->view('payment', $data);
		$this->load->view('bottom');
		
    }

	public function booking()
	{
		$user_id = $this->session->userdata('user_id');
		$date = $this->input->post('date');
		$numdate = $this->input->post('numdate');
		$id_car = $this->input->post('id_car');
		$status = "Active";
		/*
		echo "date : ".$date."---";
		echo "user_id : ".$user_id."---";
		echo "numdate : ".$numdate."----";
		echo "id_car: ".$id_car;*/
		
		$this->load->model('Booking_model');
		$this->Booking_model->add($user_id,$id_car,$date,$numdate,$status);
		$this->load->model('Car_model');
		$this->Car_model->changestatusBooking($id_car);
		$this->session->set_flashdata('result','booking complete');
		redirect('index.php/C_main/index');

	}



}