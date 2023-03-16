<?php  
 $message = '';  
 include '../controller/RegestrationController.php';
 $error = ''; 
 $tkammount='';
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $exportandimportername=test_input($_POST["name"]);
  $exportandimporteditemname=test_input($_POST["itmname"]);
  $expectedloaddate=($_POST["doproductload"]);
  $productcode=test_input($_POST["pdctcode"]);
  $vehicleregisternumber=test_input($_POST["vregnumber"]);
  //$error = checkreginformation($name,$username,$email,$paswword,$currpassword); 
  $today = new DateTime();
  $date = new DateTime($expectedloaddate);
  $interval = $today->diff($date);
  $daysDiff = (int) $interval->format('%a');
  echo $daysDiff;
  
    if($today<$date)
    {
      $error='Product Expected Load Date may be Incorrect';
     
    }
    if($daysDiff==0)
    {
      $error='The Product Load Date in Today Please be petient';
    }
    if($today>$date)
    {
      $tkammount=(1000*$daysDiff);
      $message = "Please Be Petient Your Report Has been Submitted and You will get the Payment Within 36 Working Hour";
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
                <legend><b>Demarage</legend>                
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
						<td>Export/Importer Name</td>
						<td><input type="text" placeholder="Enter Name" name="name" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>Export/Importerted Item Name</td>
						<td><input type="text" placeholder="Enter Item Name" name="itmname" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         


            <tr>
						<td>Expected Product Load Date</td>
						<td><input type="date" name="doproductload"> <br><br></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Product Code</td>
						<td><input type="text" placeholder="Enter Product Code" name="pdctcode" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Vehicle Register Number</td>
						<td><input type="text" placeholder="Vehicle Register Number" name="vregnumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
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