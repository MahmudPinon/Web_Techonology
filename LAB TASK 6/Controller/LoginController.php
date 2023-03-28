<?php  
require_once '../Model/Model.php';
session_start();
// if(isset($_POST["login"]))  
// {
  
//     // foreach ($_COOKIE as $cookieName => $cookieValue) {
//     // setcookie($cookieName, '', time() - 3600);
//     //  }
//   if(!empty($_POST["username"]) && !empty($_POST["password"]))
//   {
//     $username=$_POST["username"];
//     $password=$_POST["password"];
   
    
//     if(verifyLoginData($username,$password)==TRUE)
//     {       
//           cookie();
//           $_SESSION['uname'] = $username;
//           $_SESSION['pass'] = $password;
//           //header("location:../View/TransportOwner_Home.php");
//          exit();
//     }
//     if(verifyLoginData($username,$password)==FALSE)
//     {
//       $msg = "username or password invalid";
//     }
//   }
//   else
//   {
//     echo "Password or UserName is Empty";
//   }


// }

// function cookie()
// {
// 	if (!empty($_POST['remember'])) {
// 		setcookie("username", $_POST['username'], time()+10);
// 		setcookie("password", $_POST['password'], time()+10);
// 		setcookie("color", "red", time()+10);
// 		echo "Cookie set successfully";
		
// 	}else{
// 		setcookie("username", "");
// 		setcookie("password", "");
// 		echo "Cookie not set";

// 	}
// }


function verify($username,$password)
{
  if(verifyLoginData($username,$password)==TRUE)
  {
    
    return TRUE;
  }
  else {
    return FALSE;
  }
}





?>