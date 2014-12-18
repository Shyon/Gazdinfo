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
		
		if(isset($submitted) && $submitted!=null && $submitted=="true")
		{
			$e1=$this->felhasznalo->checkuser($username);
			
			//$e2=$this->felhasznalo->checkmail($email);
			
			if($e1>=0)
			{//vagy név vagy email létezik
				
				if($e1>=0)
				{//név létezik
					$ok=$this->felhasznalo->loginwithname($username,$pass);
					if($ok==false){
						$this->load->view("content_loginsikeres");
						$this->load->view("loggedleft.html");
						}
					else{
							$data=array();
							$data['username']=$username;
							$data['password']=$pass;
							$data['error']="Hibás felhasználónév/jelszó!";
							$this->load->view("content_login",$data);
														echo $data['error'];
					}
				}/*else{
					if($e2>=0)
					{//email létezik
						$ok=$this->felhasznalo->loginwithmail($email,$pass);
						if($ok==false){
						$this->load->view("content_loginsikeres");
						
						}else{
							$data=array();
							$data['username']=$email;
							$data['password']=$pass;
							$data['error']="Hibás adatok2!";
							$this->load->view("content_login",$data);
														echo $data['error'];
						}
					}*/
			}
			else{
				
				$data=array();
				/*$data['email']=$email;*/
				$data['pass']=$pass;
				$data['error']="Nincs ilyen felhasználó!";
				$this->load->view("content_login",$data);
				
			}
		}	
		else{$this->load->view("content_login");}
		
		
		$this->load->view("footer.html");
	}	
	
}