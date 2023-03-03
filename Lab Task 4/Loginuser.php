<?php
session_start();
 include 'LoginCheck.php';
 if(isset($_POST["login"]))  
 {
	$username=$_POST["uname"];
	$password=$_POST["pass"];
	if(readData($username,$password)==TRUE)
	{       
		    cookie();
		    $_SESSION['uname'] = $username;
		    $_SESSION['pass'] = $password;
			header("location:welcome.php");
			exit();
	}
    else{
		$msg = "username or password invalid";
	}


 }
 
 function cookie()
 {
	if (!empty($_POST['remember'])) {
		setcookie("username", $_POST['uname'], time()+10);
		setcookie("password", $_POST['pass'], time()+10);
		setcookie("color", "red", time()+10);
		
	  }else{
		setcookie("username", "");
		setcookie("password", "");
	  }
 }


?>  

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<span><?php
		if (isset($msg)) {
			echo $msg;
		}

	 ?>	 	
	 </span>
	 <br>
	<fieldset style="width:280px" >
	Username:
	<input style="background-color: <?php if (isset($_COOKIE['color'])) {
		 echo $_COOKIE['color'];
	}?>" 
    type="text" name="uname" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
	<br>
	<br>
	Password:
	<input type="password" name="pass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<br>
	<input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
	<br>
	<input type="submit" name="login" value="Login">
	&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="ForgetPass.php">Forget Pass</a>


    </fieldset>
</form>