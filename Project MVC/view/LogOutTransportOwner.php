<?php 

	session_start();

	if (isset($_SESSION['uname'])) {
		session_destroy();
		header("location:Transport_Owner_Login.php");
	}
	else{
		header("location:Transport_Owner_Login.php");
	}

 ?>