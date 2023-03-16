<?php
session_start();
 include '../controller/LoginController.php';
 if(isset($_POST["submit"]))  
 {
	$username=$_POST["username"];
	$password=$_POST["password"];
	if(verifyData($username,$password)==TRUE)
	{       
		    cookie();
		    $_SESSION['uname'] = $username;
		    $_SESSION['pass'] = $password;
			header("location:TransportOwner_Home.php");
			exit();
	}
    else{
		$msg = "username or password invalid";
	}


 }
 
 function cookie()
 {
	if (!empty($_POST['remember'])) {
		setcookie("username", $_POST['username'], time()+10);
		setcookie("password", $_POST['password'], time()+10);
		setcookie("color", "red", time()+10);
		
	  }else{
		setcookie("username", "");
		setcookie("password", "");
	  }
 }
?> 


<!DOCTYPE HTML >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login form</title>
<style type="text/css">
input[type=text]:focus { background:#e4f0f8 }
.formexample {
	width:80%;
	border:1px solid #000;
	margin:20px auto;
	text-align:center;	
}
.formtest { background:#f9f9f9; }
.formtest fieldset{
	padding:20px;
	margin:0;
	border:none;
	display:inline-block;
	*display:inline;/* ie6/7 hack for inline block */
	zoom:1.0;/* ie6/7 hack for inline block */
	vertical-align:middle;
	width:50%;
}
.formtest label {
	display:inline-block;
	vertical-align:middle;
	width:25%;
	min-width:90px;
	text-align:right;
	margin:5px 0;
}
.formtest input {
	width:60%;
	min-width:100px;
	margin:5px 0;
 vertical-align:middle;
	border:1px solid #ddd;
	text-align:left;
}
#submit {
	border:1px solid #000;
	color:#000;
	padding:0;
	overflow:hidden;
	height:25px;
	font-weight:bold;
	margin:auto;
	display:block;
	text-align:center;
}
#submit:hover {
	background:#000;
	color:#fff
}
.formtest div {
	border:2px solid #fff;
	padding:5px;
}
</style>
</head>

<body>
<div class="formexample">
		<form  class="formtest" method="post" action="">
				<fieldset>
						<legend>Log In</legend>
						<div>
						<label>Username : </label>   
                        <!--<input type="text" placeholder="Enter Username" name="username" required>--> 
						<input style="background-color: <?php if (isset($_COOKIE['color'])) {
		                echo $_COOKIE['color'];
	                    }?>" 
                        type="text" placeholder="Enter Username" name="username" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>" required> 
                        </div>
						<div>
                        <label>Password : </label>   
                        <!--<input type="password" placeholder="Enter Password" name="password" required>--> 
						<input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">  
                        </div>   
						<div>
						<input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
						</div>
                        <div>
								<input type="submit" name="submit" id="submit" value="Submit" />
								 <a href="TransportOwnerPasswordFind.php">Forgot password? </a>
								<br>
								<a href="Transport_Owner_Registration.php">Sign Up</a>
						</div>


				</fieldset>
		</form>
</div>
</body>
</html>