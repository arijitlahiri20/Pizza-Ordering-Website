<?php
    include("DBconnection.php");
    //include("session.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
       
       $name = mysqli_real_escape_string($db,$_POST['name']);
       $email = mysqli_real_escape_string($db,$_POST['email']);
       $comment = mysqli_real_escape_string($db,$_POST['comment']); 
       
       $sql = "INSERT INTO contactus(name, email, comment) VALUES ('$name','$email','$comment')";

       if ($db->query($sql) === TRUE) {
            $error = "Your Comment is Sent";
            header("location: contactUs.php");
        } 
        else {
            $error = "Error Sending Comment";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="MenuPage.css">
    <title>Contact Us</title>
    
</head>
<style>
    .icon-bar {
    position: fixed;
    top: 50%;
    right:0%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    }

    .icon-bar a {
    display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
    }

    .icon-bar a:hover {
    background-color: #000;
    }

    .youtube {
    background: #3B5998;
    color: white;
    }

    .instagram {
    background:#3B5998;
    color: white;
    }

    .facebook {
    background: #3B5998;
    color: white;
    }
    input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    }
    textarea {
    width: 100%;
    max-width: 100%;
    height:100px;
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
<body>
        <?php include 'header.php'?>
        <br><br>
        <div style="width:80%;margin:auto" align="center">
            <h1 style="color:navy;text-align:center">CONTACT US</h1><br><br>
            <div style="margin:auto">
                <div class="container">
                <form action="" method="post">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <textarea name="comment" id="comment" placeholder="Comment"></textarea>
                    <div align=center style = "color:red"><?php echo $error; ?></div> 
                    <script>
                        <?php echo $alert;?>    
                    </script>   
                    <input type="submit" value="Submit">
                </form>
                </div>
            </div>
            <br><br><br>
            <img src="Images/temp.png" alt="banner" style="width:70%;" >
            <br><br><br>
            
            <div>
                <h2>Find us Here!</h2>
                <h3>Contact Address</h3>
                <p>XYZ's Pizza
                Part Ground Floor,Survey no. 7/2/1A/2,<br>
                Pune-Satara Road Opp,<br>
                Bharti Vidyapeeth Gate, Katraj,<br>
                    Pune, Maharashtra 411046, India
                </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7569.11432981597!2d73.85056440000002!3d18.458405000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2eac724bdc8fd%3A0x20f5a4892d4b923e!2sDomino&#39;s+Pizza!5e0!3m2!1sen!2sus!4v1554510471556!5m2!1sen!2sus" width="700" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                <div class="icon-bar" style="margin:auto">       
                    <a href="https://www.facebook.com/dominospizzaindia" class="facebook"><i class="fa fa-facebook"></i></a> 
                    <a href="https://www.instagram.com/dominos_india/?hl=en" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/user/dominosindia" class="youtube"><i class="fa fa-youtube"></i></a> 
                </div>
            </div>
        </div>    
		<br><br><br><br>
		<?php include 'footer.php'?>
</body>
</html>
