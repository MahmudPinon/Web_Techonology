<?php  
 $message = '';  
 include '../controller/Updatedriverandhelpercontroller.php';
 $error = '';
 $error1 = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $regnumber=test_input($_POST["regnum"]);
  if(validVeregnumber($regnumber))
  {
       
       if(!empty($_POST['driver']) && !empty($_POST['helper']))
       {
        echo "hERE";
        header("location:../view/DriverandHelper.php");
       }
       if(!empty($_POST['driver']) && empty($_POST['helper']))
       {
        header("location:../view/Driver.php");
       }
       if(empty($_POST['driver']) && !empty($_POST['helper']))
       {
        header("location:../view/Helper.php");
       }
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
                <legend><b>Update Driver and Helper Information</legend>                
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
						<td>Vehicle Registration Number</td>
						<td><input type="text" placeholder="Enter Registration Number" name="regnum" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td><input type="checkbox" id="driver" name="driver" value="update1">
                        <label for="vehicle1">I want to update driver information</label></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td><input type="checkbox" id="helper" name="helper" value="update2">
                        <label for="vehicle1"> I want to update helper information</label></td>						
					  </tr>
                    
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"/><br /> </td>
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