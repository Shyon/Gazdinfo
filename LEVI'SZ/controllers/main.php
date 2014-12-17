<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
public function __construct()
    {
        parent::__construct();
        
        //Mode meghivasa
    }   


    public function index()
    {
       
        $this->load->view("header"); 
        $this->load->view("banner");
        $this->load->view("content");
        $this->load->view("sidebar"); 
        $this->load->view("footer"); 
    }
}