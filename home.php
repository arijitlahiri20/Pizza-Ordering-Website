<?php 
include("session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="MenuPage.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Home Page</title>
</head>
<body>
		<?php include 'header.php'?>
		<br><br>
		<div class="container">
		   
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      <div class="item active">
		        <img src="Images/offer1.jpg" alt="" style="width:100%; max-height: 400px;">
		      </div>

		      <div class="item">
		        <img src="Images/offer2.jpg" alt="" style="width:100%; max-height: 400px;">
		      </div>
		    
		      <div class="item">
		        <img src="Images/offer3.jpg" alt="" style="width:100%; max-height: 400px;">
		      </div>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>

		 <br><br>

		 <?php include 'footer.php'?>
		
</body>
</html>
