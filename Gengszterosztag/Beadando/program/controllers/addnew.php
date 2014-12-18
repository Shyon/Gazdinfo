 <?php
session_start();
class Addnew extends CI_Controller
{
	//nyitólap
	public function opening()
	{

		$this->load->helper("url");
		$this->load->model("felhasznalo");
		$this->load->view("feltolt");
		$pname=$this->input->post("pname");
		$memo=$this->input->post("memo");
		$purchase=$this->input->post("purchase");
		$netto=$this->input->post("netto");
		$brutto=$this->input->post("brutto");
		$quantity=$this->input->post("quantity");
		$submitted='false';
		
		$pass=$this->input->post("password");
		$s1=$this->felhasznalo->addproduct("add");
		
		
		$submitted=$this->input->post("submitted");
		

		$this->load->view("head.php");
		$this->load->view("banner.html");
		$this->load->view("left.html");
		
		$data=array();
		
				
	
	}
}