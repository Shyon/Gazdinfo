<form action="#" method="post">
    url: <input name="url" /><br />
    str: <input name="str" /><br />
    <input type="submit" value="OK"/>
</form>

<?php
if(isset($_POST['url'])&& isset($_POST['str'])){
    
    
    $a= file_get_contents("http://".$_POST['url'],'r'); // <-- nem kell a http, mert általában bemásoljuk az url-t
  // $a = file_get_contents($_POST['url'],'r');
   /*for($i=0; $i<strlen($a); $i++){
        echo $a[$i];
    } */
    if(szokeres($_POST['str'],$a)){
        //mail();
        echo "ok";
    }else{
        echo "nem ok";
    }
}

function szokeres($str, $source){
    $a = explode($str,$source);
    if(isset($a[0])&& isset($a[1])){return true;}
    return false;
}
?>