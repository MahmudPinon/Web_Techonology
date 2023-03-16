<?php 


include '../model/Model.php';
  function verifyData($username,$password){
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
            return TRUE;
            
          }
        }
    }
       
  }
 ?>
 
