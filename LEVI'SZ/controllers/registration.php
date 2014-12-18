<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller 
{
    public function index()
    {
        
        $this->load->view("header"); 
        $this->load->view("banner");
        $this->load->view("content_registration");  
        $this->load->view("sidebar"); 
        $this->load->view("footer"); 
    }
    public function validate()
    {
        $data = array();
        $submit = $this->input->post("submit");
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $password1 = $this->input->post("password1");
        $password2 = $this->input->post("password2");
        
        if($submit != null)
        {   
            $errors = validate_reg_form($username, $email, $password1, $password2);
            //print_r($errors);
            
            $this->load->model("model_registration");
            $check_user = $this->model_registration->checkUser($username);               
            $check_email = $this->model_registration->checkEmail($email);
                
            if($check_user > 0)
            {
                $data["error"][] = "Ez a felhasználónév már foglalt!";
            }
            if($check_email > 0)
            {
                $data["error"][] = "Ezzel az email címmel már regisztráltak!";
            }
            
            //visszaadja, hogy mennyi hiba van
            $sum = 0;            
            foreach($errors[0] as $err1)
            {
                $sum += $err1;
            }
            
            //visszaadja a hibaüzeneteket
            foreach($errors[1] as $err2)
            {
                $data["error"][] = $err2; 
            }
                    
            if($sum > 0)
            {              
                $this->load->view("header"); 
                $this->load->view("banner");
                $this->load->view("content_registration",$data);
                $this->load->view("sidebar"); 
                $this->load->view("footer"); 
            }
            else
            {
                $formData = array(
                    array(
                        "login" => $username,
                        "pwd" => md5($password1),
                        "email" => $email
                    ));
                    
                    $this->model_registration->addUser($formData);
                                
                    $this->load->view("header"); 
                    $this->load->view("banner");
                    $this->load->view("content_registration_succes");
                    $this->load->view("sidebar"); 
                    $this->load->view("footer");
            }
            
        }
    }
}