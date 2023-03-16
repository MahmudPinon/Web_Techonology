<?php  
 $message = '';  
 $error = ''; 
 include '../controller/TransportOwnerProfileChangeController.php';

 if(isset($_POST["change"]))  
 {
  $username=test_input($_POST["un"]);
  $password=test_input($_POST["Opass"]);
  $newpassword=test_input($_POST["Npass"]);

  if(verifyusernameandpass($username,$password))
  {       
    if(changepass($username,$password,$newpassword))
    {
        $message ="Changed Successfully";
    }
  }
  else{
      $message = "invalid Information";
  }

 }
 ?>  
<!DOCTYPE html>  
 <html>  
      <head>  
      <title>Change Password form</title> 
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
                <legend><b>Change Password</legend>                
                <center><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
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
						<td>Old Password</td>
						<td><input type="password" placeholder="Old Password" name="Opass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>New Password</td>
						<td><input type="password" placeholder="New password" name="Npass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
      
            <tr>
            <td colspan="2"><input type="submit" name="change" value="change"/><br /> </td>
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