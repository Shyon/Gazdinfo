<div id="content">

    <h1>Bejelentkezés</h1>

    <div id="login">
        <form action="<?php echo base_url(); ?>index.php/login/validate" method="post" id="login_form">
    
        <label for="username">
            <span>Felhasználónév</span>
            <input type="input" id="username" name="username" />   
        </label>
        
        <label for="password">
            <span>Jelszó<span>
            <input type="password1" id="password" name="password1" />
        </label>
        
        <input type="submit" value="Bejelentkezek" />
        <input type="hidden" name="submit" value="true"/>
    </form>
    
        <div id="error_msg">
		<?php 
                if(isset($error) && $error !=null)
                {
                    foreach($error as $err)
                    {
                        if(!empty($err))
                        {
                            echo $err."<br />";    
                        }  
                    }
                }
            ?>
		</div>
    
    </div>


</div>