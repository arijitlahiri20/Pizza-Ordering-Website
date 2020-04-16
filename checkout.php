<?php 
include("session.php");
include("DBconnection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $username = $_SESSION['login_user'];
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
    $category = mysqli_real_escape_string($db,$_POST['category']);
    
    $sql = "SELECT * FROM orders WHERE username = '$username' and name = '$name'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
     $total = $row["price"]*$row["quantity"]; 
    if($count == 1) {
       //session_register("myusername");
        $sql= "UPDATE orders SET quantity = quantity + 1, total= total + price WHERE username = '$username' AND name = '$name'";
        $db->query($sql) ; 
        //header("location: menu2.php");

    }else {
        $sql= "INSERT INTO orders (username, name, price, quantity, total, category) VALUES ('$username','$name',$price,1,$price*1,'$category')";
        $db->query($sql) ;   
        //header("location: menu2.php");
    }
 }

 if(!empty($_GET["action"])) {
  switch($_GET["action"]) {
    case "add":
          $name=$_GET["name"];
          $user=$_GET["username"];
          $sql= "UPDATE orders SET quantity = quantity + 1, total= total + price WHERE username = '$user' AND name = '$name'";
          if ($db->query($sql) === TRUE) {
            //echo "Record Updated successfully";
          } else {
             // echo "Error Updating record: " . $conn->error;
          } 
    break;
    case "remove":
          $name=$_GET["name"];
          $user=$_GET["username"];
          $sql = "DELETE FROM orders WHERE name='$name' AND username='$user'";

          if ($db->query($sql) === TRUE) {
              //echo "Record deleted successfully";
          } else {
              //echo "Error deleting record: " . $conn->error;
          }
      
    break;
    case "sub":
        $name=$_GET["name"];
        $user=$_GET["username"];
        $quantity=$_GET["quantity"];
        $sql= "UPDATE orders SET quantity = quantity - 1, total= total - price WHERE username = '$user' AND name = '$name'";
         if($quantity>0) {
          if ($db->query($sql) === TRUE) {
            //echo "Record Updated successfully";
          } else {
              //echo "Error Updating record: " . $conn->error;
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
	<link rel="stylesheet" type="text/css" href="CheckoutPage.css">
  <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<title>Menu Page</title>
</head>
<body>
<?php include 'header.php'?>
        <br><br>

    <div class="shopping-cart">
      <!-- Title -->
      <div class="title">
        Order Cart
      </div>

      <!-- Product #1 -->
      <!--<div class="item">
        <div class="buttons">
          <span class="delete-btn"></span>
          <span class="like-btn"></span>
        </div>

        <div class="image">
          <img src="Images/pepperoni.png" alt="" height="80" width="80"/>
        </div>

        <div class="description">
          <span>Pepperoni</span>
          <span></span>
          <span>Non-veg</span>
        </div>

        <div class="quantity">
          <button class="plus-btn" type="button" name="button">
            <img src="Images/plus.svg" alt="" />
          </button>
          <input type="text" name="name" value="1">
          <button class="minus-btn" type="button" name="button">
            <img src="Images/minus.svg" alt="" />
          </button>
        </div>

        <div class="total-price">₹<p id="price"></p></div>
      </div>-->
          <?php 
                $user=$_SESSION['login_user'];
                $sql = "SELECT * FROM orders WHERE username ='$user' ";
                $result = mysqli_query($db, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      $pizza=$row["name"];
                      $sql2 = "SELECT * FROM pizza WHERE name ='$pizza' ";
                      $result2 = mysqli_query($db, $sql2);
                      $row2=mysqli_fetch_row($result2);
                        echo '<div class="item">'
                        .'<div class="buttons">
                        <a href="checkout.php?action=remove&name='.$row["name"] .'&username='.$row["username"].'">
                        <span class="delete-btn"></span></a></div>'
                        .'<div class="image"><img src="Images/'.$row2[6].'" alt="" height="80" width="80"/></div>'
                        .'<div class="description"><span>'.$row["name"].'</span><span>'.$row2[4].'</span></div>'
                        .'<div class="quantity">'
                        .'<div class="buttons2">
                        <a href="checkout.php?action=add&name='.$row["name"] .'&username='.$row["username"].'&quantity='.$row["quantity"].'">
                        <span class="plus-btn"></span></a></div>'
                        .'<input type="text" name="name" value="'.$row["quantity"].'">'
                        .'<div class="buttons2">
                        <a href="checkout.php?action=sub&name='.$row["name"] .'&username='.$row["username"].'&quantity='.$row["quantity"].'">
                        <span class="minus-btn"></span></a></div>'
                        .'</div>'
                        .'<div class="total-price">₹'.$row["total"].'</div>'
                        .'</div>';
                        
                    }
                    $sql3 = "SELECT SUM(total) as sum FROM orders WHERE username ='$user' ";
                    $result3 = mysqli_query($db, $sql3);
                    $row3=mysqli_fetch_row($result3);
                    if (mysqli_num_rows($result3) > 0) {
                            echo '<div class="item" style="height: 80px;">
                                    <div class="total-bill" style="margin-left:auto; margin-right:50px;font-size: 20px;">BILL TOTAL : ₹'.
                                    $row3[0].'</div>
                                    </div> 
                                    </div>
                                    <div align="center" style="margin-bottom:100px;">
                                    <input class="pay" type="submit" value="PAY NOW">
                                    </div>';
                    }
                } else {
                    echo '<div class="image" align="center" style="padding-top:100px;padding-bottom:100px;">
                    <img src="Images/cartEmpty.jpg" alt="" height="250" width="250"/>
                    </div>
                    </div><br><br><br>';
                }
         
            
            
        ?>
      <!--<div class="item" style="height: 80px;">
        <div class="total-bill" style="margin-left:auto; margin-right:50px;font-size: 20px;">BILL TOTAL : ₹1000</div>
      </div>      
    </div>-->
    <!--</div>
     <div align="center" style="margin-bottom:100px;">
        <input type="submit" value="PAY NOW">
     </div>  -->   
      
    <script type="text/javascript">
      $('.minus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value > 1) {
    			value = value - 1;
    		} else {
    			value = 0;
    		}

        $input.val(value);

    	});

    	$('.plus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value =100;
    		}

    		$input.val(value);
      });
      
      $('.pay').on('click', function(e) {
    		location.href = "delivery.php?action=remove";
    	});

      
    </script>
		
		<?php include 'footer.php'?>
</body>
</html>
