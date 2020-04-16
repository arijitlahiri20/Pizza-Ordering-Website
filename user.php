<?php 
include("session.php");
include('DBconnection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM users WHERE username = '$user_check' ");

   if (!$ses_sql) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
   }
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="MenuPage.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .title {
    color: grey;
    font-size: 18px;
  }

  p button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: red;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  a i {
    text-decoration: none;
    font-size: 22px;
    color: black;
  }

  button:hover, a:hover {
    opacity: 0.7;
  }
</style>
</head>
<body>
		<?php include 'header.php' ?>
		<br><br><br><br><br>
		<div class="card">
            <img src="Images/dummy.jpg" style="width:100%">
            <h1><?php if($_SESSION['login_user']){ echo $_SESSION['login_user']; } ?></h1>
            <p class="title"><?php echo $row['FirstName']." ".$row['LastName']; ?> </p>
            <p class="title"><?php echo $row['email'] ?> </p>
   
            <p><button onclick="location.href='changePassword.php' ">Change Password</button></p>
        </div>
        <br><br><br><br><br>            

				<?php include 'footer.php'?>
</body>
</html>
