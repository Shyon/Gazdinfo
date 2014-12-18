 <?php
session_start();
class Login extends CI_Controller
{
	//nyitólap
	public function opening()
	{
		
		$this->load->helper('url');//base_url függvényhez	
		$this->load->model("felhasznalo");
		$email=$this->input->post("username");
		$submitted='false';
		$username=$this->input->post("username");
		$pass=$this->input->post("password");
		$loggedIn = array(
		"username" => $username,
		"password" => $pass);
		$this->session->set_userdata($loggedIn);
		
					
		$submitted=$this->input->post("submitted");
		
		$this->session->set_userdata("username", $username);

		$this->load->view("head.php");
		$this->load->view("banner.html");
		$this->load->view("left.html");
		
		$data=array();
		
		$this->load->view("elerhetoseg.html");
		$this->load->view("footer.html");
	}
	
	
}