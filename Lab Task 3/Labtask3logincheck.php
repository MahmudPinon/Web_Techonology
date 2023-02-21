<?php 


function validateUserName($userName) {
    $allowed = array(".", "-", "_");
    if(preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,}[0-9a-zA-Z]$/',$userName) && ctype_alnum( str_replace($allowed, '', $userName ) ) ) {
      return true;
    }
    return false;
  }

  function validatePassword($password) {
    if(preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}\S+$$/',$password)) {
      return true;
    }
    return false;
  }



	if (!empty($_POST['remember'])) {

        $username= $_POST['uname'];
        $password=$_POST['pass'];

        if(validateUserName($username) && validatePassword($password))
        {
            setcookie("username", $_POST['uname'], time()+10);
            setcookie("password", $_POST['pass'], time()+10);
            setcookie("color", "red", time()+10);
            echo "Cookie set successfully";
        }
        else
        {
          echo "Unseccessful attemt";
        }
       

	}else if(empty($_POST['remember'])){
        $username= $_POST['uname'];
        $password=$_POST['pass'];

        if(validateUserName($username) && validatePassword($password))
        {
            setcookie("username", "");
		        setcookie("password", "");

        }else
        {
          echo "Unseccessful attemt";
        }
        
	}

  





 ?>
 <br>
 <a href="Labtask3login.php">Go back to login</a>