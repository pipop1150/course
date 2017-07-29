<?php

class Login extends CI_Model {
    public function __construct() {
        // Connect to the Database(check database information at: [project]/application/config/database.php)
        $this->load->database();
    }

    public function admin($username, $password) {
        // Get data from "admin" table and check with username and password.
        $query = $this->db->get_where('admin', 
            array(
                'username' => $username, 
                'password' => $password
            )
        );
            
        // Check the result that is empty, 
        if (empty($query->row_array())) {
            return false;
        }

        return true;
    }
}