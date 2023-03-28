<?php  
require_once '../Model/Model.php';
require_once "../Controller/Verification.php";
session_start();
$flag=0;
if (isset($_POST['submit'])) {

 
    $name=test_input($_POST["name"]);
    $email=test_input($_POST["email"]);
    $address=test_input($_POST["address"]);
    $dateofbirth=($_POST["dob"]);
    $phonenumber=test_input($_POST["phonenumber"]);
  
    $today_date = date('Y-m-d'); 
    $today_date = new DateTime($today_date);
    $date1 = new DateTime($dateofbirth);
    $interval1 = $today_date->diff($date1);
    $years1 = $interval1->y;
    $daysDiff1 = intval($years1);
     
    
    if (checkupdateinformation($name,$email,$daysDiff1,$phonenumber)==='ok')
    {
   //echo "Inside checkinformation";
      $data['name'] = $_POST['name'];
      $data['email'] = $_POST['email'];
      $data['address'] = $_POST['address'];
      $data['dateofbirth'] = $_POST['dob'];
      $data['phonenumber'] = $_POST['phonenumber'];
      $data['age'] =$daysDiff1;
      $data['image'] = basename($_FILES["image"]["name"]);
    
      $target_dir = "../Uploads/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  	// if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //   echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    // } else {
    //   echo "Sorry, there was an error uploading your file.";
    // }
    
    if (UpdateRegisterMember($_SESSION['uname'],$data)) {
        //echo 'Successfully added!!';
        header('Location: ../View/ViewProfile.php?id=' .$_SESSION['uname']);
    }
   else {
      echo 'You are not allowed to access this page.';
    }
  
  }
  else
  {
    echo checkupdateinformation($name,$email,$daysDiff1,$phonenumber);
    //$flag=1;
  }

  }


?>