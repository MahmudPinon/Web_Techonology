<?php  

// include '../model/Model.php';
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




 function checkreginformation($name,$username,$email,$paswword,$currpassword,$validbin,$daysDiff1,$phonenumber)
           {
            
            $error = ''; 
            $flag=0; 
            if(empty($name))  
            {  
                 
                 $error = "Enter Name"; 
                 return $error; 
                 $flag=1;
            }
            if(!empty($name))
            {
                 //$name = test_input($_POST["name"]);
                 if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                  //echo 'i have returned';
                  $error = "Only letters and white space allowed in the Name";
                  return $error;
                  $flag=1;
              }
            }
            if(empty($email))  
            {  
                 $error = "Enter an e-mail"; 
                 return $error;
                 $flag=1;
            }  
            if(!empty($email)) 
            {
              //$email = test_input($_POST["email"]);
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Enter an Valid e-mail";
                return $error;
                $flag=1;
              }
            }  
            if(empty($_POST["un"]))  
            {  
                 $error = "Enter a username";  
                 return $error;
                 $flag=1;
            } 
            if(!empty($username)) 
            {
              //$username = test_input($_POST["un"]);
              if(!validateUserName($username) )
              {
                  $error = "Username is not a valid username"; 
                  return $error;
                  $flag=1;
              }
            } 
            if(empty($paswword))  
            {  
                 $error = "Enter a password"; 
                 return $error; 
                 $flag=1;
            }
            if(!empty($paswword))  
            {  
              //$password = test_input($_POST["pass"]); 
              if(!validatePassword($paswword)) 
              {
                  $error = "Enter a Correct password"; 
                  return $error;
                  $flag=1;
              } 
               
            }
            if(empty($currpassword))  
            {  
                 $error = "Confirm password field cannot be empty"; 
                 return $error;
                 $flag=1; 
            } 
            if(!empty($currpassword))  
            {  
               

            if(!validatePassword($paswword)  ||!validatePassword($currpassword) ||($paswword!=$currpassword)) 
              {
                  $error = "Enter a Correct password or password didn't match"; 
                  $flag=1;
                  return $error;
              } 
            }
            if(empty($phonenumber))  
            {  
                 $error = "Enter Phone Number";                
                 $flag=1;
                 return $error;
            }
            if(!empty($phonenumber))
            {
                 
                 if (!preg_match("/^(?:\+?88)?01[3-9]\d{8}$/",$phonenumber)) {
                  $error = "Enter a Valid Phone Number";
                  return $error;
                  $flag=1;
              }
            } 
            if($daysDiff1>80 && $daysDiff1<21)
            {
              $error = "Your are Not Eligble for the Registration Your Date of Birth is Incorrect";
              return $error;
              $flag=1;
            }
            if(empty($validbin))
            {
                 $error = "BINumber can not be Empty";                
                 $flag=1;
                 return $error;
            }
            if(!empty($validbin))
            {
                 if(!validatebinnumber($validbin))
                 {
                  $error = "Enter a Valid Bin Number";                
                  $flag=1;
                  return $error;
                 }
            }
            if($flag==0)
            {
              
              $error = "ok"; 
              return $error;
            }
        
        }

// function addtransportownerreginfo($data)
// {
//     $final_data = storeData($data);
//     if(file_put_contents('../data/data.json', $final_data))  
//         {  
//             $error=TRUE;
//             return $error;
//             header("location:../view/Transport_Owner_Registration.php");
//         } 
// }



function validatebinnumber($validbin)
{
  $validbin = str_replace(array(' ', '-'), '', $validbin);
  if(!empty($validbin))
  {
    if (strlen($validbin) != 12 && !ctype_digit($validbin) && $validbin[0] === "0") {
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
  else
  {
    return FALSE;
  }


}


function checkupdateinformation($name,$email,$daysDiff1,$phonenumber)
{
            $error = ''; 
            $flag=0; 
            
            if(empty($name))  
            {  
                 
                 $error = "Enter Name"; 
                 return $error; 
                 $flag=1;
            }
            if(!empty($name))
            {
                 //$name = test_input($_POST["name"]);
                 if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                  //echo 'i have returned';
                  $error = "Only letters and white space allowed in the Name";
                  return $error;
                  $flag=1;
              }
            }
            if(empty($email))  
            {  
                 $error = "Enter an e-mail"; 
                 return $error;
                 $flag=1;
            }  
            if(!empty($email)) 
            {
              //$email = test_input($_POST["email"]);
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Enter an Valid e-mail";
                return $error;
                $flag=1;
              }
            }  
            
            if(empty($phonenumber))  
            {  
                 $error = "Enter Phone Number";                
                 $flag=1;
                 return $error;
            }
            if(!empty($phonenumber))
            {
                 
                 if (!preg_match("/^(?:\+?88)?01[3-9]\d{8}$/",$phonenumber)) {
                  $error = "Enter a Valid Phone Number";
                  return $error;
                  $flag=1;
              }
            } 
            if($daysDiff1>80 || $daysDiff1<21)
            {
              //echo $daysDiff1;
              $error = "Your Age is Incorrect";
              return $error;
              $flag=1;
            }
            if($flag==0)
            {
              
              $error = "ok"; 
              return $error;
            }
}

// function Checkbinnumber($validbin){
//   $data =readData();
//     if(empty($data))
//     {
//         return FALSE;
//     }
//     else
//     {
//       foreach($data as $row)
//       {

//         if($row['binnumber']==$validbin)
//         {
//           return TRUE;
          
//         }
//       } 
//     }
 
// }

// function Checkphonenumber($phonenumber){
//   $data =readData();
//     if(empty($data))
//     {
//         return FALSE;
//     }
//     else
//     {
//       foreach($data as $row)
//       {

//         if($row['phonenumber']==$phonenumber)
//         {
//           return TRUE;
          
//         }
//       } 
//     }
 
// }


// function Checkusername($username){
//     $data =readData();
//       if(empty($data))
//       {
//           return FALSE;
//       }
//       else
//       {
//         foreach($data as $row)
//         {
  
//           if($row['username']==$username)
//           {
//             return TRUE;
            
//           }
//         } 
//       }
   
//   }



//   function checkemail($email){
//     $data =readData();
   
//     if(empty($data))
//     {
//       return FALSE;
//     }
//       else{
//         foreach($data as $row)
//         {
  
//           if($row['e-mail']==$email)
//           {
//             return TRUE;
            
//           }
//         } 
//       }
      
//   }




 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>