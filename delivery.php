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
           header("location: delivery.php");
       } 
       else {
           $error = "Error Sending Comment";
       }
   }
   if(!empty($_GET["action"])) {
      switch($_GET["action"]) {
        case "remove":
                  $user=$_SESSION['login_user'];
                  $sql = "SELECT * FROM orders WHERE username ='$user' ";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                           $name=$row["name"];
                           $price=$row["price"];
                           $quantity=$row["quantity"];
                           $total=$row["total"];
                           $category=$row["category"];
                           $sql= "INSERT INTO order_history (username, name, price, quantity, total, category) VALUES ('$user','$name',$price,$quantity,$total,'$category')";
                        }
                        $sql2 = "DELETE FROM orders WHERE username='$user'";

                        if ($db->query($sql2) === TRUE) {
                           //echo "Record deleted successfully";
                        } else {
                           //echo "Error deleting record: " . $conn->error;
                        }
                     }

                     
        break;
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
     select{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      }
    .saving {
      font-size: 40px;
      }

      .saving span {
      font-size: 50px;
      animation-name: blink;
      animation-duration: 1.4s;
      animation-iteration-count: infinite;
      animation-fill-mode: both;
      }

      .saving span:nth-child(2) {
      animation-delay: .2s;
      }

      .saving span:nth-child(3) {
      animation-delay: .4s;
      }
      .saving span:nth-child(4) {
      animation-delay: .6s;
      }
      .saving span:nth-child(5) {
      animation-delay: .8s;
      }

      @keyframes blink {
      0% {
         opacity: .2;
      }
      20% {
         opacity: 1;
      }
      100% {
         opacity: .2;
      }
      }
</style>
</head>
<body>
      <?php include 'header.php'?>
        <br><br>
        <div style="width:80%;margin:auto" align="center">
        <p class="saving">Your Order is being Made <span>.</span><span>.</span><span>.</span><span>.</span><span>.</span></p>
        <br><br>
        <img src="Images/making.jpg" alt="banner" style="width:70%;" >
        <br><br><br><br>
        <h2>Feedback Form</h2><br>
        <div style="margin:auto">
                <div class="container">
                <form action="" method="post">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <!--<label for="country">Rating</label>
                     <select id="rating" name="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                     </select>-->
                    <textarea name="comment" id="comment" placeholder="Comment"></textarea>
                    <div align=center style = "color:red"><?php echo $error; ?></div>   
                    <input type="submit" value="Submit">
                </form>
                </div>
            </div>

		<br>
      </div>
		<?php include 'footer.php'?>
</body>
</html>
