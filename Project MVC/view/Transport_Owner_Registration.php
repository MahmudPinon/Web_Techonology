<?php  
 $message = '';  
 include '../controller/RegestrationController.php';
 $error = '';
 $error1 = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $name=test_input($_POST["name"]);
  $username=test_input($_POST["un"]);
  $email=test_input($_POST["email"]);
  $paswword=test_input($_POST["pass"]);
  $currpassword=test_input($_POST["Cpass"]);
  $validbin=test_input($_POST["binnumber"]);
  $dateofbirth=($_POST["dob"]);
  $phonenumber=test_input($_POST["phonenumber"]);

 $today_date = date('Y-m-d'); 
 $today_date = new DateTime($today_date);
 $date1 = new DateTime($dateofbirth);
 $interval1 = $today_date->diff($date1);
 $years1 = $interval1->y;
 $daysDiff1 = intval($years1);
  
 function reverify($username,$email,$validbin,$daysDiff1,$today_date,$date1,$phonenumber)
 {
  $error='';
  $flag=0;
  //echo 'I am stucked';
  if(Checkusername($username)==TRUE || checkemail($email)==TRUE ){
    $error = ' Your Email or Username Already Exists';
    //echo 'I am stucked1';
    $flag=1;  
    return $error;
  }    
  if(Checkphonenumber($phonenumber))
  {
    $error = ' Your phonenumber Already Exists';
    //echo 'I am stucked1';
    $flag=1;  
    return $error;
  }
  if(empty($_POST["gender"]))
  {
    $error = 'Please Select Your Gender';
    //echo 'I am stucked2';
    $flag=1;
    return $error;
  }
  if(!validatebinnumber($validbin))
  {
    $error = 'Please Enter a Valid Bin Number';
    //echo 'I am stucked3';
    $flag=1;
    return $error;
  }     
  if(Checkbinnumber($validbin))
  {
    $error = 'Duplicate Bin Number';
    //echo 'I am stucked4';
    $flag=1;
    return $error;
  }
  if($daysDiff1>70 || $daysDiff1<21 || $date1>$today_date)
  {
    $error = 'Your Age is not Correct';
    //echo 'I am stucked5';
    $flag=1;
    return $error;
  }
  if($flag!=1)
  {
    $error = 'ok';
    //echo 'I am stucked6';
    return $error;
  }
  
 }


  $error = checkreginformation($name,$username,$email,$paswword,$currpassword,$phonenumber);
 
  $error1 = reverify($username,$email,$validbin,$daysDiff1,$today_date,$date1,$phonenumber); 
  //echo $error1;
   if((checkreginformation($name,$username,$email,$paswword,$currpassword,$phonenumber)==="ok" && !empty($_POST["gender"]) && Checkusername($username)!=TRUE && checkemail($email)!=TRUE) && validatebinnumber($validbin) && !Checkbinnumber($validbin) && !empty($_POST["dob"]) && reverify($username,$email,$validbin,$daysDiff1,$today_date,$date1,$phonenumber)==='ok')     
      {
        if(file_exists('../data/data.json') )  
        {   
             $new_data = array(  
                  'name'               =>     $_POST['name'],  
                  'e-mail'          =>     $_POST["email"],  
                  'username'     =>     $_POST["un"],  
                  'gender'     =>     $_POST["gender"],  
                  'dob'     =>     $_POST["dob"],  
                  'binnumber'     =>     $_POST["binnumber"],
                  'profilepic'     =>     '',
                  'phonenumber'     =>     $_POST["phonenumber"],
                  'pass'     =>     $_POST["pass"]
             );  
             $error=addtransportownerreginfo($new_data);
             if($error==TRUE)
             {
              $error="Your Information is Saved in the Record";
             }
             else{
              $error="Try Again";
             } 
        }  
        else  
        {  
             $error = 'Record File not exits';  
        } 
      }
      
  

}
 ?>  
<!DOCTYPE html>  
 <html>  
      <head>  
      <title>Registration form</title> 
<style>
    
    legend {
            width: 70px;
            padding: 2px;
            margin-left: calc(50% - 35px - 8px);
        }
        fieldset{
  border: 1px solid rgb(255,232,57);
  width: 400px;
  margin:auto;
}
</style>          
      </head>  
      <body>  
           <br />  
           <div>  
              <fieldset >
                <legend><b>Registration</legend>                
                <center><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
                     <?php   
                     if(isset($error) && $error!="ok")  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <?php   
                     if(isset($error1) && $error1!='ok')  
                     {  
                          echo $error1;  
                     }  
                     ?>  
                     <br /> 
                    <table>

            <tr>
						<td>Name</td>
						<td><input type="text" placeholder="Enter Name" name="name" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>User Name</td>
						<td><input type="text" placeholder="Enter Username" name="un" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>E-mail</td>
						<td><input type="text" placeholder="Enter Email" name="email" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Password</td>
						<td><input type="password" placeholder="Type Password" name="pass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Confirm Password</td>
						<td><input type="password" placeholder="Retype your password" name="Cpass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>BIN Certificate Number</td>
						<td><input type="number" placeholder="Enter Businees Identification Number" name="binnumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>        
                     
            <tr>
            <td colspan="2">
						<fieldset>
						<legend>Gender</legend>
						         <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label>
						</fieldset>
						</td>
					  </tr>
					  <tr>
            <td colspan="2"><hr></td>
            </tr>
                    
            <tr>
            <td colspan="2">
            <fieldset>
            Date of Birth:
            <input type="date" name="dob"> <br><br>
            </fieldset> 
            </td>
            </tr>
            </tr>
					  <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>Phone Number</td>
						<td><input type="text" placeholder="01xxxxxxxxx" name="phonenumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>       
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Add"/><br /> </td>
            <td colspan="2"><input type="reset" name="reset" value="Reset"/><br /> </td>
            </tr>                     
            <?php  
            if(isset($message))  
            {  
             echo $message;  
            }  
            ?>  
            </form></center>                 
            </table>
            </fieldset> 
      </body>  
 </html>  