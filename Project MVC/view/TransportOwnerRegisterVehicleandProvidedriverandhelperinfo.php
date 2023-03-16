<?php  
 $message = '';  
 include '../controller/TranportOwnerVehicleRegisterandDriverHelperController.php';
 $error = ''; 
 $flag=TRUE; 
 if(isset($_POST["submit"]))  
 {  
  
  $registrationnumber=test_input($_POST["vregnum"]);
  $drivername=test_input($_POST["drivername"]);
  $helpername=test_input($_POST["helpname"]);
  $driverphonenumber=test_input($_POST["driverphnnumber"]);
  $driverlicense=test_input($_POST["licensenumber"]);
  $vehiclecapacity=(int)test_input($_POST["capacity"]);
 if(empty($_POST["ddob"])||empty($_POST["hdob"]))
  {
    $error="Please Fill Up the Driver and Helper Age";
    $flag=1;
  }
  else
  {
    $driverdateofbirth=($_POST["ddob"]);
    $helperdateofbirth=($_POST["hdob"]);
    $today_date = date('Y-m-d'); 
    $today_date = new DateTime($today_date);
    $date1 = new DateTime($driverdateofbirth);
    $date2 = new DateTime($helperdateofbirth);
    $interval1 = $today_date->diff($date1);
    $interval2 = $today_date->diff($date2);
    $years1 = $interval1->y;
    $years2 = $interval2->y;
    $daysDiff1 = intval($years1);
    $daysDiff2 = intval($years2);
    $error =check($registrationnumber,$drivername,$helpername,$driverphonenumber);

    if(($daysDiff1<21) || ($daysDiff2<20) ||($date1>$today_date)||($date2>$today_date)||($daysDiff1>50) || ($daysDiff2>50))
    {
      $error="Your Driver or Helper Age is not Valid Age";
      $flag=FALSE; 
    } 
    if($error==="fine" && $flag===TRUE && verifylicensenumber($driverlicense) && ($vehiclecapacity>40 && $vehiclecapacity<80))
    {
      $error = 'All the Informations are Correct';
    }
    if($error==="fine" && $flag===TRUE && !verifylicensenumber($driverlicense))
    {
      $error = 'Driver License is not Correct';
    }
    if($vehiclecapacity<40 || $vehiclecapacity>80)
    {
      $error = 'Your Vehicle is not Perfect to carry the Products';
    }
    // echo $error;
  }
  


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
                <legend><b>Registration</legend>                
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
						<td>Vehicle Brand Name</td>
						<td><select name="vehiclebrand" id="vehiclebrand">
            <option value=""></option>
           <option value="Tata Motors">Tata Motors</option>
           <option value="Hino Motors">Hino Motors</option>
           <option value="Isuzu Motors">Isuzu Motors</option>
           <option value="Mitsubishi Fuso">Mitsubishi Fuso</option>
           <option value="Toyota  Motors">Toyota Motors</option>
           <option value="Mahindra & Mahindra">Mahindra & Mahindra</option>
           <option value="Foton Motors">Foton Motors</option>
           <option value="Ashok Leyland">Ashok Leyland</option>
           <option value="UD Trucks">UD Trucks</option>
           <option value="Eicher Motors">Eicher Motors</option>
           <option value="JAC Motors">JAC Motors</option>
           <option value="King Long Motors">King Long Motors</option>
           <option value="SML Isuzu">SML Isuzu</option>
           <option value="Piaggio Vehicles">Piaggio Vehicles</option>
           <option value="Eicher Polaris">Eicher Polaris</option>
           <option value="FAW Group">FAW Group</option>
           <option value="Swaraj Mazda">Swaraj Mazda</option>
           <option value="Scania">Scania</option>
           <option value="Volvo Trucks">Volvo Trucks</option>
           </select></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>Vehicle Registration Number</td>
						<td><input type="text" placeholder="Registration Number" name="vregnum" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>  
            <tr>
						<td>Vehicle Capacity</td>
						<td><input type="number" placeholder="Enter Capacity in Tons" name="capacity" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>       
            <tr>
						<td>Driver Name</td>
						<td><input type="text" placeholder="Enter Driver Name" name="drivername" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Helper Name</td>
						<td><input type="text" placeholder="Enter Helper Name" name="helpname" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Driver Phone Number</td>
						<td><input type="text" placeholder="01xxxxxxxxx" name="driverphnnumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
						<tr>
						<td>Driver License Number</td>
						<td><input type="text" placeholder="License Number" name="licensenumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
                    
            <tr>
            <td colspan="2">
            <fieldset>
            Driver Date of Birth:
            <input type="date" name="ddob"> <br><br>
            </fieldset> 
            </td>
            </tr>
            
            <tr>
            <td colspan="2">
            <fieldset>
            Helper Date of Birth:
            <input type="date" name="hdob"> <br><br>
            </fieldset> 
            </td>
            </tr>
            

            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Add"/><br /> </td>
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