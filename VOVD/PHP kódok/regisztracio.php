<?php
$con=mysqli_connect('localhost','root',"");
if(!isset($con))
{
	echo "hiba".mysqli_error();
}
$dbname="Webkereses";
mysqli_select_db($con,$dbname);
if($_POST['nev']!="" && $_POST['felhasznalo']!="" && $_POST['jelszo']!="" && $_POST['email']!="")
{
	$query="insert into Felhasznalo (nev, felhasznalo, jelszo, email) values ('".$_POST['nev']."',
	'".$_POST['felhasznalo']."','".$_POST['jelszo']."','".$_POST['email']."')";
	mysqli_query($con,$query) or die ("Nem sikerult"." ".$query);
}
mysqli_close($con);
echo '<meta http-equiv="refresh" content="0; URL=belepes.php">';
?>