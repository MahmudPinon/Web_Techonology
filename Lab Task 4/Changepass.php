<?php  
 $message = '';  
 $error = ''; 
 include 'LoginCheck.php';

 if(isset($_POST["change"]))  
 {
  $username=$_POST["uname"];
  $password=$_POST["pass"];
  $newpassword=$_POST["newpass"];
  if(readData($username,$password)==TRUE)
  {       
    if(changepass($username,$password,$newpassword))
    {
        echo "Changed Successfully";
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
                <legend><b>Change Pass</legend>                
                <form method="post">  
            
                    <table>

                    <tr>
						<td>User Name</td>
						<td><input type="text" name="uname" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="80"><hr></td>
                    </tr>
                    
                    <tr>
						<td>Cuurent Password</td>
						<td><input type="password" name="pass" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="80"><hr></td>
                    </tr>
                    <tr>
						<td>New Password</td>
						<td><input type="password" name="newpass" value="" ></td>
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