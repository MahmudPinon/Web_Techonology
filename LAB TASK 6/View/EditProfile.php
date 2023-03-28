<?php  
require_once '../Controller/AllController.php';
session_start();


if (isset($_SESSION['uname'])) {
	$student = fetchPerson($_SESSION['uname']);
	
	}else{
	header("location:login.php");
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
  border: 1px solid rgb(200,30,90);
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
                <center><form action="../Controller/EditProfileController.php" method="POST" enctype="multipart/form-data"> 
                    <table>

            <tr>
						<td>Name</td>
						<td><input value="<?php echo $student['Name'] ?>" type="text" id="name" name="name"></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>E-mail</td>
						<td><input value="<?php echo $student['Email'] ?>" type="text" id="email" name="email"></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>Phone number</td>
						<td><input value="<?php echo $student['Phone number'] ?>" type="text" id="phonenumber" name="phonenumber"></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>     
            <tr>
						<td>Profile Picture</td>
						<td><input type="file" name="image"></td>
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
            <td colspan="2"><hr></td>
            </tr>    
            <tr>
						<td>Address</td>
						<td><input type="text" value="<?php echo $student['Address'] ?>" name="address" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>    
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Change"/><br /> </td>
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
