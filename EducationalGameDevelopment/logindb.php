<?php 
// session_start();

if(isset($_POST['Uid1']) && isset($_POST['Pass1'])){

      $sName = "localhost:3308";
      $uName = "root";
      $pass = "";
      $db_name = "game1";
      
      try {
          $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                          $uName, $pass);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        echo "Connection failed : ". $e->getMessage();
      }
    $Uid1 = $_POST['Uid1'];
    $Pass1 = $_POST['Pass1'];

      
    if(empty($Uid1)){
    	$em = "User Id is required";
    	header("Location: ../login.php?error=$em");
	    exit;
    }else if(empty($Pass1)){
    	$em = "Password is required";
    	header("Location: ../login.php?error=$em");
	    exit;
    }else {

    	$sql = "SELECT * FROM signupinfo WHERE Uid = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$Uid1]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $Uid =  $user['Uid'];
          $Pass =  $user['Pass'];
        
          if($Uid1 == $Uid){
             if($Pass1==$Pass){
               

                 header("Location: http://localhost:54251/");
                 exit;
             }else {
               $em = "Incorect Password";
               header("Location: ../login.php?error=$em");
               exit;
            }

          }else {
            $em = "Incorect User name";
            header("Location: ../login.php?error=$em");
            exit;
         }

      }else {
         $em = "Incorect User name or password";
         header("Location: ../login.php?error=$em");
         exit;
      }
    }


}else {
	header("Location: ../login.php?error=error");
	exit;
}
