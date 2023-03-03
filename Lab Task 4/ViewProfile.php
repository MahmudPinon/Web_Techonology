<?php  
 $message = '';  
 $error = ''; 
 include 'LoginCheck.php';

 if(isset($_POST["view"]))  
 {
  $username=$_POST["uname"];
  $password=$_POST["pass"];
  if(readData($username,$password)==TRUE)
  {       
     $person = details($username,$password);

	echo $person['name'];
	echo "<br>";
	echo $person['email'];
	echo "<br>";
	echo $person['username'];
	echo "<br>";
	echo $person['gender'];
	echo "<br>";
	echo $person['dob'];
	echo "<br>";
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
                <legend><b>View Profile</legend>                
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
                    <td colspan="80"><input type="submit" name="view" value="see"/><br /> </td>
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