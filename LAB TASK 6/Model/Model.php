<?php 

require_once 'db_connect.php';

function addRegisterMember($data){
	$conn = db_conn();
    
    $sql = "INSERT INTO registration (`Name`, `User Name`, `Email`, `password`, `Business identification Number`, `Phone number`, `Date of birth`, `Age`, `Address`, `User type`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
   

    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssiss",$data['name'],$data['username'],$data['email'],$data['password'], $data['binnumber'],$data['phonenumber'],$data['dateofbirth'],$data['age'],$data['address'],$data['usertype']);
        $stmt->execute();

        echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function verifyLoginData($username, $password)
{
    $conn = db_conn();
    
    $sql = "SELECT * FROM registration WHERE `User Name` = ?";
    $stmt = $conn->prepare($sql);
   
    $stmt->bind_param("s",$username);
    $stmt->execute(); 
    $result = $stmt->get_result();
    // $row = $result->fetch_assoc();
    // $hashed_password = $row["password"];
    // ECHO $hashed_password;
    // if(password_verify($password, $hashed_password))
    // {
        
    //     // ECHO "hERE TRUE";
    //     return TRUE;
    // }
    // else
    // {
        
    //     // ECHO "hERE FALSE";
    //     return FALSE;
    // }


    //##Other Oprion(I have Applied)
    if ($result->num_rows > 0) {
        //ECHO "true";
        return TRUE;
        $conn = null;
    }
    else  
    {
        //ECHO "hELLO";
        return FALSE;
        $conn = null;
    }
}

function providename($username)
{
    $conn = db_conn();
    
    $sql = "SELECT * FROM registration WHERE `User Name` = ?";
    $stmt = $conn->prepare($sql);
   
    $stmt->bind_param("s",$username);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $registeredusername = $row["Name"];
    return $registeredusername;
    $conn = null;
}

// function updateStudent($id, $data){
//     $conn = db_conn();
//     $selectQuery = "UPDATE user_info set Name = ?, Surname = ?, Username = ? where ID = ?";
//     try{
//         $stmt = $conn->prepare($selectQuery);
//         $stmt->execute([
//         	$data['name'], $data['surname'], $data['username'], $id
//         ]);
//     }catch(PDOException $e){
//         echo $e->getMessage();
//     }
    
//     $conn = null;
//     return true;
// }
function UpdateRegisterMember($username,$data)
{
    $conn = db_conn();
    if(!empty($data['image']))
    {
        $sql = "UPDATE registration SET `Name`=?, `Email`=?, `Phone number`=?, `Date of birth`=?, `Age`=?, `Address`=?, `Profile picture`=? WHERE `User Name`=?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssisss', $data['name'], $data['email'], $data['phonenumber'], $data['dateofbirth'], $data['age'], $data['address'], $data['image'], $username);
            
            $stmt->execute(); 
        }catch(mysqli_sql_exception $e){
            echo $e->getMessage();
        }
        
        mysqli_close($conn);
        return true;
    }
    else 
    {
        $sql = "UPDATE registration SET `Name`=?, `Email`=?, `Phone number`=?, `Date of birth`=?, `Age`=?, `Address`=? WHERE `User Name`=?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssiss', $data['name'], $data['email'], $data['phonenumber'], $data['dateofbirth'], $data['age'], $data['address'], $username);
            $stmt->execute(); 
        }catch(mysqli_sql_exception $e){
            echo $e->getMessage();
        }
        
        mysqli_close($conn);
        return true;
    }
    
}

// function deleteStudent($id){
// 	$conn = db_conn();
//     $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
//     try{
//         $stmt = $conn->prepare($selectQuery);
//         $stmt->execute([$id]);
//     }catch(PDOException $e){
//         echo $e->getMessage();
//     }
//     $conn = null;

//     return true;
// }

function provideindividualinfo($username){
	$conn = db_conn();
    $sql = "SELECT * FROM `registration` where `User Name` = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute(); 
        $result = $stmt->get_result();
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $row = $result->fetch_assoc();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $row;
}


function Changepassword($username,$data)
{
    $conn = db_conn();
    $sql = "UPDATE registration SET `password`=?  WHERE `User Name`=?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $data['password'], $username);
            $stmt->execute(); 
        }catch(mysqli_sql_exception $e){
            echo $e->getMessage();
        }
        
        mysqli_close($conn);
        return true;
}

