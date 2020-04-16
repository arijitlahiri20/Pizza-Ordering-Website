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
?>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="MenuPage.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <title>Menu Page</title>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getPizza.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<style>
        table {
            width: auto;
            border-collapse: collapse;
        }
        
        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }
        
        th,td {text-align: center;}

        .menu2{
            display: flex;
            padding: 10px;
                
            }
        .pizza{
            float: left;
            margin: auto;
            min-width: 80%;
            max-width: 80%;
            padding-left: 10px;
            padding-right: 10px;
        }
        .pizza-grid{
            display: grid;
            grid-gap: 20px;
            grid-template-columns: auto auto auto;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 300px;
            max-width:300px;
            height:500px;
            margin: auto;
            text-align: center;
            font-family: arial;
            border-radius: 25px;
            }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card input {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            font-weight: bold;
            background-color: red;
            text-align: center;
            cursor: pointer;
            width: 80%;
            font-size: 18px;
            border-radius: 25px;
        }

        .card input:hover {
            opacity: 0.7;
        }
        </style>
</head>
<body>

        <?php include 'header.php'?>
        <br><br>
        <!--<div align="center" style="margin-top: 100px;margin-bottom: 100px;">
            <form>
            <select name="users" onchange="showUser(this.value)">
            <option value="">Select a Pizza:</option>
            <option value="1">Barbeque Chicken</option>
            <option value="2">Chicken Sausage</option>
            <option value="3">Margherita</option>
            <option value="4">Onion and Capsicum</option>
            <option value="5">Paneer Tikka</option>
            <option value="6">Pepperoni</option>

            </select>
            </form>
            <br>
            <div id="txtHint"><b>Pizza info will be listed here...</b></div>
        </div>-->

        <!-- 
            <div class="card">
  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
  <p><button>Add to Cart</button></p>
</div>
        -->

        <div class="menu">
            <div class="pizza">
                <div class="pizza-grid">    
                    <?php 
                            $sql = "SELECT * FROM pizza";
                            $result = mysqli_query($db, $sql);
                            if($_SESSION['login_user']){
                               $disable="";
                            }
                            else{
                               $disable="disabled";
                            }
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='card'>"
                                    ."<h3><b>".$row["name"]."</b></h3>"
                                    ."<img src='Images/". $row["src"]."' alt='Denim Jeans' style='width:270px;height:270px;border-radius: 10%'>"
                                    ."<p >₹".$row["price"] ."</p>"
                                    ."<p style='font: 13px/13px arial;padding: 5px 0 0;'>".$row["description"] ."</p>"
                                    ."<form action='' method='post'>"
                                    ."<input type='hidden' name='name' value='".$row["name"]."'>"
                                    ."<input type='hidden' name='price' value='".$row["price"]."'>"
                                    ."<input type='hidden' name='category' value='".$row["category"]."'>"
                                    ."<p><input class='mybutton' type='submit' value='Add to Cart'".$disable ."></p>"
                                    ."</form>"
                                    ."</div>";
                                }
                            } else {
                                echo "0 results";
                            }
                        
                    ?>
                </div>
            </div>
         </div>
         <br><br> 
         
         <script type="text/javascript">
                 $("form").on('submit', function(e) {
                    <?php if($_SESSION['login_user']){ ?>
                        alert("Logged In");
                    <?php }else{ ?> 
                        e.preventDefault();
                        alert("Login Required");
                    <?php } ?>    
                });
        </script>

         <?php include 'footer.php'?>

</body>
</html>