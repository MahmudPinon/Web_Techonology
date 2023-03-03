<?php 



function providedata(){
    $data = file_get_contents("data.json");  
    $data = json_decode($data, true);
	return $data;
}


  function readData($username,$password){
    $data =providedata();
   
      foreach($data as $row)
      {

        if($row['username']==$username &&$row['pass']==$password)
        {
          return TRUE;
          
        }
      } 
  }

  function checkemail($username){
    $data =providedata();
   
      foreach($data as $row)
      {

        if($row['username']==$username)
        {
          return TRUE;
          
        }
      } 
  }


  function changepass($username,$password,$newpassword){
    $data =providedata();
   
    $index = array_search($username, array_column($data,'username'));

    $data[$index]['pass'] =$newpassword;

        $new_json_data = json_encode($data);
        file_put_contents('data.json', $new_json_data);
        return TRUE;
  }
  


  function changeprofile($prevusername,$newusername,$newname,$newemail)
  {

    $data =providedata();
   
    $index = array_search($prevusername, array_column($data,'username'));

    $data[$index]['username'] =$newusername;
    $data[$index]['name'] =$newname;
    $data[$index]['e-mail'] =$newemail;

        $new_json_data = json_encode($data);
        file_put_contents('data.json', $new_json_data);
        return TRUE;
  }






  function Checkusername($email){
    $data =providedata();
   
      foreach($data as $row)
      {

        if($row['e-mail']==$email)
        {
          return TRUE;
          
        }
      } 
  }





  function providepass($email){
    $data =providedata();
   
      foreach($data as $row)
      {

        if($row['e-mail']==$email)
        {
          return $row['pass'];
          
        }
      } 
  }

  function details($username,$password){
  $all_data = providedata();
  foreach($all_data as $row)  {
      if ($row['username']==$username && $row['pass']==$password) {
          $d_data = array(
            'name'               =>     $row['name'],  
            'email'          =>     $row["e-mail"],  
            'username'     =>     $row["username"],  
            'gender'     =>     $row["gender"],  
            'dob'     =>     $row["dob"],  
            'pass'     =>     $row["pass"]
          );
      return $d_data;
      }
  }
}


function validateUsName($userName) {
  $allowed = array(".", "-", "_");
  if(preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,}[0-9a-zA-Z]$/',$userName) && ctype_alnum( str_replace($allowed, '', $userName ) ) ) {
    return true;
  }
  return false;
}








 ?>
 <br>