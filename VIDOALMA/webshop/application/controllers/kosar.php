 <?php
class Kosar extends CI_Controller
{
public function opening() //közös form feldolgozó
{
	$this->load->view("head.php");
	$this->load->view("banner.html");
	$this->load->view("left.html");
	$this->load->view("content_kosar.php");
	$this->load->view("footer.html");
	
	$formsub= $this->input->post("");
	//szures formot postolták vissza
	if ($formsub=="szures")
	{
	$rend = $this->input->post("rendezes");
	$megj = $this->input->post("megjelenites");
	$this->session->set_userdata("rendezes", $rend);
	$this->session->set_userdata("megjelenites", $megj);
	$this->session->set_userdata("akt_lap");
	}
else if ($formsub=="kosarba")
{
	$rend = $this->session->userdata("rendezes");
	$megj = $this->session->userdata("megjelenites");
	$akt = $this->session->userdata("akt_lap");
	$sid = $this->input->post("sid");
	$db = $this->input->post("darab");
	$t = $this->termek->termekBetolt($sid);
	if ($t!=null)
	$this->kosar->add($sid,$db,$t["nev"],$t[""]);
}
else // valahanyadik lapra lapozás
{
$akt_lap = $this->uri->segment(2);
$rend = $this->uri->segment(3);
$megj = $this->uri->segment(4);
}
if($rend==null) $rend="ar";
if($megj==null) $megj="50";
if($akt_lap==null) $akt="1";



}}