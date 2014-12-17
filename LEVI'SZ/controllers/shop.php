<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller 
{
    public function index()
    {
        $this->load->helper("url");
		$this->load->model('Products_model');
		$this->load->view("header");
		$this->load->view("banner");
		
				
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
		
		$oldalak=$this->Products_model->oldalSzam($dbszam);
		
		$t = $this->Products_model->lapBetolt($aktu*10,$dbszam,$rendezes);
		
		$data=array("shop"=>$t);//data tömbbe teszi
		$data['rendezes']=$rendezes;
		$data['dbszam']=$dbszam;
		$data['oldalak']=$oldalak;
		$data['aktu']=$aktu;
		
		/*
		echo "<pre>";
		print_r($data['products']);
		*/
		
		
		$data['products']= $this->Products_model->get_all();
		$this->load->view('products', $data);
		
		$this->load->view("sidebar");
		$this->load->view("footer");  
		
	}
	
	function add() 
	{
		$this->load->model('Products_model');
		$product=$this->Products_model->get($this->input->post('sid'));
		
		$insert=array(
			'id' => $this->input->post('sid'),
			'qty' => $qty + 1,
			'price' => $product->purchase,
			'name'=> $product->pname
		);
		
		$this->cart->insert($insert);
		redirect('shop');
	}
	
	function remove($rowid) {
	$this->cart->update(array(
		'rowid'=>$rowid,
		'qty' => 0
		)
	);
	redirect('shop');
	}
		
	
	/*
	$this->load->library('mpdf');
	$this->mpdf->WriteHTML('<p>Hello There</p>');
	$this->mpdf->Output('szamla.pdf');
	
	
	$html = $this->load->view('/pdf_views/order_view',$data, TRUE);
	$this->mpdf->WriteHTML($html);
	$this->mpdf->Output();

	*/
	
}