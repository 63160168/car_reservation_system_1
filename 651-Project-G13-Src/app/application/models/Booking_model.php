<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

        public function search_status_active($userid){
                
                $sql = "SELECT *
                        FROM booking_data
                        WHERE  status = 'Active' 
                                AND (id_user = ? )";
                $bind_data = array("$userid");
                return $this->db->query($sql, $bind_data);
                // echo $this->db->last_query();
                

        }
        public function search_status_other($userid){
                
                $sql = "SELECT *
                        FROM booking_data
                        WHERE  status != 'Active' 
                                AND (id_user = ? )";
                $bind_data = array("$userid");
                return $this->db->query($sql, $bind_data);
                // echo $this->db->last_query();
                

        }


	public function add($user_id,$id_car,$date,$numdate,$status) {
                $sql = "INSERT INTO booking_data (id_user, id_car, datepickup_car, num_date,`status`)
                        VALUES (?, ?, ?, ?, ?)";
                
                $bind_data = array($user_id ,$id_car, $date, $numdate, $status);
                $this->db->query($sql, $bind_data);
        }

        public function get_data_booking ($id)
        {
            
            $sql = "SELECT booking_data.id_booking, booking_data.datepickup_car, 
            booking_data.num_date, customer.user_name , car_rental.brand,
            car_rental.name_model, car_rental.count_unit ,car_rental.car_gear,
            car_rental.number_of_passengers,car_rental.price_per_day 
                    FROM `booking_data`
                    INNER JOIN car_rental ON booking_data.id_car=car_rental.id_car
                    INNER JOIN customer ON booking_data.id_user=customer.user_id
                    WHERE booking_data.id_booking = ?  AND customer.user_id=? ";
            $bind_data = array($id, $this->session->userdata('user_id'));
            $query = $this->db->query($sql, $bind_data);
            if ($query->num_rows() > 0){
                return $query;
            } else {
                return false;
            }
        }

        public function get_status_active_bysales(){
                
                $sql = "SELECT *
                        FROM booking_data
                        WHERE  status = 'Active'";
                return $this->db->query($sql);
                
                // echo $this->db->last_query();
                

        }
        public function search_status_active_bysales($id){
                
                $sql = "SELECT *
                        FROM booking_data
                        WHERE status = 'Active' AND id_booking = ? ";
                $bind_data = array("$id");
                return $this->db->query($sql, $bind_data);
                // echo $this->db->last_query();
                

        }
        public function get_data_booking_bysales ($id)
        {
            
            $sql = "SELECT booking_data.id_booking, booking_data.datepickup_car, booking_data.id_car,
            booking_data.num_date, customer.user_name , customer.user_email, car_rental.brand,
            car_rental.name_model, car_rental.count_unit ,car_rental.car_gear,
            car_rental.number_of_passengers,car_rental.price_per_day 
                    FROM `booking_data`
                    INNER JOIN car_rental ON booking_data.id_car=car_rental.id_car
                    INNER JOIN customer ON booking_data.id_user=customer.user_id
                    WHERE booking_data.id_booking = ? ";
            $bind_data = array($id);
            $query = $this->db->query($sql, $bind_data);
            if ($query->num_rows() > 0){
                return $query;
            } else {
                return false;
            }
        }

        public function change_status_toExpired($id){
                $status="Expired";
                $sql = "UPDATE booking_data
                        SET status = ?
                        WHERE id_booking = ? ";
                $bind_data = array($status,$id);
                $this->db->query($sql, $bind_data);

	}

        public function getall_data_booking(){
                
                $sql = "SELECT *
                        FROM booking_data ";
                return $this->db->query($sql);
                               
        }
        public function searchdate($kw){
                $sql = "SELECT *
                        FROM booking_data
                        WHERE SUBSTRING(datepickup_car,5,10) LIKE ? ";
                $bind_data = array("%$kw%");
                return $this->db->query($sql, $bind_data);
                // echo $this->db->last_query();
        }

   
        

}