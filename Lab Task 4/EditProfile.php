<?php  
 $message = '';  
 
 include 'LoginCheck.php';
 $flag=0;


 function validate(){
    if(isset($_POST["change"]))  
    {
     $username=$_POST["uname"];
     $password=$_POST["pass"];
     if(readData($username,$password)==TRUE)
     {       
       return TRUE;
     }
     else{
         $message = "invalid Information";
     }
   
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
                <legend><b>Edit Profile</legend>                
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
                     if(validate())
                     {
                        header('Location:Editmainprofile.php');
                        
                     }  
                     ?>
           </form> 
                </table>
                </fieldset>
            
           <br />  
      </body>  
 </html> 