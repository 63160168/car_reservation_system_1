<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pick_up_car_model extends CI_Model {

        public function add( $id_booking , $date,$time,$car_kilometer) {
                $sql = "INSERT INTO data_pick_up_the_car (id_booking,time_pick_up_car, date_pick_up_car, car_kilometer)
                        VALUES (?, ?, ?, ?)";
                $bind_data = array($id_booking,$time, $date, $car_kilometer);
                $this->db->query($sql, $bind_data);
        }
        
        public function getall_data_pickup(){
                
                $sql = "SELECT *
                        FROM data_pick_up_the_car ";
                return $this->db->query($sql);
                               
        }
        public function searchdate($kw){
                $sql = "SELECT *
                        FROM data_pick_up_the_car
                        WHERE SUBSTRING(date_pick_up_car,5,10) LIKE ? ";
                $bind_data = array("%$kw%");
                return $this->db->query($sql, $bind_data);
                // echo $this->db->last_query();
        }




}