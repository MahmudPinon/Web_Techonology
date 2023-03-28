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
                <center><form action="../Controller/CreateRegisteredUser.php" method="POST" enctype="multipart/form-data"> 
                    
                    <table>

            <tr>
						<td>Name</td>
						<td><input type="text" placeholder="Enter Name" name="name" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
						<td>User Name</td>
						<td><input type="text" placeholder="Enter Username" name="un" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>E-mail</td>
						<td><input type="text" placeholder="Enter Email" name="email" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Password</td>
						<td><input type="password" placeholder="Type Password" name="pass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Confirm Password</td>
						<td><input type="password" placeholder="Retype your password" name="Cpass" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>BIN Certificate Number</td>
						<td><input type="number" placeholder="Enter Businees Identification Number" name="binnumber" value="" ></td>
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
            <td colspan="2">
						<fieldset>
						<legend>User Type</legend>
						         <input type="radio" id="transportowner" name="usertype" value="transportowner">
                     <label for="transportowner">Transport Owner</label></br>                     
                     <input type="radio" id="terminalowner" name="usertype" value="terminalowner">
                     <label for="terminalowner">Terminal Owner</label></br> 
                     <input type="radio" id="exporter/importer" name="usertype" value="exporter/importer">
                     <label for="exporter/importer">Exporter/Importer</label>
						</fieldset>
						</td>
					  </tr>
            <tr>
						<td>Phone Number</td>
						<td><input type="text" placeholder="01xxxxxxxxx" name="phonenumber" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>    
            <tr>
						<td>Address</td>
						<td><input type="text" placeholder="Address" name="address" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>    
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Request"/><br /> </td>
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
