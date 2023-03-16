

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
              <legend>WELCOME</legend>               
                
                     
                    <table>

             <tr>
            <?php 

                session_start();
                if (isset($_SESSION['uname'])) {
                echo "<h2>Welcome ". $_SESSION['uname']. "</h2>";
                echo "<a href='TransportOwnerViewProfile.php'>View Profile</a><br>";
                echo "<a href='TransportOwnerEdit_Profile.php'>Edit Profile</a><br>";
                echo "<a href='TransportOwner_ChangeProfilePicture.php'>Change Profile Picture</a><br>";
                echo "<a href='TransportOwner_ChangePassword.php'>Change Password</a><br>";
                echo "<a href='TransportOwnerRegisterVehicleandProvidedriverandhelperinfo.php'>Register Vehicle and Provide Driver and Helper Information</a><br>";
                echo "<a href='TransportOwnerDriverandhelperupdateinfo.php'>Update Driver and Helper Information</a><br>";
                echo "<a href='TransportOwnerAskforFine.php'>Ask for Demarage</a><br>";
                echo "<a href='ExporterandImporterDetails.php'>Details of Exporter and Importer</a><br>";
                echo "<a href='ExportorImportProductinfo.php'>Product Information</a><br>";
                echo "<a href='LogOutTransportOwner.php'>Logout</a><br>";

                }else{
                header("location:Transport_Owner_Login.php");
                }
            ?>
					  </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
                          
            </table>
            </fieldset> 
      </body>  
 </html>  