<?php  
 $message = '';  
 $error = ''; 
 include 'LoginCheck.php';

 if(isset($_POST["change"]))  
 {
  $prevusername=$_POST["prevuname"];
  $newusername=$_POST["newuname"];
  $oldname=$_POST["oldname"];
  $newname=$_POST["newname"];
  $prevemail=$_POST["prevemail"];
  $newemail=$_POST["newemail"];
  $password=$_POST["pass"];
  if(readData($prevusername,$password)==TRUE)
  {       
    if(validateUsName($newusername) && (filter_var($newemail, FILTER_VALIDATE_EMAIL) && (preg_match("/^[a-zA-Z-' ]*$/",$newname))))
    {
        if(changeprofile($prevusername,$newusername,$newname,$newemail))
        {
            echo "Changed Successfully";
        }
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
           
      </head>  
      <body>  
           <br />  
           <div>  
              <fieldset style="width: 40%;">
                <legend><b>Information</legend>                
                <form method="post">  
            
                    <table>

                    <tr>
						<td>Previous UserName</td>
						<td><input type="text" name="prevuname" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="80"><hr></td>
                    </tr>
                    
                    <tr>
						<td>New UserName</td>
						<td><input type="text" name="newuname" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="80"><hr></td>
                    </tr>
                    <tr>
						<td>Previous Name</td>
						<td><input type="text" name="oldname" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    
                    <tr>
						<td>New Name</td>
						<td><input type="text" name="newname" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
						<td>Previous E-mail</td>
						<td><input type="text" name="prevemail" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    
                    <tr>
						<td>New E-mail</td>
						<td><input type="text" name="newemail" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
				   <td>Password</td>
						<td><input type="password" name="pass" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="80"><hr></td>
                    </tr>
                    <tr>
                    <td colspan="80"><input type="submit" name="change" value="change"/><br /> </td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <td><a href="welcome.php">Welcome Page</a></td>
                     </tr>                     
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }
                     
                     ?>
           </form> 
                </table>
                </fieldset>
            
           <br />  
      </body>  
 </html> 