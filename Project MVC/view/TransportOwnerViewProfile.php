
        
      
                <?php  
                       include '../controller/ViewTranportOwnerProfileController.php' ;
                       $message='';
                       session_start();
                       $name = $_SESSION['uname'];
                       $student = TOtInfo($name);

	                   echo $student['name'];
	                   echo "<br>";
	                   echo $student['e-mail'];
	                   echo "<br>";
	                   echo $student['username'];
	                   echo "<br>";
	                   echo $student['gender'];
	                   echo "<br>";
	                   echo $student['dob'];
	                   echo "<br>";
                       echo $student['binnumber'];
	                   echo "<br>";
                       echo $student['profilepic'];
	                   echo "<br>";
                       echo $student['phonenumber'];
	                   echo "<br>";


?>             
 