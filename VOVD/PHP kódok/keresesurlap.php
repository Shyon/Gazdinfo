<?php
session_start();
if(!isset($_SESSION['felhasznalo']))
{
	echo '<meta http-equiv="refresh" content="0; URL=belepes.php">';
}
else
{
	if ($_SESSION['felhasznalo'] == false)
	{
		echo '<meta http-equiv="refresh" content="0; URL=regisztraciourlap.php">';
	}
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Keresés </title>
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
		<table id='feltolt' border='1'>
		<tr>
		<form action="kereses.php" method="POST" enctype="multipart/form-data">
		<td>
		<b>Keresés helye (URL-cím):</b> </td><td><input type="text" name="url">
		</td></tr><tr>
		<td>
		<b>Keresendő szöveg:</b> </td><td><input type="text" name="kerszov">
		</td></tr>
		</table>
		<input type="submit" value="Keresés">
		</form>
		</div>
	</body>
</html>
