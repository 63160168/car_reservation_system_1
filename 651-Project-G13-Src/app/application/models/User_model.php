<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function check_login_byCustomer ($username, $password)
    {
        $sql = "SELECT * 
                FROM customer 
                WHERE user_name = ? AND user_password = ? ";
        $bind_data = array($username , md5($password));
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
            return $query->row();
        } else {
            return false;
        }
    }

    public function check_login_bySales ($username, $password)
    {
        $sql = "SELECT * 
                FROM `sales department` 
                WHERE user_sales = ? AND password_sales = ? ";
        $bind_data = array($username , md5($password));
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
            return $query->row();
        } else {
            return false;
        }
    }

    public function check_login_byManager ($username, $password)
    {
        $sql = "SELECT * 
                FROM `manager department`
                WHERE user_manager = ? AND password_manager = ? ";
        $bind_data = array($username , md5($password));
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
            return $query->row();
        } else {
            return false;
        }
    }

    public function check_email ($str){
        $sql = "SELECT user_email
                FROM customer 
                WHERE user_email = ?";
        $bind_data = array($str);    
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
              return true ;
        } else {
              return false;
        }

    }
    public function check_user_name ($str){
        $sql = "SELECT user_name
                FROM customer 
                WHERE user_name = ?";
        $bind_data = array($str);    
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
              return true ;
        } else {
              return false;
        }

    }
    public function check_iden ($str){
        $sql = "SELECT user_identification_card
                FROM customer 
                WHERE user_identification_card = ?";
        $bind_data = array($str);    
        $query = $this->db->query($sql, $bind_data);
        if ($query->num_rows() > 0){
              return true ;
        } else {
              return false;
        }

    }

    public function add() {
        $str="Customer";
        $sql = "INSERT INTO customer (name_of_user, user_name , user_password , user_email , user_address
        , user_identification_card , status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $bind_data = array($this->input->post('name_of_user'), $this->input->post('user_name')
        , md5($this->input->post('password')), $this->input->post('email'), $this->input->post('address')
        ,  $this->input->post('identification_card'), $str);
        $this->db->query($sql, $bind_data);
    }

}