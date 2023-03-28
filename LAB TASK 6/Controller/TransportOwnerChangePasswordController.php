<?php  
require_once '../Model/Model.php';
require_once "../Controller/Verification.php";
session_start();
if(isset($_POST["submit"]))  
{
  
          if(validatePassword($_POST['Npass'])  && validatePassword($_POST['CNpass']) &&  ($_POST['Npass']==$_POST['CNpass'])) 
              {
                $data['password'] = password_hash($_POST['Npass'], PASSWORD_BCRYPT, ["cost" => 12]);
                if(Changepassword($_SESSION['uname'],$data))
                {
                    header("location:../View/Login.php");
                }
                else
                {
                    echo "Please Enter Your PasswordProperly";
                }

              } 
         else
         {
            echo "Enter a Correct password or password didn't match"; 
         }   


}




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