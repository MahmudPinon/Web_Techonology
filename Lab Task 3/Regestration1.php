<style type="text/css">
    label{
          width:100px;
          display:inline-block;
    }
   
        
    </style>

        <?php  
 $message = '';  
 $error = '';  
 $name = $email = $gender =$currentpassword=$password=$username="";
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
      elseif(!empty($_POST["name"]))
      {
        $name =$_POST["name"];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = "<label>Only letters and white space allowed</label>";
            $flag=1;
        }
    
        if (str_starts_with($name," ")) {
            $error = "<label>Name Can not Starts with Space</label>";
            $flag=1;
      }
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label>Enter an e-mail</label>"; 
           $flag=1; 
      }
      else if(!empty($_POST["email"])) 
      {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $flag=1;
        }
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label>Enter a username</label>"; 
           $flag=1; 
      }
      else if(!empty($_POST["un"])) 
      {
        $username = $_POST["un"];
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
      
      else if(!empty($_POST["pass"]))  
      {  
        $password = $_POST["pass"]; 
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
      else if(!empty($_POST["Cpass"]))  
      {  
         
        $password = $_POST["pass"]; 
        $currentpassword = $_POST["Cpass"]; 
        if(!validatePassword($password)  ||!validatePassword($currentpassword) ||($password!=$currentpassword)  ) 
        {
            $error = "<label >Enter a Correct password or password didn't match </label>"; 
            $flag=1;
        }
        
        $error = "<label>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label>Gender cannot be empty</label>";  
           $flag=1;
      } 
       
      else if( $flag==0)
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
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
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
      </head>  
      <body>  
           <br />  
           <div>  
                                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <fieldset style="width: 40%;">
				<legend><b>Regestration</b></legend>
                     <label>Name</label>  
                     <input type="text" name="name" /><br /> 
                     <br>
				     <hr> 
                     <label>E-mail</label>
                     <input type="text" name = "email"/><br />
                     <br>
				     <hr> 
                     <label>User Name</label>
                     <input type="text" name = "un"/><br />
                     <br>
				     <hr> 
                     <label>Password</label>
                     <input type="password" name = "pass"/><br />
                     <br>
				     <hr> 
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass"/><br />
                     <br>
				     <hr> 
                    
                     <label>Gender</label>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>
                     <br>
				     <hr> 
                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>
                     
                     
                     <input type="submit" name="submit" value="Add"/><br />   
                     <a href="Registrationcheckandstore.php">Show Data</a>                   
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
                
                </fieldset>
           </div>  
           <br />  
      </body>  
 </html>  