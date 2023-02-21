
<style type="text/css">
    label{
          width:100px;
          display:inline-block;
    }
   
        
    </style>
	
		<form method="post" action="CheckChangePassword.php">
        <fieldset style="width: 40%;">
				<legend><b>CHANGE PASSWORD</b></legend>
				
                <label>Current Password:</label>
				<input style="color: blue;"; type="text" name="currpass" value="<?php if(isset($_COOKIE['currpassword'])) {echo $_COOKIE['currpassword'];} ?>">
	            <br><br>
				<label>New Password:</label>
	            <input type="password" name="newpass" value="<?php if(isset($_COOKIE['newpassword'])) {echo $_COOKIE['newpassword'];} ?>">
                <br><br>
                <label>Retype New Password:</label>
	            <input type="password" name="renewpass" value="<?php if(isset($_COOKIE['renewpassword'])) {echo $_COOKIE['renewpassword'];} ?>">
                <br><br>  
                <input id="iamsure" type="checkbox" name="iamsure" <?php if(isset($_COOKIE['newpassword'])) {echo "checked";} ?>> <label for="sure">I am Sure</label>
	            <br><br>
                <input type="submit" name="change" value="Change">
				<a style=" padding: 7px 20px; " target="_blank"  href="Labtask3login.php"> Login Page </a>
						
				
				
			</fieldset>
		</form>