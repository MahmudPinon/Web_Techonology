<?php  
 $message = '';  
 $error = ''; 
 include 'LoginCheck.php';
 $flag=0;
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
 
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label>Enter Name</label>";  
           $flag=1;
      }
      if(!empty($_POST["name"]))
      {
           $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = "<label>Only letters and white space allowed in the Name</label>";
            $flag=1;
        }
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label>Enter an e-mail</label>"; 
           $flag=1;
      }  
      if(!empty($_POST["email"])) 
      {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error = "<label>Enter an Valid e-mail</label>";
          $flag=1;
        }
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label>Enter a username</label>";  
           $flag=1;
      } 
      if(!empty($_POST["un"])) 
      {
        $username = test_input($_POST["un"]);
        if(!validateUserName($username) )
        {
            $error = "<label>Username is not a valid username</label>"; 
            $flag=1;
        }
      } 
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label >Enter a password</label>";  
           $flag=1;
      }
      if(!empty($_POST["pass"]))  
      {  
        $password = test_input($_POST["pass"]); 
        if(!validatePassword($password)) 
        {
            $error = "<label >Enter a Correct password</label>"; 
            $flag=1;
        } 
         
      }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label>Confirm password field cannot be empty</label>"; 
           $flag=1; 
      } 
      if(!empty($_POST["Cpass"]))  
      {  
         
        $password = test_input($_POST["pass"]); 
        $currentpassword = test_input($_POST["Cpass"]); 
        if(!validatePassword($password)  ||!validatePassword($currentpassword) ||($password!=$currentpassword)) 
        {
            $error = "<label >Enter a Correct password or password didn't match </label>"; 
            $flag=1;
        } 
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label>Gender cannot be empty</label>";  
      } 
      else if(!empty($_POST["Cpass"])|| !empty($_POST["pass"]) || !empty($_POST["un"])||!empty($_POST["email"])|| !empty($_POST["name"])) 
      {
          $password = test_input($_POST["pass"]); 
          $currentpassword = test_input($_POST["Cpass"]); 
          if(!validatePassword($password)  ||!validatePassword($currentpassword) ||($password!=$currentpassword)) 
          {
              $error = "<label >Enter a Correct password or password didn't match </label>"; 
              $flag=1;
          } 
          $password = test_input($_POST["pass"]); 
         if(!validatePassword($password)) 
         {
            $error = "<label >Enter a Correct password</label>"; 
            $flag=1;
         } 
         $username = test_input($_POST["un"]);
        if(!validateUserName($username) )
        {
            $error = "<label>Username is not a valid username</label>"; 
            $flag=1;
        }
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error = "<label>Enter an Valid e-mail</label>";
          $flag=1;
        }
        if(!empty($_POST["name"]))
      {
           $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = "<label>Only letters and white space allowed in the Name</label>";
            $flag=1;
        }
      }
      if(!empty($_POST["name"]))
      {
           $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = "<label>Only letters and white space allowed in the Name</label>";
            $flag=1;
        }
      }

      }
     if($flag==0) 
      {  
        $username = $_POST['un'];
		$password = $_POST['pass'];
        $email = $_POST['email'];
           if(file_exists('data.json') && (checkemail($email)!=TRUE && Checkusername($username)!=TRUE))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"],  
                     'pass'     =>     $_POST["pass"]
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
      </head>  
      <body>  
           <br />  
           <div>  
              <fieldset>
                <legend><b>Registration</legend>                
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     
                    <table>

                    <tr>
						<td>Name</td>
						<td><input type="text" name="name" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    
                    <tr>
						<td>E-mail</td>
						<td><input type="text" name="email" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>


                    <tr>
						<td>User Name</td>
						<td><input type="text" name="un" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>

                    <tr>
						<td>Password</td>
						<td><input type="password" name="pass" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>

                    <tr>
						<td>Confirm Password</td>
						<td><input type="password" name="Cpass" value="" ></td>
					</tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>

                    
                     
                     <tr>
                            <td colspan="2">
								<fieldset>
									<legend>Gender</legend>
									<input type="radio" name = "gender">Male
                   					<input type="radio" name = "gender">Female
                    				<input type="radio" name = "gender">Other
								</fieldset>
							</td>
					</tr>
					<tr>
                        <td colspan="2"><hr></td>
                    </tr>

                    <tr>
                    <td colspan="2">
                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>
                     </td>
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
                </form> 
                <tr> 
                <td><?php  require 'Registrationfooter.php' ?></td>
                </tr>
                </table>
                </fieldset>
            
           <br />  
      </body>  
 </html>  