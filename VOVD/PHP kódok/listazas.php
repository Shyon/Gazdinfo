<?php
session_start();
if(!isset($_SESSION['felhasznalo']))
{
	echo '<meta http-equiv="refresh" content="0; URL=listazas.php">';
}
else
{
	if ($_SESSION['felhasznalo'] == false)
	{
		echo '<meta http-equiv="refresh" content="0; URL=belepes.php">';
	}
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Listázás </title>
		<link rel="stylesheet" type="text/css" href="stilus.css">
	</head>
	<body>
		<div id="gyujto">
		<div id="menu">
		<a href="regisztraciourlap.php"><b>Regisztráció</b></a>
		<a href="belepes.php"><b>Bejelentkezés</b></a>
		<a href="keresesurlap.php"><b>Keresés</b></a>
		<a href="listazas.php"><b>Listázás</b></a>
		</div>
<?php
$con=mysqli_connect('localhost',"root","");
if(!isset($con))
{
   echo "hiba".mysqli_error(); 
}
mysqli_select_db($con,"webkereses");
$query="select kereses.url, kereses.kerszov from kereses";  
$ertek=mysqli_query($con,$query) or die ("Nem sikerült".$query);
echo "<table border=2>";
echo "<tr>
<td>Keresés helye</td>
<td>Keresett szöveg</td>
</tr>";

while(list($felhasznalo,$kerszov,$datum)=mysqli_fetch_row($ertek))
{
	echo "<tr><td>$felhasznalo</td><td>$kerszov</td><td>$datum</td></tr>";
}
echo "</table>";
mysqli_close($con);
?>
		</div>
	</body>
</html>
