<?php 


include '../model/Model.php';
$error='';

  function find($username){
    
    $flag=0;
    $data =readData();
    if(empty($data))
    {
        $error="There is No data in the System";
        return $error;
    }
    else{
        foreach($data as $row)
        {
            
          if($row['username']==$username)
          {
            $error=$row['pass'];
            $flag=1;
            return $error;
            
          }
        }
        
        if($flag!=1)
        {
            $error="The Username is not Exists";
            return $error;
        }
        
    }
       
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>
 
