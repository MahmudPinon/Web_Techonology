<?php  
 $message = '';  
 include '../controller/RegestrationController.php';
 $error = '';
 $error1 = ''; 
 $flag=0; 
 if(isset($_POST["submit"]))  
 {  
  
  $productcode=test_input($_POST["code"]);

 function reverify($username,$email,$validbin,$daysDiff1,$today_date,$date1)
 {
  $error='';
  $flag=0;
  //echo 'I am stucked';
  if(Checkusername($username)==TRUE || checkemail($email)==TRUE ){
    $error = ' Your Email or Username Already Exists';
    //echo 'I am stucked1';
    $flag=1;  
    return $error;
  }    

  if(empty($_POST["gender"]))
  {
    $error = 'Please Select Your Gender';
    //echo 'I am stucked2';
    $flag=1;
    return $error;
  }
  if(!validatebinnumber($validbin))
  {
    $error = 'Please Enter a Valid Bin Number';
    //echo 'I am stucked3';
    $flag=1;
    return $error;
  }     
  if(Checkbinnumber($validbin))
  {
    $error = 'Duplicate Bin Number';
    //echo 'I am stucked4';
    $flag=1;
    return $error;
  }
  if($daysDiff1>70 || $daysDiff1<21 || $date1>$today_date)
  {
    $error = 'Your Age is not Correct';
    //echo 'I am stucked5';
    $flag=1;
    return $error;
  }
  if($flag!=1)
  {
    $error = 'ok';
    //echo 'I am stucked6';
    return $error;
  }
  
 }


  $error = checkreginformation($name,$username,$email,$paswword,$currpassword);
 
  $error1 = reverify($username,$email,$validbin,$daysDiff1,$today_date,$date1); 
  //echo $error1;
   if((checkreginformation($name,$username,$email,$paswword,$currpassword)==="ok" && !empty($_POST["gender"]) && Checkusername($username)!=TRUE && checkemail($email)!=TRUE) && validatebinnumber($validbin) && !Checkbinnumber($validbin) && !empty($_POST["dob"]) && reverify($username,$email,$validbin,$daysDiff1,$today_date,$date1)==='ok')     
      {
        if(file_exists('../data/data.json') )  
        {   
             $new_data = array(  
                  'name'               =>     $_POST['name'],  
                  'e-mail'          =>     $_POST["email"],  
                  'username'     =>     $_POST["un"],  
                  'gender'     =>     $_POST["gender"],  
                  'dob'     =>     $_POST["dob"],  
                  'binnumber'     =>     $_POST["binnumber"],
                  'profilepic'     =>     '',
                  'pass'     =>     $_POST["pass"]
             );  
             $error=addtransportownerreginfo($new_data);
             if($error==TRUE)
             {
              $error="Your Information is Saved in the Record";
             }
             else{
              $error="Try Again";
             } 
        }  
        else  
        {  
             $error = 'Record File not exits';  
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
                <legend><b>Exporter/Importer Details</legend>                
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
						<td>Exporter/Importer Office Location:</td>
						
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>         
            <tr>
						<td>Exported/Importer e-mail:</td>
						
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>

            <tr>
						<td>Exported/Importer phone-number:</td>
						
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