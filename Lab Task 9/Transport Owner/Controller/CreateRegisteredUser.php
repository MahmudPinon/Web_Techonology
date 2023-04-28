<?php  
require_once '../Model/Model.php';

// if (isset($_POST['submit'])) {
    
//  echo  $_POST['name'];
  $data['name'] = $_POST['name'];
  $data['username'] = $_POST['username'];
  $data['email'] = $_POST['email'];
  $data['binnumber'] = $_POST['binnumber'];
  $data['address'] = $_POST['address'];
  $data['dateofbirth'] = $_POST['dob'];
  $data['phonenumber'] = $_POST['phnnumber'];
  $data['usertype'] = $_POST['usertype'];
    
    $input_date=$_POST['dob'];
    $today_date = date("Y-m-d");
    $datetime1 = new DateTime($input_date);
    $datetime2 = new DateTime($today_date);
    $interval = $datetime1->diff($datetime2);
    $daysDiff1 = $interval->y;
    $data['age'] =$daysDiff1;
	  $data['password'] =password_hash($_POST['password'],PASSWORD_DEFAULT);
	//$data['image'] = basename($_FILES["image"]["name"]);



//     $target_dir = "../uploads/";
// 	  $target_file = $target_dir . basename($_FILES["image"]["name"]);

// 	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//     echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
  
  if (addRegisterMember($data)) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request has been Sent Please Wait</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/TransportOwnerRegistration.html" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

// }

?>