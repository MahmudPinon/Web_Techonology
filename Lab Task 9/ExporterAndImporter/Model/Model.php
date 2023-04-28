<?php 

require_once 'db_connect.php';


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

function CheckRegEditExporterImporter($email,$phonenumber,$username)
{
    $conn = db_conn();
    
 
    $sql1= "SELECT * FROM registration WHERE `Email` = ? AND `User Name` !=?";
    $sql2 = "SELECT * FROM registration WHERE `Phone Number`= ? AND `User Name` !=?";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
   
   
    $stmt1->bind_param("ss",$email,$username);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("ss",$phonenumber,$usernam);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    if ($result1->num_rows > 0) {
        //ECHO "true";
        return 1;
        $conn = null;
    }
    if ($result2->num_rows > 0) {
        //ECHO "true";
        return 2;
        $conn = null;
    }

    else  
    {
        //ECHO "hELLO";
        return 0;
        $conn = null;
    }
}

function RegisteredExporterImporterEditProfile($data)
{
    $conn = db_conn();
    
    $sql = "UPDATE registration SET `Name`=?, `Email`=?, `Phone Number`=?, `Date of birth`=?, `Age`=?, `Address`=? WHERE `User Name`=?";

    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssiss",$data['name'],$data['email'],$data['phonenumber'],$data['dateofbirth'], $data['age'],$data['address'],$data['username']);
        $stmt->execute();

        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function CheckCorpName($crpname,$username)
{
    $conn = db_conn();
    
 
    $sql1= "SELECT * FROM registration WHERE `ExporterImporterCorporationName` = ? AND `User Name` !=?";
    $sql2 = "SELECT `ExporterImporterCorporationName` FROM registration WHERE  `User Name` =?";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
   
   
    $stmt1->bind_param("ss",$crpname,$username);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("s",$username);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();
    $row = $result2->fetch_assoc();
    if ($result2->num_rows ==1 && $row['ExporterImporterCorporationName']!=NULL) {
        //ECHO "true";
        return 2;
        $conn = null;
    }
    if ($result1->num_rows >1) {
        //ECHO "true";
        return 1;
        $conn = null;
    }

    else  
    {
        //ECHO "hELLO";
        return 0;
        $conn = null;
    }
}

function RegisteredExporterImportersetcorpname($data)
{
    $conn = db_conn();
    
    $sql = "UPDATE registration SET `ExporterImporterCorporationName`=? WHERE `User Name`=?";

    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$data['crpname'],$data['username']);
        $stmt->execute();

        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function TerminalNamesReturn()
{
    $conn = db_conn();
    $sql = "SELECT `TerminalName` FROM terminalnames";
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}
function CountryNamesReturn()
{
    $conn = db_conn();
    $sql = "SELECT `CountryName` FROM exportedcountry";
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}
function ProductNamesReturn()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `productname`";
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}

function getcorporationname($username)
{

    $conn = db_conn();
    $sql = "SELECT `ExporterImporterCorporationName` FROM registration WHERE  `User Name` =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute(); 
    $result = $stmt->get_result();
    if ($result->num_rows ==0) {
        //ECHO "true";
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return 1;
    }
    if($result->num_rows ==1)
    {
        try { 
            $row = $result->fetch_assoc();    
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);   
        return $row;
    }
}


function RegisteredExporterProduct($data)
{
    $conn = db_conn();
    $id = 'Exp-' . uniqid();
    $status='No';
    $sql = "INSERT INTO exportproduct (`Name`, `Weight`, `ProductType`, `ExportedTo`, `Terminal`, `Price`, `PickUpPlace`, `Rent`, `CorporationName`, `ProductId`, `ProductOwnerUserId`, `ProductStatus(Booked/Unbooked))`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssss",$data['name'],$data['weight'],$data['producttypeselect'],$data['exportedto'], $data['terminalName'],$data['prdctprice'],$data['prpickupplace'],$data['rent'],$data['corpname'],$id,$data['username'],$status);
        $stmt->execute();
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function DestrictNamesReturn()
{
    $conn = db_conn();
    $sql = "SELECT `District` FROM `destination`"; 
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}

function getrent($destination)
{
    $conn = db_conn();
    $sql = "SELECT `Rent` FROM destination WHERE  `District` =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$destination);
    $stmt->execute(); 
    $result = $stmt->get_result();
    if ($result->num_rows ==0) {
        //ECHO "true";
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return 1;
    }
    if($result->num_rows ==1)
    {
        try { 
            $row = $result->fetch_assoc();    
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);   
        return $row;
    }
}

function RegisteredImportProduct($data)
{
    $conn = db_conn();
    $id = 'Imp-' . uniqid();
    $status='No';
    $sql = "INSERT INTO importproduct (`ProductName`, `Weight`, `ProductType`, `importfrom`, `ProductPrice`, `pickupterminalName`, `Destination`, `Rent`, `CorporationName`, `ProductOwnerUserName`,`ProductId`, `ProductBookStatus`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssss",$data['name'],$data['weight'],$data['producttypeselect'],$data['import'], $data['prdctprice'],$data['pickterminalName'],$data['destination'],$data['rent'],$data['corpname'],$data['username'],$id,$status);
        $stmt->execute();
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}