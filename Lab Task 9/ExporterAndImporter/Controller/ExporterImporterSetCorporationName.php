<?php  
require_once '../Model/Model.php';

if (isset($_POST['submit'])) {
    session_start();
//  echo  $_POST['name'];
  $data['crpname'] = $_POST['crpname'];
  $data['username'] =$_SESSION['uname'];  
  if (RegisteredExporterImportersetcorpname($data)) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Corporation Name Has Been Set</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/ExporterAndImporterWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

}

?>