<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Regisztráció </title>
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
		<table id='reg' border='1'>
		<tr>
		<form action="regisztracio.php" method="POST" enctype="multipart/form-data">
		<td>
		<b>Név:</b> </td><td><input type="text" name="nev">
		</td></tr><tr>
		<td>
		<b>Felhasználónév:</b> </td><td><input type="text" name="felhasznalo">
		</td></tr><tr>
		<td>
		<b>Jelszó:</b> </td><td><input type="password" name="jelszo">
		</td></tr>
		<tr>
		<td>
		<b>email:</b> </td><td><input type="text" name="email">
		</td></tr>
		</table>
		<input type="submit" value="Regisztrál">
		</form>
		</div>
	</body>
</html>
