 <div id="content" align="center">
	<h1>Bejelentkezés</h1>
	
	<form action="<?php ECHO base_url(); ?>/index.php/login" method="post">
	
	
	<table class="yellowdiv" style="margin: 0px auto;">
	
	<tr>
	<td>Felhasználónév:</td>
	<td><input type="text" name="username" value="<?php if(isset($username) && $username!=null)ECHO $username; ?>"> </input></td>
	</tr>

	<tr>
	<td>Jelszó:</td>
	<td><input type="password" name="password"></input></td>
	</tr>
	<?php
	Echo "<tr><td>";
	Echo "";
	Echo "</td></tr>";
	?>
	<td><input type="submit" value="Bejelentkezés"></input></td>
	</tr>
	</table>
	<input type="hidden" name="submitted" value="true" />
	</form>
	
	

</div>