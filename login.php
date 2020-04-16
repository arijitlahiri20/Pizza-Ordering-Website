<?php
   include("DBconnection.php");
   //include("session.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $username;
         
         header("location: home.php");
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>


<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="MenuPage.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<title>Menu Page</title>
<style>
    input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    }

    input[type=submit] {
    background-color: #f4433d;
    color: white;
    }

    .container {
    background-color: #f1f1f1;
    padding: 20px;
    max-width: 400px;
    margin: auto;

    }

    #message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
    max-width: 400px;
    margin: auto;
    }

    #message p {
    padding: 10px 35px;
    font-size: 18px;
    }

    .valid {
    color: green;
    }

    .valid:before {
    position: relative;
    left: -35px;
    content: "";
    }

    .invalid {
    color: red;
    }

    .invalid:before {
    position: relative;
    left: -35px;
    content: "x";
    }
    input[type=reset] {
            background-color: #f4433d;
            color: white;
            }
            
</style>
</head>
<body>
      <?php include 'header.php'?>
        <br><br>

			<div class="container">
			<form action="" method="post">
                <label for="usrname">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="psw">Password</label>
                <input type="password" id="psw" name="password"  required>

                <div align=center style = "color:#cc0000"><?php echo $error; ?></div>    

                <input type="submit" value="Login">
                <input type="reset" value="Reset">
                <p align="center">New User <a href="signup.php">Sign Up?</a></p>
			</form>
            </div>
            

			<div id="message">
			<h3>Password must contain the following:</h3>
			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			<p id="number" class="invalid">A <b>number</b></p>
			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>
						
			
		<br>
		<?php include 'footer.php'?>
</body>
</html>
