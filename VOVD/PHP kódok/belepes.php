<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title> Belépés </title>
		<link rel="stylesheet" type="text/css" href="stilus.css">
	</head>
	<body>
		<div id="gyujto">
		<div id="menu">
		<a href="regisztraciourlap.php"><b>Regisztráció</b></a>
		<a href="belepes.php"><b>Bejelentkezés</b></a>
		<a href="kereses.php"><b>Keresés</b></a>
		<a href="listazas.php"><b>Listázás</b></a>
		</div>
		<table id='belepes' border='1'>
		<tr>
		<form action="" method="POST" enctype="multipart/form-data">
		<td>
		<b>Login: </b></td><td><input type="text" name="felhasznalo">
		</td></tr><tr>
		<td>
		<b>Jelszó: </b></td><td><input type="password" name="jelszo">
		</td></tr><tr>
		<td>
		<img src='chp.php?wth=150&hgt=50&chars=7'>
		<td><input  id='chpcode' type="text" name="chpcode">
		</td></tr>
		</table>
		<input type="submit" value="Belépés">
		</form>
		</div>
	</body>
</html>
<?php
$con=mysql_connect('localhost',"root","");
if(!isset($con))
{
   echo "hiba".mysql_error(); 
}
mysql_select_db("Webkereses");
session_start();
if(!isset($_SESSION['felhasznalo']))
{
	$_SESSION['felhasznalo']=false;
}
if(isset($_SESSION['felhasznalo']) && isset($_POST['chpcode']))
{
	if($_SESSION['security_code']==$_POST['chpcode'])
	{
		$letezik = false;
		if(isset ($_POST['login']) )
		{
			$query=("select * from Felhasznalo where felhasznalo='".$_POST['felhasznalo']."' and jelszo='".$_POST['jelszo']."' LIMIT 1");
			$result=mysql_query($query);
			if ($sor = mysql_fetch_assoc($result))
			{
				$letezik = true;
				$_SESSION['felhasznalo']=true;
				$_SESSION['id']=$sor["id"];
			}
		}
		else
		{
			die ("Nem töltött ki minden mezőt, vagy még nem regisztrált az oldalra!");
		}
		if ($letezik==true)
		{
			echo '<meta http-equiv="refresh" content="0; URL=kereses.php">';
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0; URL=regisztraciourlap.php">';
		}
	}
}	
?>
