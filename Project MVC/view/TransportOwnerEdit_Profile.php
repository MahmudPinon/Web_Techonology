<?php  
 $message = '';  
 include '../controller/RegestrationController.php';
 $error = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $name=test_input($_POST["name"]);
  $username=test_input($_POST["un"]);
  $email=test_input($_POST["email"]);
  $paswword=test_input($_POST["pass"]);
  $currpassword=test_input($_POST["Cpass"]);
  $validbin=test_input($_POST["binnumber"]);
  $phonenumber=test_input($_POST["phonenumber"]);
  $error = checkreginformation($name,$username,$email,$paswword,$currpassword); 
  
   if((checkreginformation($name,$username,$email,$paswword,$currpassword) && !empty($_POST["gender"]) && Checkusername($username)!=TRUE && checkemail($email)!=TRUE) && validatebinnumber($validbin) && !Checkbinnumber($validbin))     
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

  else if(Checkusername($username)==TRUE || checkemail($email)==TRUE ){
    $error = ' Your Email or Username Already Exists'; 
  }    
  else if($error!=TRUE )
  {
    $error = 'Please Provide Every Information';
  }
  else if(empty($_POST["gender"]))
  {
    $error = 'Please Select Your Gender';
  }
  else if(!validatebinnumber($validbin))
  {
    $error = 'Please Enter a Valid Bin Number';
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
                <legend><b>Edit Profile</legend>                
                <center><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> 
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     
                    <table>

            <tr>
						<td>User Name</td>
						<td><input type="text" placeholder="Enter Username" name="un" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>New E-mail</td>
						<td><input type="text" placeholder="Enter New Email" name="Nemail" value="" ></td>
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
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>Phone Number</td>
						<td><input type="text" placeholder="01xxxxxxxxx" name="phonenumber" value="" ></td>
					  </tr>         
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Change"/><br /> </td>
            <td colspan="2"><input type="reset" name="reset" value="Reset"/><br /> </td>
            </tr>   
            <tr>
                <td><td colspan="2"><a href="TransportOwner_Home.php">Home</a></td></td>
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