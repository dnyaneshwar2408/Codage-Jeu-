<?php 

if(isset($_POST['Uid']) && 
   isset($_POST['Emailid']) && 
   isset($_POST['Pass'])){

    $con = mysqli_connect('localhost:3308', 'root', '','game1');
	// $sName = "localhost";
	// $uName = "root";
	// $pass = "";
	// $db_name = "game1";

	// try {
	// 	$conn = new PDO("mysql:host=$sName;dbname=$db_name", 
	// 					$uName, $pass);
	// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// }catch(PDOException $e){
	// echo "Connection failed : ". $e->getMessage();
	// }

    $Uid = $_POST['Uid'];
    $Emailid = $_POST['Emailid'];
    $Pass = $_POST['Pass'];

    // $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($Uid)) {
    	$em = "Full name is required";
    	// header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($Emailid)){
    	$em = "User name is required";
    	// header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($Pass)){
    	$em = "Password is required";
    	// header("Location: ../index.php?error=$em&$data");
	    exit;
    }else {

    	// hashing the password
    	// $pass = password_hash($pass, PASSWORD_DEFAULT);

    	// $sql = "INSERT INTO signupinfo (Uid, Emailid, Pass) 
    	//         VALUES(?,?,?)";
    	// $stmt = $conn->prepare($sql);
    	// $stmt->execute([$Uid, $Emailid, $Pass]);
		$sql = "INSERT INTO `signupinfo` (`Uid`, `Emailid`, `Pass`) VALUES ('$Uid', '$Emailid', '$Pass')";

// insert in database 
		$rs = mysqli_query($con, $sql);


    	header("Location: ../login.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	// header("Location: ../index.php?error=error");
	exit;
}
