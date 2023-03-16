<?php  
include '../model/Model.php';

function TOtInfo($data){

$all_data = readData();
    foreach($all_data as $row)  {
        if ($row['username']==$data) {
            $d_data = array(               
                  'name'               =>     $row['name'],  
                  'e-mail'          =>     $row["e-mail"],  
                  'username'     =>     $row["username"],  
                  'gender'     =>     $row["gender"],  
                  'dob'     =>     $row["dob"],  
                  'binnumber'     =>     $row["binnumber"],
                  'profilepic'     =>     $row["profilepic"],
                  'phonenumber'     =>     $row["phonenumber"]
            );
        return $d_data;
        }
    }

}

?>