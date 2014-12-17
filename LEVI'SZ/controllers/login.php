<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function index()
    {
        
        $this->load->view("header"); 
        $this->load->view("banner");
        $this->load->view("content_login");
        $this->load->view("sidebar"); 
        $this->load->view("footer"); 
    }
    public function validate()
    {
        $submit = $this->input->post("submit");
        $username = $this->input->post("username");
        $password1 = $this->input->post("password1");
        
        if($submit != null)
        {
            $this->load->model("model_login");
            $pwdMd5 = md5($password1);
            $el1 = $this->model_login->checkUser($username);
            $el2 = $this->model_login->checkPassword($pwdMd5);
            
            if($el1 == 1 && $el2 == 1)
            {    
                $data = array(
                    "username" => $username,
                    "is_logged_in" => 1
                );
                $this->session->set_userdata($data);
                redirect("member");
            }
            else
            {       
                
                $this->index();              
            }
        } 

    }
}