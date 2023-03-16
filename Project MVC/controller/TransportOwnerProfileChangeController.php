<?php 


include '../model/Model.php';
  function verifyusernameandpass($username,$password){
    $data =readData();
    if(empty($data))
    {
        return FALSE;
    }
    else{
        foreach($data as $row)
        {
  
          if($row['username']==$username &&$row['pass']==$password)
          {
            //echo "Found";
            return TRUE;
            
          }
        }
    }
       
  }


  function changepass($username,$password,$newpassword){
    $data =readData();
   
    $index = array_search($username, array_column($data,'username'));

    $data[$index]['pass'] =$newpassword;
    
        $new_json_data = json_encode($data);
        if(file_put_contents('../data/data.json', $new_json_data))
        {
            return TRUE;
            header("location:../View/TransportOwner_ChangePassword.php");
        }
       
  }











  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>
 
