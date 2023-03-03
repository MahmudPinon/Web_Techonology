<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<span><?php
		if (isset($msg)) {
			echo $msg;
		}

	 ?>	 	
	 </span>
	 <br>
	<fieldset style="width:580px" >
	Enter E-mail:
	<input type="text" name="email" value="">
	<br>
	<br>
	<input type="submit" name="check" value="check">
	&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="Loginuser.php">Login</a>


  <?php
   session_start();
   include 'LoginCheck.php';
   if(isset($_POST["check"]))  
   {
	$email=$_POST["email"];
	if(checkemail($email)==TRUE)
	{       
		    $reult=providepass($email);
            echo "Your E-Mail is : ".$email;
            print "<br>";
			echo "Your Password is : ".$reult;
			exit();
	}
    else{
		$msg = "E-mail invalid";
	}

   }

  ?>

    </fieldset>
</form>