<?php  
require_once '../Controller/AllController.php';
session_start();


if (isset($_SESSION['uname'])) {
	$student = fetchPerson($_SESSION['uname']);
	
	}else{
	header("location:login.php");
}
?>

<!DOCTYPE html>

<html>
<head>
    <title >View Profile</title>
</head>
<body>
    
    <h3 style="text-align:center;">Profile</h3>

    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="240" >Name</th>
            <th width="150">Email</th>
            <th width="150">Business identification Number</th>
            <th width="150">Phone number</th>
            <th width="300">Profile Picture</th>
			<th width="200">Date of birth(Year-Day-Month)</th>
            <th width="150">Age</th>
            <th width="150">Address</th>
            <th width="150">User type</th>
			<th width="100">Edit Profile</th>
        </tr>
        <tr bgcolor="lightgrey" align="center">
		<td><a href="ViewProfile.php?id=<?php echo $student['Serial Number'] ?>"><?php echo $student['Name'] ?></a></td>
		<td><?php echo $student['Email'] ?></td>
		<td><?php echo $student['Business identification Number'] ?></td>
		<td><?php echo $student['Phone number'] ?></td>
		<td><img width="100px" src="../Uploads/<?php echo $student['Profile picture'] ?>" alt="<?php echo $student['Name'] ?>"></td>
		<td><?php echo $student["Date of birth"] ?></td>
		<td><?php echo $student['Age'] ?></td>
		<td><?php echo $student['Address'] ?></td>
		<td><?php echo $student['User type'] ?></td>
		<td><a href="EditProfile.php?id=<?php echo $student['Serial Number'] ?>">Edit</a></td>
        </tr>
    </table>
    
</body>
</html>