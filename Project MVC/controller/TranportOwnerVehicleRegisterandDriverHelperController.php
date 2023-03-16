<?php  

include '../model/Model.php';
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




 function check($registrationnumber,$drivername,$helpername,$driverphonenumber)
           {
            $error = ''; 
            $flag=0; 
            if(empty($drivername))  
            {  
                 $error = "Enter Name";  
                 $flag=1;
            }
            if(!empty($drivername))
            {
                 
                 if (!preg_match("/^[a-zA-Z-' ]*$/",$drivername)) {
                  $error = "Only letters and white space allowed in the Name";
                  return $error;
                  $flag=1;
              }
            }
            if(empty($helpername))  
            {  
                 $error = "Enter Name";  
                 $flag=1;
            }
            if(!empty($helpername))
            {
                 
                 if (!preg_match("/^[a-zA-Z-' ]*$/",$helpername)) {
                  $error = "Only letters and white space allowed in the Name";
                  return $error;
                  $flag=1;
              }
            }
            if(empty($driverphonenumber))  
            {  
                 $error = "Enter Phone Number";  
                 $flag=1;
            }
            if(!empty($driverphonenumber))
            {
                 
                 if (!preg_match("/^(?:\+?88)?01[3-9]\d{8}$/",$driverphonenumber)) {
                  $error = "Enter a Valid Phone Number";
                  return $error;
                  $flag=1;
              }
            }
            if($flag===0)
            {
                $error = "fine";
                return $error;
                // return TRUE;
            }
        
        }

        function verifylicensenumber($licensenumber)
        {

          $pattern = "/^[A-Z]{2}-\d{2}-\d{5}$/";
          if(!preg_match($pattern, $licensenumber)){
            return FALSE;
          }
          
          $split = explode('-', $license_number);
          $districtpart = $split[0];
          $licenseserialnumber = $split[1].$split[2];
          
          $validdistrictcodes = array('DH', 'CT', 'KL', 'BA', 'RA', 'SY', 'MY', 'CH', 'BA', 'KH', 'NM', 'GB', 'JP', 'SB', 'PD', 'RN', 'LS', 'RV', 'BG', 'JS', 'PR', 'TG');
          if(!in_array($districtpart, $validdistrictcodes)){
            return FALSE;
          }
          
          if(!is_numeric($licenseserialnumber)){
            return FALSE;
          }
          
          return TRUE;
        }
        








 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>