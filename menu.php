<? 
include("session.php")


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="MenuPage.css">
	<title>Menu Page</title>
</head>
<body>
	<div class="heading" align="center"><strong>Online Pizza Ordering</strong></div>
		<header id="myHeader">
			
			<div class="logo"><img id="logo" src="logo2.jpg" alt="Logo" height="120" width="120"></div>
			<div class="navbar">
				<ul>
	  			 <li><a href="home.php">Home</a></li>
	  			 <li><a class="active" href="menu2.html">Our Menu</a></li>
	  			 <li><a href="ContactUs.html">Contact Us</a></li>
	  			 <li><a href="AboutUs.html">About Us</a></li>
	  			 <li><a href="MenuPage.xml">Pizza Inventory</a></li>
                   <button class="login_button" type="button" style="float: right;" id="LoginButton">
                   <?php if($login_session){ echo 'LOGOUT'; } else {echo 'LOGIN';} ?>
                </button>
	  			 <button class="checkout_button" type="button" style="float: right;" id="myButton">
	  			 	<img src="shopping-cart.png" alt="Logo" height="30" width="30"></button>
	  			 <script type="text/javascript">
	    			document.getElementById("myButton").onclick = function () {
	        			location.href = "CheckoutPage.html";
	    			};
	    			document.getElementById("LoginButton").onclick = function () {
	        			location.href = "login.php";
	    			};

	    			window.onscroll = function() {myFunction()};

					var header = document.getElementById("myHeader");
					var sticky = header.offsetTop;

					function myFunction() {
					  if (window.pageYOffset > sticky) {
					    header.classList.add("sticky");
					  } else {
					    header.classList.remove("sticky");
					  }
					}
				</script>	
				</ul>		
		</div>
		</header>

		<div class="menu">
				<div class="veg" align="center" >
					<h3 align="center">VEG</h3>
					<div class="veg-grid">
					<div class="w3-card-4" >
                		<img src="margherita.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Margherita</p>
    					</div>
    				</div>
    				<div class="w3-card-4">
                		<img src="onion_and_capsicum.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Onion and Capsicum</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="onion_and_capsicum.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 3</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="margherita.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 4</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="onion_and_capsicum.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 5</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="margherita.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 6</p>
    					</div>
    				</div>
    				</div>
    			</div>
  				<div class="non_veg" align="center">
  					<h3 align="center">NON-VEG</h3>
  					<div class="non-veg-grid">
  					<div class="w3-card-4">
                		<img src="pepperoni.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pepperoni</p>
    					</div>
  					</div>
  					<div class="w3-card-4">
                		<img src="PepperBarbecueChicken.jpg" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Barbeque Chicken</p>
    					</div>
  					</div>
  					<div class="w3-card-4" >
                		<img src="Chicken_Sausage.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Chicken Sausage</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="PepperBarbecueChicken.jpg" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 4</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="Chicken_Sausage.png" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 5</p>
    					</div>
    				</div>
    				<div class="w3-card-4" >
                		<img src="PepperBarbecueChicken.jpg" alt="pizza" height="200" width="200">
    					<div class="w3-container w3-center">
      			 			<p>Pizza 6</p>
    					</div>
    				</div>
  					</div>
  				</div>
		</div>
		<footer>
			<div class="footerCell">
				<p>Get to Know Us</p>
				<ul>
					<li><a href="HomePage.html">Home</a></li>
					<li><a href="MenuPage.html">Our Menu</a></li>
					<li><a href="ContactUs.html">Contact Us</a></li>
					<li><a href="AboutUs.html">About Us</a></li>
				</ul>
			</div>
			<div class="footerCell">
				<p>Connect with Us</p>
				<ul>
					<li><a href="#">Facebook</a></li>
					<li><a href="#">Instagram</a></li>
					<li><a href="#">Twitter</a></li>
				</ul>
			</div>
		</footer>
</body>
</html>
