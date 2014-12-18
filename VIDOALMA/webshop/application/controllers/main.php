 <?php

class Main extends CI_Controller
{
	//nyitólap
	public function opening()
	{
		
		$this->load->helper("url");//base_url függvényhez	
		$this->load->model("termek");
		$aktu=$this->uri->segment(2);//kiveszi a 2-ik url szegmenst ami az oldalszámnak felel meg
		$rendezes=$this->uri->segment(3);//kiveszi a 3. részt ami egy string nev/ar
		$dbszam=$this->uri->segment(4);//kiválasztott lapok száma
		
		$formsub=$this->input->post("formsub");
		
		if($formsub=='true')
		{
			$rendezes=$this->input->post("rendezes");
			$dbszam=$this->input->post("megjelenites");
		}
		
		if($rendezes==null)$rendezes='ar';
		if($dbszam==null)$dbszam=10;
		if($aktu==null)$aktu=0;
		
		$oldalak=$this->termek->oldalSzam($dbszam);
		
		$t = $this->termek->lapBetolt($aktu*10,$dbszam,$rendezes);
		
		$data=array("termekek"=>$t);//data tömbbe teszi
		$data['rendezes']=$rendezes;
		$data['dbszam']=$dbszam;
		$data['oldalak']=$oldalak;
		$data['aktu']=$aktu;
		//print_r($t);
		
		$this->load->view("head.php");
		$this->load->view("banner.html");
		$this->load->view("left.html");
		//$this->load->view("content.html");//regi, nem kell
		$this->load->view("content_termeklap",$data);//tömb amit használ az oldal, ebből robbantja ki a változókat
		
		$this->load->view("footer.html");
	}
}