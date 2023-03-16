<?php  
 $message = '';  
 include '../controller/RegestrationController.php';
 $error = '';
 $error1 = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
    $regnumber=test_input($_POST["vregnum"]);
  $olddrivername=test_input($_POST["prevdrivername"]);
  $newdrivername=test_input($_POST["newdrivername"]);
  $newdriverphonenumber=test_input($_POST["newphnnumber"]);
  $newdriverlicense=test_input($_POST["licensenumber"]);

  $dateofbirth=($_POST["dob"]);

  $today_date = date('Y-m-d'); 
  $today_date = new DateTime($today_date);
  $date1 = new DateTime($dateofbirth);
  $interval1 = $today_date->diff($date1);
  $years1 = $interval1->y;
  $daysDiff1 = intval($years1);
  
 



      
  

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
                <legend><b>Update Driver</legend>                
                <center><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
                     <?php   
                     if(isset($error) && $error!="ok")  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />   
                    <table>
                    <tr>
						<td>Vehicle Registration Number</td>
						<td><input type="text" placeholder="Registration Number" name="vregnum" value="" ></td>
					  </tr>
                      <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Previous Driver Name</td>
						<td><input type="text" placeholder="Enter Old Driver Name" name="prevdrivername" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>New Driver Name</td>
						<td><input type="text" placeholder="Enter New Driver Name" name="newdrivername" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>    
                 
            <tr>
						<td>New Driver Phone Number</td>
						<td><input type="text" placeholder="01xxxxxxxxx" name="newphnnumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            
            <td>
            <fieldset>
            Driver Date of Birth:
            <input type="date" name="ddob"> <br><br>
            </fieldset> 
            </td>
            </tr>       
            <tr>
						<td>Driver License Number</td>
						<td><input type="text" placeholder="License Number" name="licensenumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Add"/><br /> </td>
            <td colspan="2"><input type="reset" name="reset" value="Reset"/><br /> </td>
            </tr>
           
            <tr>
                <td colspan="2"><a href="TransportOwner_Home.php">Home</a></td>
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