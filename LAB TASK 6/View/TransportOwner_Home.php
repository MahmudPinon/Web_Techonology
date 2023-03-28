<?php 
    include '../Controller/AllController.php';
	session_start();

	if (isset($_SESSION['uname'])) {
        $username=$_SESSION['uname'];
        echo "<center><h2>Welcome ".getName($username). "</h2></center>";
		
	    }else{
		header("location:login.php");
	}

 ?>

<!DOCTYPE html>  
 <html>  
      <head>  
      <title>Profile</title> 
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
                <legend><b>Profile</legend>   
                <div style="text-align: center;">             
                <?php 
                 
                       echo "<a href='ViewProfile.php'>View Profile</a><br><br>";
                       echo "<a href='EditProfile.php'>Edit Profile</a><br><br>";
                       echo "<a href='TrnasportOwnerChangePassword.php'>ChangePassword</a><br><br>";
		               echo "<a href='Logout.php'>Logout</a>";
	

 ?>            
 </div>
            
            </fieldset> 
      </body>  
 </html>  
