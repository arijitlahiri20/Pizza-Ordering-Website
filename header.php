<?php
include("session.php");
?>
<div class="heading" align="center"><strong>Online Pizza Ordering</strong></div>
		<header id="myHeader">
            <div class="logo"><img id="logo" src="Images/logo2.jpg" alt="Logo" height="120" width="120"></div>
			<div class="navbar">
				<ul>
	  			 <li><a class="<?php echo ($_SERVER['PHP_SELF'] == "/wtl_miniproject/home.php" ? "active" : "");?>" href="home.php"  style=" text-decoration: none;">Home</a></li>
	  			 <li><a class="<?php echo ($_SERVER['PHP_SELF'] == "/wtl_miniproject/menu2.php" ? "active" : "");?>"href="menu2.php"  style=" text-decoration: none;">Our Menu</a></li>
	  			 <li><a class="<?php echo ($_SERVER['PHP_SELF'] == "/wtl_miniproject/contactUs.php" ? "active" : "");?>"href="contactUs.php"  style=" text-decoration: none;">Contact Us</a></li>
	  			 <li><a class="<?php echo ($_SERVER['PHP_SELF'] == "/wtl_miniproject/aboutUs.php" ? "active" : "");?>"href="aboutUs.php"  style=" text-decoration: none;">About Us</a></li>
	  			 <li><a class="<?php echo ($_SERVER['PHP_SELF'] == "/wtl_miniproject/tnc.php" ? "active" : "");?>"href="tnc.php"  style=" text-decoration: none;">Terms and Conditions</a></li>
                   <?php if($_SESSION['login_user']){ ?>
                    <li style="float: right;"><a class="link" href="logout.php"  style=" text-decoration: none;">Logout</a></li>
                    <?php }else{ ?>
                        <li style="float: right;"><a class="link" href="login.php" style=" text-decoration: none;">
                        <span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } ?>
	  			 <button class="checkout_button" type="button" style="float: right;margin-top:7px;" id="myButton">
                       <img src="Images/shopping-cart.png" alt="Logo" height="30" width="30"></button>
                       
                       <?php if($_SESSION['login_user'])
                       { echo '<li style="float: right;"><a class="link" href="user.php" style=" text-decoration: none;">'
                       .'Welcome '.$_SESSION['login_user'].'</a></li> '; 
                       } ?>
                       
	  			 <script type="text/javascript">
	    			document.getElementById("myButton").onclick = function () {
                        <?php if($_SESSION['login_user']){ ?>
                            location.href = "checkout.php";
                            <?php }
                        else{ ?>
                            alert("Login Required");
                        <?php } ?>

	        			
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
            function check(){
						var myInput = document.getElementById("psw").value;
						var myInput2 = document.getElementById("psw-repeat").value;
							
						 if(myInput=="" || myInput2=="" ){
							document.getElementById("wrong").style.display = "block";
							document.getElementById("wrong").innerHTML = "* Please Enter Password";
              event.preventDefault();
						}
						else if(myInput!=myInput2){
							document.getElementById("wrong").style.display = "block";
							document.getElementById("wrong").innerHTML = "* Passwords don't match"
              event.preventDefault();
						}
						else{	
                document.myform.submit();
						}
						
					}
					function hasNumber(myString) {
							return /\d/.test(myString);
					}

					function validateForm(){
						var email = document.forms["myform"]["email"].value;
						var username = document.forms["myform"]["username"].value;
						var firstname = document.forms["myform"]["FirstName"].value;
						var lastname = document.forms["myform"]["LastName"].value;
						var psw = document.forms["myform"]["psw"].value;
						var psw_repeat = document.forms["myform"]["psw-repeat"].value;
						var check = true;

						
						var alertMessage = "Invalid Input:\n";
						if(psw.length<8){
								check = false;
								alertMessage += " - Password must be atleast 8 characters.\n";
						}
						if(hasNumber(firstname)|| hasNumber(lastname)){
								check = false;
								alertMessage += " - Name cannot contain numbers.\n";
						}
						if(!(/^(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/.test(psw))){
							check = false;
							alertMessage += " - Password must be minimum 8 characters and maximum 16 characters, one lowercase letter, one number and one special character.\n";
						}
						if(psw != psw_repeat){
								check = false;
								alertMessage += " - Passwords must match.\n";
						}
						if(!check){
							alert(alertMessage);							
							event.preventDefault();                
						}
						else{
							document.myform.submit();
						}
				}

				</script>	
				</ul>
		</div>
     </header>
