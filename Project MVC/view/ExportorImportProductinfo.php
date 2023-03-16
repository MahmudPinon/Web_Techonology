<?php  
 $message = '';  
 include '../controller/RegestrationController.php';
 $error = '';
 $error1 = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $productcode=test_input($_POST["code"]);



}
 ?>  
<!DOCTYPE html>  
 <html>  
      <head>  
      <title>Product Information</title> 
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
                <legend><b>Exported/Imported Product Details</legend>                
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
						<td>Product Code</td>
						<td><input type="text" placeholder="Enter Product Code" name="code" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
            <td colspan="2"><input type="submit" name="submit" value="SUBMIT"/><br /> </td>
            <td colspan="2"><input type="reset" name="reset" value="Reset"/><br /> </td>
            </tr>
            
            <tr>
						<td>Exporter/Importer Name:</td>
						
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Exported To/Imported From:</td>
						
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>Product Weight:</td>
						
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Product Name:</td>
						
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
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