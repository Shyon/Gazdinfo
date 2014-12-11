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
$cimzett= $_SESSION['email']; 
ini_set('SMTP', 'smtp.ektf.hu');  
mail($cimzett,  
     "Keresés",  
     "A keresési adatait adatbázisban rögzítettük, amint a weboldalon a keresett szöveg feltűnik, értesítjük Önt!",  
     "From: webkeresess@gmail.com\r\n");
if 
{
	if(isset($_POST['url'])&& isset($_POST['kerszov']))
	{
		$a = file_get_contents($_POST['url'],'r');
		/*for($i=0; $i<strlen($a); $i++){
        echo $a[$i];
		}*/
    if(szokeres($_POST['kerszov'],$a))
	{ 
		ini_set('SMTP', 'smtp.ektf.hu');
		mail($cimzett,  
		"Keresés",  
		"Az Ön által keresett szöveget megtaláltuk az adott weboldalon!",  
		"From: webkeresess@gmail.com\r\n");
    }
	/*else
	{ 
		ini_set('SMTP', 'smtp.ektf.hu');
		mail($cimzett,  
		"Keresés",  
		"A keresett szöveg nem található az adott weboldalon",  
		"From: webkeresess@gmail.com\r\n");
    }*/
	}
}
else
{
	if(isset($_POST['url'])&& isset($_POST['kerszov']))
	{
		$a = file_get_contents("http://".$_POST['url'],'r');
		/*for($i=0; $i<strlen($a); $i++){
        echo $a[$i];
		}*/
    if(szokeres($_POST['kerszov'],$a))
	{ 
		ini_set('SMTP', 'smtp.ektf.hu');
		mail($cimzett,  
		"Keresés",  
		"Az Ön által keresett szöveget megtaláltuk az adott weboldalon!",  
		"From: webkeresess@gmail.com\r\n");
    }
	/*else
	{ 
		ini_set('SMTP', 'smtp.ektf.hu');
		mail($cimzett,  
		"Keresés",  
		"A keresett szöveg nem található az adott weboldalon",  
		"From: webkeresess@gmail.com\r\n");
    }*/
	}
}
function szokeres($kerszov, $source){
    $a = explode($kerszov,$source);
    if(isset($a[0])&& isset($a[1])){return true;}
    return false;
}
mysqli_close($con);
echo '<meta http-equiv="refresh" content="0; URL=keresesurlap.php">';
?>