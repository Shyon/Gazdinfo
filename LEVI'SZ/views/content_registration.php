<div id="content">

    <h1>Regisztráció</h1>
    
    <div id="registration">
    
        <form action="<?php echo base_url(); ?>index.php/registration/validate" method="post" id="reg_form">
    
            <label for="username">
                <span>Felhasználónév:</span>
                <input type="input" id="username" name="username" />
            </label>
        
            <label for="email">
                <span>Email:</span>
                <input type="input" id="email" name="email" />
            </label>
            
            <label for="password1">
                <span>Jelszó:</span>
                <input type="password" id="password1" name="password1" />  
            </label>
            
            <label for="password2">
                <span>Jelszó ismét:</span>
                <input type="password" id="password2" name="password2" />
            </label>
            
            <input type="submit" value="Regisztrálok" />
            <input type="hidden" name="submit" value="true  "/>
            
        </form>
    
        <div id="error_msg"></div>
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