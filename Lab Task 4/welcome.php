

<fieldset>
<legend>WELCOME</legend>

<?php 

	session_start();
	if (isset($_SESSION['uname'])) {
		echo "<h2>Welcome ". $_SESSION['uname']. "</h2>";
		echo "<a href='ViewProfile.php'>View Profile</a><br>";
		echo "<a href='EditProfile.php'>Edit Profile</a><br>";
		echo "<a href='product.php'>Change Profile Picture</a><br>";
		echo "<a href='Changepass.php'>Change Password</a><br>";
		echo "<a href='Logout.php'>Logout</a>";
	}else{
		header("location:Loginuser.php");
	}

    

 ?>


</fieldset>
