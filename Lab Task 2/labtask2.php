<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =$dobErr =$bloddgrpErr=$degree= "";
$name = $email = $gender =$dob=$bloddgrp=$degreeErr="";


$start_date = '1953-06-17';
$end_date = '1988-09-05';

$a=0;
$arr = array();
function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function check_in_range($start_date, $end_date, $date_from_user)
{
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }

    if (str_starts_with($name, ' ')) {
      $nameErr="Name Can not start with Space";
  }
    // else if(startsWith($name," "))
    // {
    //     $nameErr = "Name can not start with space";
    // }
  }



  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

    
  if (empty($_POST["gender"])) {
    $genderErr = "Must be Selected One";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["birthday"])) {
    $dobErr = "Must be Selected One";
  }
   else {
    $dob = test_input($_POST["birthday"]);
    {
        $userdate=date("Y-m-d", strtotime($dob));
        if(!check_in_range($start_date, $end_date, $userdate))
        {
          $dobErr = "Invalid date of Birth";
        }
    }
  }

  if (empty($_POST["bldgroup"])) {
    $bloddgrpErr = "Must be Selected One";
  } else {
    $bloddgrp= test_input($_POST["bldgroup"]);
  }


 
  $checkedBoxes = 0;
  $counter = 0;

  if (!empty($_POST["degree"]))
  {
    $checked_arr = $_POST['degree'];
    $count = count($checked_arr);
    if($count<2)
    {
      $degreeErr="Must be Selected Two ";
    }
    if($count>2 || $count==2)
     {
     foreach($_POST['degree'] as $val)
         {
          $arr[$a]="$val";
          $a++;
         }
     }
  }
  else if (empty($_POST["degree"]))
  {
    $degreeErr="Must be Selected  ";
  }


  
}
//((test_input($_POST["birthday"]>$date2)) && (test_input($_POST["birthday"]<$date1)))
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>


  Birthday:
  <input type="date" value="birthday" name="birthday">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>

  Blood Group:  
  <select name="bldgroup" id="bldgroup">
  <span class="error">* <?php echo $bloddgrpErr;?></span>
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
</select>
<br><br>

 Complete Degree:<br>
 <span class="error">* <?php echo $degreeErr;?></span><br>
  <input type="checkbox"  name="degree[]" value="SSC">
  <label for="degree1">SSC</label><br>
  <input type="checkbox"  name="degree[]" value="HSC">
  <label for="degree2"> HSC</label><br>
  <input type="checkbox"  name="degree[]" value="BSC">
  <label for="degree3"> BSC</label><br>
  <input type="checkbox"  name="degree[]" value="MSC">
  <label for="degree4">MSC</label><br>
  <input type="checkbox"  name="degree[]" value="BBA">
  <label for="degree5"> BBA</label><br>
  <input type="checkbox"  name="degree[]" value="MBA">
  <label for="degree6"> MBA</label><br>
  <input type="checkbox"  name="degree[]" value="LLB">
  <label for="degree7"> LLB</label><br>
  <input type="checkbox"  name="degree[]" value="LIB">
  <label for="degree8"> LIB</label><br><br>


  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
echo $bloddgrp;
echo "<br>";
for($i = 0; $i <count($arr); $i++) {

  echo $arr[$i];
  echo "<br>";

}



?>

</body>
</html>