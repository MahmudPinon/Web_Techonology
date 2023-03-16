<?php  
 $message = '';  
 include '../controller/profilepicturecontroller.php';
 $error = '';
 $error1 = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $target_dir = "../data/";
  $username=($_POST["un"]);
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $$error=checkingprofile($target_file,$check);
  if(CheckUsername($username))
  {
       if($error=="ok")
       {
        
       }
       else if($error!="ok")
       {
        $error="Image Could not be Uploaded";
       }
  }
  else if(!CheckUsername($username))
  {
    $error="Username is not a registered user";
  }
  
  
 }


      
?>  
<!DOCTYPE html>  
 <html>  
      <head>  
      <title>Change Profile Picture</title> 
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
                <legend><b>Change Profile Picture</legend>                
                <center><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data"> 
                     <?php   
                     if(isset($error) && $error!="ok")  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />   
                    <table>


            <tr>
						<td>User Name</td>
						<td><input type="text" placeholder="Enter Username" name="un" value="" ></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>Select image to upload:</td>
						<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
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