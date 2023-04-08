<?php
require_once '../Model/Model.php';
$email=$_POST["email"];
echo ForgetPass($email);
$response = array();
if (ForgetPass($email)!==TRUE) {
 
    $response['exists'] = false;
}
else
{
    echo "EMAIL";
}
echo json_encode($response);
?>
