<?php
session_start();
$con=mysql_connect('localhost','root',"");
if(!isset($con))
{
	echo "hiba".mysql_error();
}
$dbname="Webkereses";
mysql_select_db($dbname);
if($_POST['kerid']!="" && $_POST['felhasznalo']!="" && $_POST['url']!="" && $_POST['kerszov']!="" && $_POST['datum']!="")
{
	$query="insert into Kereses (kerid, felhasznalo, url, kerszov, datum) values (".$_POST['kerid'].",
	'".$_POST['felhasznalo']."','".$_POST['url']."',".$_POST['kerszov'].",".$_POST['datum'].")";
	mysql_query($query) or die ("Nem sikerult"." ".$query."  ".mysql_error());

}
mysql_close($con);
echo '<meta http-equiv="refresh" content="0; URL=kerfeltolt.php">';
?>