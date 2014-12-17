<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller 
{
    public function index()
    {   
        $this->load->view("header"); 
        $this->load->view("banner");
        
        if($this->session->userdata("is_logged_in"))
        {   
            //kéne egy model_member, ahonnan kiíratnánk az adatokat 
            
            $this->load->model("model_product");
            $aktu=$this->uri->segment(2);
            $rendezes=$this->uri->segment(3);
            $dbszam=$this->uri->segment(4);
		
            $formsub=$this->input->post("formsub");
		
            if($formsub=='true')
            {
                $rendezes=$this->input->post("rendezes");
                $dbszam=$this->input->post("megjelenites");
            }
		
            if($rendezes==null)$rendezes='ar';
            if($dbszam==null)$dbszam=10;
            if($aktu==null)$aktu=0;
		
            $oldalak=$this->model_product->oldalSzam($dbszam);
		
            $t = $this->model_product->lapBetolt($aktu*10,$dbszam,$rendezes);
		
            $data=array("termekek"=>$t);
            $data['rendezes']=$rendezes;
            $data['dbszam']=$dbszam;
            $data['oldalak']=$oldalak;
            $data['aktu']=$aktu;
            
            $this->load->view("content_product_member", $data); 
            $this->load->view("sidebar_member"); 
        }
        else
        {
            $this->load->view("content_restricted");
            $this->load->view("sidebar"); 
        }
        
        $this->load->view("footer");
    }
    
    public function logout()
    {
		$newdata = array(
		  'user_id'   =>'',
		  'user_name'  =>'',
		  'user_email'     => '',
		  'logged_in' => FALSE,
		  );
		$this->session->unset_userdata($newdata );
        $this->session->sess_destroy();
       
        
        $this->load->view("header"); 
        $this->load->view("banner");
        $this->load->view("content");
        $this->load->view("sidebar"); 
        $this->load->view("footer"); 
    }
	
	public function basket()
	{
		$this->load->view("header"); 
        $this->load->view("banner");
        $this->load->view("content_basket_member");
        $this->load->view("sidebar_member"); 
        $this->load->view("footer"); 
	}
}