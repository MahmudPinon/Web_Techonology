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

  if (!empty($_POST['iamsure']))
  {
    $currpass= $_POST['currpass'];
    $newpass=$_POST['newpass'];
    $renewpass=$_POST['renewpass'];
   
    if(!validatePassword($currpass))
    {
      echo "Cuurent Password format is not Correct";
    }
    else if(($currpass==$newpass && $renewpass!=$newpass) && (!validatePassword($newpass)))
    {
      echo "Cuurent Password and New Pasword  match or New Password and Retyped new Password Didn't matched or New Password format is not Correct";
    }
    else if(($currpass!=$newpass || $renewpass==$newpass) && (validatePassword($newpass)))
    {
            setcookie("newpassword", $_POST['newpass'], time()+10);
            setcookie("color", "cyan", time()+10);
            echo "Password Changed successfully";
    }
  }

 ?>
 <br>
 <a href="Labtask3login.php">Go back to login</a>