<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller{
    public function login()
    {  
          if($this->session->userdata("username") != "")
        {
            redirect("Control");
        }
        unset($_SESSION['not_equal']);
        $this->load->view("User_authentication/login");
    }

    public function login_validations() {
        unset($_SESSION['registered']);
        unset($_SESSION['wrong']); // use to clear flash data
        $config_rules = array(
            array (
                "field" => "username_txt",
                "label" => "Username",
                "rules" =>"trim|required",  // callback_ use to call any function you want
            ),
             array(
                "field" => "password_txt",
                "label" => "Password",
                "rules" =>"trim|required",
            ),  
        );
        $this->form_validation->set_rules($config_rules);
        if($this->form_validation->run() == false){

            $this->login(); // run this function again
        }
        else
        {
            $username = $this->input->post("username_txt");
            $password = $this->input->post("password_txt");

            if($this->g_model->login_validation($username,$password))
            {
                $this->session->set_userdata("username",$username);
                if($this->session->userdata("currentpage") != "")
                {
                    redirect($this->session->userdata("currentpage"));
                }
                redirect("Control");
            }
            else{
                $this->session->set_flashdata("wrong", "Invalid Credentials");
                $this->login();
            }
        } 
    }

    public function register()
    {
           if($this->session->userdata("username") != "")
        {
            redirect("Control");
        }
        unset($_SESSION['registered']);
        unset($_SESSION['wrong']);
        $this->load->view("User_authentication/register");
    }


    public function register_auth()
    {
        unset($_SESSION['wrong']);
         unset($_SESSION['not_equal']);
           $config_rules = array(
            array (
                "field" => "username_txt",
                "label" => "Username",
                "rules" =>"trim|required|is_unique[user.username]",
            ),
             array(
                "field" => "password1_txt",
                "label" => "Password",
                "rules" =>"trim|required|min_length[8]|max_length[20]",
            ),   
            array(
                "field" => "password2_txt",
                "label" => "Confirm Password",
                "rules" =>"trim|required|min_length[8]|max_length[20]",
            ),  
        );

        $this->form_validation->set_rules($config_rules);

        if($this->form_validation->run() == false)
        {
            $this->register();
        }
        else
        {
            $username = $this->input->post("username_txt");
            $password1 = $this->input->post("password1_txt");
            $password2 = $this->input->post("password2_txt");

            if($password1 != $password2)
            {
                $this->session->set_flashdata("not_equal", "Your passwrods are not the same");
                $this->register();
            }
            else
            {
                   
                $this->g_model->register_credentials(
                    array(
                        "username" => $username,
                        "password" => $this->encryption->encrypt($password1),
                        
                        
                    )
                    );
                $this->session->set_flashdata("registered", "You succesfully registered!");
                redirect("Control/login");
                
            }
        }

    }

    public function homepage() {
        $visitor = $this->session->userdata("username");
        $this->load->view('homepage', array(
            "username" => $visitor,
        )
    );
    }

    public function logout() {
        $this->session->unset_userdata("username");
        redirect("Control/login");
    }
}