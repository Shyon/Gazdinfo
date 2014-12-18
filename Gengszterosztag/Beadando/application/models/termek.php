 <?php // "Termek" => "termek.php" 

class Termek extends CI_Model
{
	public function lapBetolt($hanyadiktol=0,$hanyDb=10,$rendezes='ar' )
	{
		//$ret=array();
		
		$s="select * from po_products ";
		if($rendezes=="ar")$s=$s."order by purchase ";
		if($rendezes=="nev")$s=$s."order by pname";
		$s=$s." limit {$hanyadiktol},{$hanyDb};";

		//echo $s;
		
		$query=$this->db->query($s);
		
		return $query->result_array();
		/*
		foreach($query->result_array() as $row)
		{
			$ret[] = $row; //ez valójában egy lista add
		 
		}
		
		return $ret;*/
	}
	
	public function oldalSzam($hanyDb=10)
	{
		$s='select count(*) as num from po_products';
		
		$query=$this->db->query($s);
		
		$arr=$query->result_array();
		
		//PRINT_R($arr);
		
		
		
		return ceil($arr['0']['num']/$hanyDb);

	}
}