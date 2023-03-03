<?php 

	session_start();

	if (isset($_SESSION['uname'])) {
		session_destroy();
		header("location:Loginuser.php");
	}
	else{
		header("location:Loginuser.php");
	}

 ?>