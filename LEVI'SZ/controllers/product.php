<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller 
{
    public function index()
    {
        $this->load->helper("url");
		$this->load->model("model_product");
		
		$aktu=$this->uri->segment(2);				//kiveszi a 2-ik url szegmenst ami az oldalszámnak felel meg
		$rendezes=$this->uri->segment(3);			//kiveszi a 3. részt ami egy string nev/ar
		$dbszam=$this->uri->segment(4);				//kiválasztott lapok száma
		
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
		
		$data=array("termekek"=>$t);//data tömbbe teszi
		$data['rendezes']=$rendezes;
		$data['dbszam']=$dbszam;
		$data['oldalak']=$oldalak;
		$data['aktu']=$aktu;
		//print_r($t);

        
		$this->load->view("header");
		$this->load->view("banner");
		$this->load->view("content_product",$data);
		$this->load->view("sidebar");
		$this->load->view("footer");        
    }
}

