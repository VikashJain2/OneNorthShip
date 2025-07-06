<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

class UserModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function register($data){
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        return $this->db->insert("users", $data);
    }

    public function get_user_by_username($username){
        $query = $this->db->get_where("users", array("username"=> $username));
        return $query->row_array();
    }

    public function login($username, $password){
        $user = $this->get_user_by_username($username);
        if($user && password_verify($password, $user["password"])){
            return $user;
        }
        return false;
    }
}
?>
