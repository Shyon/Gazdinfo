<div id="content">
	<h1>Termékek</h1>
	<form action="<?php echo base_url();?>index.php/termekek" method="post">
	Rendezés:<select name="rendezes">
	<option  value="ar" <?php if($rendezes=='ar' || $rendezes==null) echo 'selected="selected"'; ?> >Ár szerinti</option>
	<option  value="nev" <?php if($rendezes=='nev') echo 'selected="selected"'; ?>>Név szerinti</option>
	</select>
	
	
	Megjelenítés
	<select name="megjelenites">
	<option  value="10" <?php if($dbszam=='10' || $dbszam==null) echo 'selected="selected"'; ?>>10 termék / lap</option>
	<option  value="20" <?php if($dbszam=='20') echo 'selected="selected"'; ?>>20 termék / lap</option>
	<option  value="30" <?php if($dbszam=='30') echo 'selected="selected"'; ?>>30 termék / lap</option>
	<option  value="40" <?php if($dbszam=='40') echo 'selected="selected"'; ?>>40 termék / lap</option>
	<option  value="50" <?php if($dbszam=='50') echo 'selected="selected"'; ?>>50 termék / lap</option>   
	</select>
	
	<input type="hidden" name="formsub" value="true" />
	
	<button type="submit">Szűrés</button>
	
	</form>
	
	<div id="termekek">
			<?php //print_r($termekek); 
			
			foreach($termekek as $r)
			{
				echo '<div class="termek">';
				echo '<h4>'.$r["pname"].'</h4>';
				echo $r["purchase"].',- Ft<br />';
				echo '<div id="foto"><img src="'.base_url().'images/img/0000000'.$r["sid"].'.jpg" /></div>';
				echo '<br />'.$r["memo"];
				echo '<form action="" method="post">';
				echo '<input type="hidden" name="sid" value="'.$r["sid"].'">';
				//echo '<input type="text" name="darab" value="1">';
				//echo '<input type="submit" name="submit" value="megvesz">';
				echo '<div id="mennyiseg"><select>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>';
				echo '<input type="image" src="../images/layout/kosar.png" name="image" width="25" height="25" value="megvesz"></div>';

				echo '</form>';
				echo '</div>';
			}
			echo "<div class='clear'></div>";
			?>
			
	</div>
	
	<div id="lapozas">
	
	<?php
		//$aktu=8; //aktuális oldal, $oldalak az oldalak száma
		//$oldalak=20;
		$elso=false;
		$masodik=false;
		
		for($i=0;$i<$oldalak;$i++)
		{
			if($i<3||( $i>=($aktu-2) && $i<=($aktu+2) ) || $i>=($oldalak-3) )
			{
				if($i!=$aktu)
				{	
					$s=base_url()."index.php/termekek/".$i."/".$rendezes."/".$dbszam;
					ECHO '<a href='.$s.'>'." ".($i+1).'</a>';
				}else
				{
					ECHO " ".($i+1);
				}
			}else{
			if($elso==false && $i<$aktu){ ECHO " ... "; $elso=true; }
			if($masodik==false&&$i>$aktu){ ECHO " ... "; $masodik=true; }
			}
		}
		
	
	?>

	
	
	</div>
	
	

</div>