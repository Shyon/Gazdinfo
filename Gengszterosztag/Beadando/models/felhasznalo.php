 w<?php // "Felhasznalo" => "felhasznalo.php" 

class Felhasznalo extends CI_Model
{
	public function checkuser($nev="")
	{
		if(strlen($nev)==0)return 99;
		
		//lekérdezzük az ütköző user idját 'num' néven
		$s1="select sid as num from po_users where login like ".$this->db->escape($nev).";";
		
		$query=$this->db->query($s1);
		
		$arr=$query->result_array();
		
		//ha nincs ütköző elem, örülünk
		if(count($arr)==0)return -1;

		//visszaadja az sql tömbből a 'num nevű elemet'
		return $arr['0']['num'];
		
	}
	
	/*//public function checkmail($email="")
	{
		if(strlen($email)==0)return 99;

		//lekérdezzük az ütköző user idját 'num' néven
		$s1="select sid as num from po_users where email like ".$this->db->escape($email).";";
		
		$query=$this->db->query($s1);
		
		$arr=$query->result_array();
		
		//ha nincs ütköző elem, örülünk
		if(count($arr)==0)return -1;
		
		//visszaadja az sql tömb elemeit egyetlen számként
		return $arr['0']['num'];	
	}*/
	
	public function adduser($username="",$pass="")
	{
		if(strlen($username)<5 || strlen($pass) < 5) return false;
	
		$s1="insert into po_users (login,pwd) VALUES (".$this->db->escape($username).",md5(".$this->db->escape($pass)."));";
		
		$query=$this->db->query($s1);
		
		return true;
	}
	
	public function addproduct($pname="",$memo="",$purchase="",$netto="",$brutto="",$quantity="")
	{
		if(strlen($pname)==0 || strlen($purchase) == 0 || strlen($netto) == 0 || strlen($brutto) ==0) return false;
	
		$s1="insert into po_products (pname,memo,purchase,netto,brutto,quantity) VALUES (".$this->db->escape($$pname).",".$this->db->escape($memo).",".$this->db->escape($purchase).",".$this->db->escape($netto).",".$this->db->escape($brutto).",".$this->db->escape($quantity).");";
		
		$query=$this->db->query($s1);
		
		return true;
	}
	
	public function loginwithname($username="",$pass="")
	{
		if(strlen($username)==0 || strlen($pass==0))return false;
		
		$s1="select count(sid) as num from po_users where login like ".$this->db->escape($username)."and pwd=md5(".$this->db->escape($pass).");";
		
		$query=$this->db->query($s1);
		
		if($arr['0']['num']==1)return true;
		else return false;
		
	
	}
	
	public function loginwithmail($email="",$pass="")
	{
			if(strlen($email)==0 || strlen($pass==0))return false;
			
			
		$s1="select count(sid) as num from po_users where email like ".$this->db->escape($email)."and pwd=md5(".$this->db->escape($pass).");";
		
		$query=$this->db->query($s1);
		
		if($arr['0']['num']==1)return true;
		else return false;
	
	}
	
}