<?php
/**
 * Created by PhpStorm.
 * User: eleaz
 * Date: 05/04/2019
 * Time: 9:29 AM
 */
class Auth_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function checkAuth($username, $password){
        echo $username.' : '.$password;
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('pas');

        if ($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}