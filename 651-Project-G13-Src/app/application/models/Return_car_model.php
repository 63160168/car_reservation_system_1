<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_car_model extends CI_Model {

        public function add( $id_car, $date, $time) {
                $sql = "INSERT INTO data_return_the_car (id_car, date_return_car, time_return_car)
                        VALUES (?, ?, ?)";
                $bind_data = array($id_car,$date, $time);
                $this->db->query($sql, $bind_data);
        }

        public function getall_data_returnCar(){
                
                $sql = "SELECT *
                        FROM data_return_the_car ";
                return $this->db->query($sql);
                               
        }
        public function searchdate($kw){
                $sql = "SELECT *
                        FROM data_return_the_car
                        WHERE SUBSTRING(date_return_car,5,10) LIKE ? ";
                $bind_data = array("%$kw%");
                return $this->db->query($sql, $bind_data);
                // echo $this->db->last_query();
        }




}