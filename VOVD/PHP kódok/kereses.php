<?php
session_start();
$con=mysqli_connect('localhost','root',"");
if(!isset($con))
{
	echo "hiba".mysqli_error();
}
$dbname="Webkereses";
mysqli_select_db($con,$dbname);
if($_POST['url']!="" && $_POST['kerszov']!="")
{
	$query="insert into Kereses (url, kerszov) values ('".$_POST['url']."',
	'".$_POST['kerszov']."')";
	mysqli_query($con,$query) or die ("Nem sikerult"." ".$query);
}
mysqli_close($con);
echo '<meta http-equiv="refresh" content="0; URL=keresesurlap.php">';
?>