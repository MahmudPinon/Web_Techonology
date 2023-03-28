<?php  
require_once '../Model/Model.php';
require_once "../Controller/Verification.php";

if (isset($_POST['submit'])) {

 
  $name=test_input($_POST["name"]);
  $username=test_input($_POST["un"]);
  $email=test_input($_POST["email"]);
  $paswword=test_input($_POST["pass"]);
  $currpassword=test_input($_POST["Cpass"]);
  $validbin=test_input($_POST["binnumber"]);
  $address=test_input($_POST["address"]);
  $dateofbirth=($_POST["dob"]);
  $phonenumber=test_input($_POST["phonenumber"]);

  $today_date = date('Y-m-d'); 
  $today_date = new DateTime($today_date);
  $date1 = new DateTime($dateofbirth);
  $interval1 = $today_date->diff($date1);
  $years1 = $interval1->y;
  $daysDiff1 = intval($years1);
   

  if (checkreginformation($name,$username,$email,$paswword,$currpassword,$validbin,$daysDiff1,$phonenumber)==='ok')
  {
 //echo "Inside checkinformation";
  $data['name'] = $_POST['name'];
	$data['username'] = $_POST['un'];
	$data['email'] = $_POST['email'];
  $data['binnumber'] = $_POST['binnumber'];
	$data['address'] = $_POST['address'];
  $data['dateofbirth'] = $_POST['dob'];
  $data['phonenumber'] = $_POST['phonenumber'];
  $data['usertype'] = $_POST['usertype'];
  $data['age'] =$daysDiff1;
	$data['password'] = password_hash($_POST['pass'], PASSWORD_BCRYPT, ["cost" => 12]);
	//$data['image'] = basename($_FILES["image"]["name"]);



//     $target_dir = "../uploads/";
// 	  $target_file = $target_dir . basename($_FILES["image"]["name"]);

// 	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//     echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
  
  if (addRegisterMember($data)) {
  	//echo 'Successfully added!!';
  }
 else {
	echo 'You are not allowed to access this page.';
  }

}
}

?>