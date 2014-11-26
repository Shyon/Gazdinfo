<?php
//session_start();
$con=mysqli_connect('localhost','root',"");
if(!isset($con))
{
	echo "hiba".mysqli_error();
}
$dbname="Webkereses";
mysqli_select_db($con,$dbname);
if($_POST['url']!="" && $_POST['kerszov']!="")
{
	$query="insert into Kereses (kerid, felhasznalo, url, kerszov, datum) values ('".$_POST['kerid']."',
	'".$_POST['felhasznalo']."','".$_POST['url']."',".$_POST['kerszov'].",".$_POST['datum'].")";
	mysqli_query($con,$query) or die ("Nem sikerult"." ".$query." ".mysqli_error());

}
mysqli_close($con);
echo '<meta http-equiv="refresh" content="0; URL=keresesurlap.php">';
?>