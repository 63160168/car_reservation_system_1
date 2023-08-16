<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends CI_Model {

    public function search($kw){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'rent' 
                    AND (
                        name_model LIKE ? 
                        OR brand LIKE ? )";
        $bind_data = array("%$kw%", "%$kw%");
        return $this->db->query($sql, $bind_data);
        // echo $this->db->last_query();
    }

    public function get_detail_car($id) {
        $sql = "SELECT *
                FROM car_rental
                WHERE status = 'rent' AND id_car = ?";
        $bind_data = array($id);
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
            return $query;
        } else {
            return false;
        }
        
     
    }

    public function changestatusBooking($id) {
        $booking="booking";
        $sql = "UPDATE car_rental
            SET status = ?
            WHERE id_car = ?";
        $bind_data = array($booking,$id);
        $query = $this->db->query($sql, $bind_data);



    }
    public function searchcar_status_rent(){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'rent' ";
        
        return $this->db->query($sql);
        // echo $this->db->last_query();
    }

    public function searchcar_status_booking(){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'booking' ";
        
        return $this->db->query($sql);
        // echo $this->db->last_query();
    }
    public function searchcar_status_active(){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'active' ";
        
        return $this->db->query($sql);
        // echo $this->db->last_query();
    }
    public function searchcar_status_repair(){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'repair' ";
        
        return $this->db->query($sql);
        // echo $this->db->last_query();
    }
    public function searchcar_status_NFR(){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'not for rent' ";
        
        return $this->db->query($sql);
        // echo $this->db->last_query();
    }

    public function add() {
        $sql = "INSERT INTO car_rental (name_model, brand, car_gear, count_unit, year_of_production
        , number_of_passengers,price_per_day, status)
                VALUES (?, ?, ?, ?, ?, ?, ? ,?)";
        $bind_data = array($this->input->post('name_model'), $this->input->post('brand')
        , $this->input->post('car_gear'), $this->input->post('count_unit'), $this->input->post('year_of_production')
        ,  $this->input->post('number_of_passengers'), $this->input->post('price_per_day'), $this->input->post('status'));
        $this->db->query($sql, $bind_data);
    }

    public function get_detail_car2($id) {
        $sql = "SELECT *
                FROM car_rental
                WHERE id_car = ?";
        $bind_data = array($id);
        return $this->db->query($sql, $bind_data);
       
    }

    public function update() {
        $sql = "UPDATE car_rental 
                SET name_model = ?, brand = ?, car_gear = ?, count_unit = ?, year_of_production = ?
                , number_of_passengers = ?,price_per_day = ?, `status` = ?
                WHERE id_car = ?";
        $bind_data = array($this->input->post('name_model'), $this->input->post('brand')
        , $this->input->post('car_gear'), $this->input->post('count_unit'), $this->input->post('year_of_production')
        ,  $this->input->post('number_of_passengers'), $this->input->post('price_per_day'), $this->input->post('status')
        , $this->input->post('id_car'));
        $this->db->query($sql, $bind_data);
    }
    public function changestatusActive($id) {
        $status="active";
        $sql = "UPDATE car_rental
            SET status = ?
            WHERE id_car = ?";
        $bind_data = array($status,$id);
        $this->db->query($sql, $bind_data);

    }

    public function search_by_count_unit($kw){
        $sql = "SELECT *
                FROM car_rental
                WHERE  status = 'active' 
                    AND count_unit LIKE ? ";
        $bind_data = array("%$kw%");
        return $this->db->query($sql, $bind_data);
        // echo $this->db->last_query();
    }
    
    public function get_detail_car_sA($id) {
        $sql = "SELECT *
                FROM car_rental
                WHERE status = 'active' AND id_car = ?";
        $bind_data = array($id);
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
            return $query;
        } else {
            return false;
        }
        
     
    }
    public function changestatusRepair($id) {
        $status="repair";
        $sql = "UPDATE car_rental
            SET status = ?
            WHERE id_car = ?";
        $bind_data = array($status,$id);
        $this->db->query($sql, $bind_data);

    }
    








}