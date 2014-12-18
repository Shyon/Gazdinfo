 <?php

class Regisztracio extends CI_Controller
{
	//nyitólap
	public function opening()
	{
		$this->load->helper("url");//base_url függvényhez	
		$this->load->model("felhasznalo");
		
		$data=array();
		
		$username=$this->input->post("username");
		//$email=$this->input->post("email");
		$pass1=$this->input->post("pass1");
		$pass2=$this->input->post("pass2");
		$submitted=$this->input->post("submitted");
		
		
		$this->load->view("head.php");
		$this->load->view("banner.html");
		$this->load->view("left.html");
		
		if($submitted!=null)
		{
			$errors=array();
			
			if(strlen($username)<5)$errors[]="Túl rövid felhasználónév";
		//	if(strlen($email)<5)$errors[]="Hibás e-mail cím";
			if(strlen($pass1)<5)$errors[]="Túl rövid jelszó";
			if($pass1!=$pass2)$errors[]="A jelszavak nem egyeznek";
			
			$usertest=$this->felhasznalo->checkuser($username);
			
			//if($usertest>-1)$errors[]="A email cím már létezik.";
			
			//$emailtest=$this->felhasznalo->checkmail($email);
			
			if($usertest>-1)$errors[]="A felhasználónév már létezik";
			
			
			if(count($errors)==0)
			{
				//hozzáadás
				$hozzaadva=$this->felhasznalo->adduser($username,$pass1);
			
				if($hozzaadva==true)
				{
					//regsikeres view
					$this->load->view("content_regsiker");
				}else{
					$errors[]="SQL hiba.";
					$data["username"]=$username;
					//$data["email"]=$email;
					$data["errors"]=$errors;
					$this->load->view("content_regisztracio",$data);
				}
			}else{
				$data["username"]=$username;
				$data["email"]=$email;
				$data["errors"]=$errors;
				$this->load->view("content_regisztracio",$data);
			}
		
		}else{
			$this->load->view("content_regisztracio");//tömb amit használ az oldal, ebből robbantja ki a változókat
		}
		
		$this->load->view("footer.html");
	}
}