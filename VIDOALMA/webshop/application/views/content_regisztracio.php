 <div id="content">
	<h1>Regisztráció</h1>
	
	<form action="<?php ECHO base_url(); ?>/index.php/regisztracio" method="post">
	

	
	<table class="yellowdiv" style="margin: 0px auto;">
	<tr>
	<td>
	<div id="error">
	
	<?php
	if(isset($errors) && count($errors)>0){
	ECHO "Hibák:";
	ECHO "<ul>";
	foreach($errors as $i)
	{
		ECHO "<li>".$i."</li>";
	}
	
	ECHO  "</ul>";
	}
	?>
	
	</div>
	</td>
	</tr>
	<tr>
	<td>Felhasználónév:</td>
	<td><input type="text" name="username" value="<?php if(isset($username) && $username!=null)ECHO $username; ?>"> </input></td>
	</tr>
	<tr>
	<td>E-mail:</td>
	<td><input type="text" name="email" value="<?php if(isset($email) && $email!=null)ECHO $email; ?>"></input></td>
	</tr>
	<td>Jelszó:</td>
	<td><input type="password" name="pass1"></input></td>
	</tr>
	<td>Jelszó mégegyszer:</td>
	<td><input type="password" name="pass2"></input></td>
	</tr>
	<tr>
	<td><input type="submit" value="Regisztráció"></input></td>
	</tr>
	</table>
	<input type="hidden" name="submitted" value="true" />
	
	</form>
	
	

</div>