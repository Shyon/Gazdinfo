<?php
session_start();
function code($chars)  
{   
  $chars0="0123456789abcdefghijklmnopqrstuvwxyz"; 
  $result='';
  for($i=0;$i<$chars;$i++)   
  {
    $result.=substr($chars0,mt_rand(0,strlen($chars0)-1),1);
  }  
  return $result; 
}
function image($width='100', $height='40', $chrs='6') 
{
  $code=code($chrs);  
  $font_size=$height*0.75;  
  $image=imagecreate($width, $height); 
  $background=imagecolorallocate($image, 255,255,255); 
  $text_color=imagecolorallocate($image,0,0,0); 
  $noise=imagecolorallocate($image,100,120,180);  
  for($i=0;$i<($width*$height)/150;$i++)
  { 
    imageline($image,mt_rand(0,$width), mt_rand(0,$height), mt_rand(0, $width), mt_rand(0,$height), $noise);
     
  }
  $textbox=imagettfbbox($font_size, 0,'Arial.ttf', $code); 
  $x=($width-$textbox[4])/2; 
  $y=($height-$textbox[5])/2;

   
  imagettftext($image,20, 0, 10, 30, $text_color,'Arial.ttf'  , $code);
  header('Content-Type: image/jpeg'); 
  imagejpeg($image); 
  imagedestroy($image); 
  $_SESSION['security_code']=$code; 
 
}

  $captcha=image($_GET['wth'],$_GET['hgt'], $_GET['chars']); 
?>