<?php
$con=mysql_connect('localhost','root',"");
if(!isset($con))
{
	echo "hiba".mysql_error();
}
$dbname="Webkereses";
mysql_select_db($dbname);
if($_POST['nev']!="" && $_POST['felhasznalo']!="" && $_POST['jelszo']!="" && $_POST['email']!="")
{
$query="insert into users (nev, felhasznalo, jelszo, email) values ('".$_POST['nev']."','".$_POST['felhasznalo']."','".$_POST['jelszo']."','".$_POST['email']."')";
mysql_query($query) or die ("Nem sikerult"." ".$query);
}
mysql_close($con);
echo '<meta http-equiv="refresh" content="0; URL=belepoellenorzes.php">';
?>