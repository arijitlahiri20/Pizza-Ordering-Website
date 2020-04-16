<?php
   include("DBconnection.php");
   include("session.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $firstname = mysqli_real_escape_string($db,$_POST['FirstName']);
      $lastname = mysqli_real_escape_string($db,$_POST['LastName']);
      $email  =  mysqli_real_escape_string($db,$_POST['email']);
      
        

      $sql = "INSERT INTO users(FirstName, LastName, username, password, email) VALUES ('$firstname','$lastname','$username','$password','$email')";
        
        if ($db->query($sql) === TRUE) {
            //echo "New record created successfully";
            $_SESSION['login_user'] = $username;
         
         header("location: home.php");
        } 
        else {
            $error = "Entered details are invalid";
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

            /* Style the submit button */
            input[type=submit] {
            background-color: #f4433d;
            color: white;
            }
            input[type=reset] {
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
            content: "✔";
            }

            .invalid {
            color: red;
            }

            .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
            }
</style>
</head>
<body>
<?php include 'header.php'?>
        <br><br>


			<form  action="" method="post" name="myform">
                <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr style="border-top: 1px solid black;">
                <input type="email" placeholder="Email" name="email" required>

                <input type="text" placeholder="Username" name="username" required>

                <input type="text" placeholder="First Name" name="FirstName" required>

                <input type="text" placeholder="Last Name" name="LastName" required>

                <input type="password" placeholder="Password" name="password" id="psw" required>

                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <div align=center style = "color:#cc0000"><?php echo $error; ?></div>
                        <input type="submit" value="Sign Up" id="signup" onclick="validateForm()">
                        <input type="reset" value="Reset">
                        <p id="wrong" style="color: red; display: none;"></p>
                    </div>
                </div>
                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
             </form>
		<br>
		<?php include 'footer.php'?>
</body>
</html>
