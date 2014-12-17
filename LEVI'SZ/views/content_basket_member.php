<div id="content">
<h1>Adatok</h1>
<div id="login">
	<form action="<?php echo base_url(); ?>index.php/buydata" method="post" id="buy">
    
        <label for="fname">
            <span>Vezetéknév:</span><br>
            <input type="input" id="fname" name="fname" />
        </label><br>
        
        <label for="lname">
            <span>Keresztnév:<span><br>
            <input type="input" id="lname" name="lname" />
        </label><br>
        
		<label for="address">
            <span>Lakcím:<span><br>
            <input type="input" id="address" name="address" />
        </label><br>
		
		<label for="szml">
            <span>Számlát kér róla?<span><br>
			<input type="radio" name="szml" value="0">Nem
			<input type="radio" name="szml" value="1">Igen
		</label><br>
				
				<?php if ($this->input->post("szml")==1):?>
				<label for="szmlnev">
			<span>Számlázási név:<span><br>
            <input type="input" id="szmlnev" name="szmlnev" />
			</label><br>
			<label for="szmlcim">
            <span>Számlázási cím:<span><br>
            <input type="input" id="szmlcim" name="szmlcim" />
			</label><br>
			
			<?php endif;?>
				
				
		<label for="email">
            <span>E-mail cím:<span><br>
            <input type="input" id="email" name="email" />
        </label><br>
		
		<label for="tel">
            <span>Telefonszám:<span><br>
            <input type="input" id="lname" name="lname" />
        </label><br>
		
		<label for="travel">
            <span>Szállítás módja:<span><br>
            <select>
				<option value="futar">Futár</option>
				<option value="kez">Személyes átvétel</option>
		</select>
        </label><br>
		
		<label for="pay">
            <span>Fizetés módja:<span><br>
            <select>
				<option value="utal">Utalás</option>
				<option value="kp">Utánvétel</option>
		</select>
        </label><br>
		
        <input type="submit" value="Küldés" />
        <input type="hidden" name="submit" value="true"/>
    </form>
</div>
</div>