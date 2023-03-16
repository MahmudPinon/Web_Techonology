<?php  
 $message = '';  
 include '../controller/FindPasswordController.php';
 $error = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $username=test_input($_POST["uname"]);
  $error = find($username); 



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
                <legend><b>Find Password</legend>                
                <center><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
                     <?php   
                     if(isset($error))  
                     {  
                          echo 'Your Password is: '.$error;  
                     }  
                     ?>  
                     <br />  
                     
                    <table>

            <tr>
						<td>Enter User Name</td>
						<td><input type="text" placeholder="User Name" name="uname" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"/><br /> </td>
            <td colspan="2"><input type="reset" name="reset" value="Reset"/><br /> </td>
            </tr>    

            <tr>
                <td><td colspan="2"><a href="Transport_Owner_Login.php">LoginPage</a></td></td>
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