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
      <title>Change Passoword</title> 
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
                <center><form action="../Controller/TransportOwnerChangePasswordController.php" method="POST" enctype="multipart/form-data"> 
                    
                    <table>

            <tr>
						<td>Enter New Password</td>
						<td><input type="password" placeholder="Type New Password" name="Npass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Confirm Password</td>
						<td><input type="password" placeholder="Retype your password" name="CNpass" value="" ></td>
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
