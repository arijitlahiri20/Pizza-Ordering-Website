<?php
   include("DBconnection.php");
   include("session.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $username = $_SESSION['login_user'];
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "UPDATE users SET password ='$password'  WHERE username='$username';";
      if (mysqli_query($db, $sql)) {
        echo "Record updated successfully";
        header("location: user.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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
</style>
</head>
<body>
<?php include 'header.php'?>
		<br><br>


   			<br><br>
			<div class="container">
			<form action="" method="post">
                <label for="usrname">New Password</label>
                <input type="password" id="password" name="password" required>

                <label for="psw">Retype Password</label>
                <input type="password" id="repassword" name="repassword"  required>

                <div class="clearfix">
                    <input type="submit" value="Submit" id="signup" onclick="check()">
                    <p id="wrong" style="color: red; display: none;"></p>
                </div>
			</form>
            </div>
            
						
			
		<br>
		<br><br>

		 <?php include 'footer.php'?>
</body>
</html>
