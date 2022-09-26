<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup page </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body>
    <div class ="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div> 
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="fb.png">
                <img src="tw.png">
                <img src="gg.png">
            </div>
            <form id="login" class="input-group" method="post" action="logindb.php">
                <input type="text" name="Uid1" class="input-field" placeholder="User Id" required>
                <input type="password" name="Pass1" class="input-field" placeholder="Enter Password" required>
                <!-- <input type="checkbox" class="check-box"><span>Remember Password</span> -->
                <?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <form id="register" class="input-group" method="post" action="signup.php">
                <input type="text" class="input-field" name="Uid" value="<?php echo (isset($_GET['Uid']))?$_GET['Uid']:"" ?>"  placeholder="User Id" required>
                <input type="text" class="input-field" name="Emailid" value="<?php echo (isset($_GET['Emailid']))?$_GET['Emailid']:"" ?>" placeholder="Email Id" required>
                <input type="password" class="input-field" name="Pass" value="<?php echo (isset($_GET['Pass']))?$_GET['Pass']:"" ?>" placeholder="Enter Password" required>
                <!-- <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span> -->
                <?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script>
      var x = document.getElementById("login");
      var y = document.getElementById("register"); 
      var z = document.getElementById("btn");
      login();
      function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
      }

      function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
      }
    </script>
</body>
</html>
