<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_model extends CI_Model {
    function login_validation($username,$password)
    {
       
        $this->db->where("username",$username);
        if($this->db->get("user")->num_rows() > 0)
        {
            $this->db->select("password");
            $this->db->where("username",$username);
            $pass = $this->db->get("user")->row()->password; 
            $decrypt = $this->encryption->decrypt($pass);
            if($password == $decrypt)
            {
                return true;
            }
        }
        else
        {
            return false;
        }
    }

    function register_credentials($data)
    {
        return $this->db->insert("user",$data);
    }

    function get_user_id($username)
    {
        // this is use to get the ID of the user who is currently logged in
        $this->db->select("id");
        $this->db->where("username",$username);
        $result = $this->db->get("user")->row()->id;
        
        return $result;
         

    }

}