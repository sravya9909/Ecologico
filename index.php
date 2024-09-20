<?php


session_start();

 $db = mysqli_connect('localhost', 'root', '', 'ecologico');


$output = ' ';

 if(isset($_POST['box'])) {

 	$searchq = $_POST['box'];
 	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

 	$query =  mysqli_query("SELECT * FROM search WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%' ") or die("Could not search..!!");
 	$count = mysql_num_rows($query);
 	if($count == 0) {
 		$output = 'No search results found..!!';
	}
	else{
			while($row = mysql_fetch_array($query)){
				$fname = $row['firstname'];
				$lname = $row['lastname'];
				$id = $row['id'];


				$output = '<div> ' .$fname.' ' .$lname.'</div>';
			}
	}



 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ecologico | Home</title>
	<link rel="icon" href="icon.png" type="image/png">
</head>

<link rel="stylesheet" href="Homepage-EcoLogico.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<body>

	<div class="part_1">

		<div id="logo">
		<a href="#"><img src="ecologo.png"<i style="position: relative; height: 60px; width: 200px; margin-left: 4em; margin-top: 0.3em;"</i></a>	
		</div>

		<form action="index.php" method="post">
			<input type="text" name="box" placeholder="Search for products and more" class="search_text">
			<button type="button" name="search" value="button" class="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>

		<?php
			print("$output");
		?>
		
	</div>


	<ul class="home_list">
        <li class="cool-link BC"><a href="Homepage-EcoLogico.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <li class="cool-link BC"><a href="cart.php">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>  <span id="cart-item" class="badge badge-danger"></span></a></li>
        <li class="cool-link BC"><a href="#">Profile &#9662;</a>
            <ul class="dropdown">
            	<li class="common cool-link"><a href="#"><i style="color: #b3b3b3;" class="fa fa-user" aria-hidden="true"></i>  My Profile</a></li>

                <li class="common cool-link"><a href="new.php"><i style="color: #b3b3b3;" class="fa fa-sign-in" aria-hidden="true"></i>  Sign In / <i style="color: #b3b3b3;" class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>

                <li class="common cool-link"><a href="#"><i style="color: #ff0066;" class="fa fa-heart" aria-hidden="true"></i>  Wishlist</a></li>
                
            </ul>
        </li>
        <li class="cool-link BC"><a href="#">More &#9662;</a>
        	<ul class="dropdown">
            	<li class="common cool-link"><a href="#contactus"> Contact US</a></li>
                <li class="common cool-link"><a href="#aboutus">  About Us</a></li>
                <li class="common cool-link"><a href="faq.html">  FAQ's</a></li>
            </ul>


        </li>
    </ul>
	</div>

	<div class="part_2">
		<ul class="nav-1">
			<li class="kitchen commonnav"><a href="kitchenitems.php">Kitchen</a></li>
			<hr size="30" style="margin-left: 1em;">

			<li class="decor commonnav"><a href="decoritems.php">Decor</a></li>
			<hr size="30" style="margin-left: 1em;">
			
			<li class="storage commonnav"><a href="Storage.php">Storage</a></li>
			<hr size="30" style="margin-left: 1em;">
			
			<li class="acc/stationary commonnav"><a href="AnSitems.php">Accessories & Stationary</a></li>
			<hr size="30" style="margin-left: 1em;">
			
			<li class="fashion commonnav"><a href="product.php">Fashion</a></li>
			<hr size="30" style="margin-left: 1em;">
			
			<li class="personalcare commonnav"><a href="PersonalCare.php">PersonalCare</a></li>
		</ul>
		<div class="Recycle">
			<div class="Recycle-sub">
				<a href="recycle.html" style="font-size: 22px; font-family: Serif; font-variant: small-caps; text-decoration: none; color: white; margin: 0px 15px; padding-top: 10px;">Recycle</a>
			</div>
		</div>
	</div>

<div id="main">
		<img src="new-sliding-5.png" id="slideimage">
	</div>
	<script type="text/javascript">
		function first()
		{
			document.getElementById("slideimage").src="new-sliding-4.jpg";
		}
		function second()
		{
			document.getElementById("slideimage").src="new-sliding-3.jpg ";
		}
		function third()
		{
			document.getElementById("slideimage").src="new-sliding-2.jpg";
		}
		function fourth()
		{
			document.getElementById("slideimage").src="new-sliding-1.jpg";
		}
		function fifth()
		{
			document.getElementById("slideimage").src="new-sliding-5.png";
		}
		setInterval(first,2000);
		setInterval(second,4000);
		setInterval(third,6000);
		setInterval(fourth,8000);
		setInterval(fifth,10000);
	</script>



<div class="carousel-wrapper">
    <div class="carousel" data-flickity>
      <div class="carousel-cell">
        <h3>Tshirt</h3>
        <a class="more" href="product.php">Explore Now</a>
        <img src="woolen-tshirt.jpg">
        
        <div class="price">
          <span>Rs-599</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Bamboo Towels</h3>
        <a class="more" href="product.php">Explore Now</a>
        <img src="f24.jpg">
        
        <div class="price">
          <span>Rs-2,499</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Edible Spoons</h3>
        <a class="more" href="kitchenitems.php">Explore Now</a>
        <img src="Product-2.jpg">
       
        <div class="price">
          <span>Rs-672</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Diyas</h3>
        <a class="more" href="decoritems.php">Explore Now</a>
        <img src="diyas-2.jpg">
       
        <div class="price">
          <span>Rs-350</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Bamboo Lamp shades</h3>
        <a class="more" href="decoritems.php">Explore Now</a>
        <img src="wl.jpg">
       
        <div class="price">
         <span>Rs-2,489</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3> bamboo ceiling lamp</h3>
        <a class="more" href="decoritems.php">
        <img src="wooven-bamboo-round-shaped-ceiling-fan.jpg">Explore Now</a>
        
        <div class="price">
          <span>Rs-1,150</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Ear-rings</h3>
        <a class="more" href="product.php">Explore Now</a>
        <img src="f48.jpg">
      
        <div class="price">
          <span>Rs-99</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Led-Lamp</h3>
        <a class="more" href="decoritems.php">Explore Now</a>
        <img src="led-lamp-1.jpg">
        <div class="price">
          <span>Rs-399</span>
        </div>
      </div>
      <div class="carousel-cell">
        <h3>Sustainable Denim Jacket</h3>
        <a class="more" href="product.php">Explore Now</a>
        <img src="denim-jacket.jpg">
        <div class="price">
          <span>Rs-1299</span>
        </div>
      </div>

    </div>
</div>

  <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>









<ul id="autoWidth" class="cs-hidden">

  	<li class="item-a">
  		<div class="box">

		<div class="slide-img">
			<img src="wall-arts-1.jpg">
			<div class="overlay">
				<a href="decoritems.php" class="buy-btn">Buy Now</a>
			</div>
		</div>

		<div class="detail-box">
			
				<span>Wall Arts</span>
				<a href="#" class="price">Rs 1500</a>
							
		</div>

		</div>
  	</li>

  	<li class="item-a">
  		<div class="box">

		<div class="slide-img">
			<img src="lamp-3.jpg">
			<div class="overlay">
				<a href="decoritems.php" class="buy-btn">Buy Now</a>
			</div>
		</div>

		<div class="detail-box">

				<span>Lamps</span>
				<a href="#" class="price">Rs 1000</a>

		</div>

		</div>
  	</li>

  	<li class="item-a">
  		<div class="box">

		<div class="slide-img">
			<img src="Product-1.jpg">
			<div class="overlay">
				<a href="kitchenitems.php" class="buy-btn">Buy Now</a>
			</div>
		</div>

		<div class="detail-box">

				<span>Dish Scrub</span>
				<a href="#" class="price">Rs 400</a>

		</div>

		</div>
  	</li>

  	<li class="item-a">
  		<div class="box">

		<div class="slide-img">
			<img src="planters-3.jpg">
			<div class="overlay">
				<a href="decoritems.php" class="buy-btn">Buy Now</a>
			</div>
		</div>

		<div class="detail-box">

				<span>Planters</span>
				<a href="#" class="price">Rs 1000</a>

		</div>

		</div>
  	</li>

  	<li class="item-a">
  		<div class="box">

		<div class="slide-img">
			<img src="diyas-2.jpg">
			<div class="overlay">
				<a href="decoritems.php" class="buy-btn">Buy Now</a>
			</div>
		</div>

		<div class="detail-box">

				<span>Diyas</span>
				<a href="#" class="price">Rs 300</a>

		</div>

		</div>
  	</li>
</ul>





<div class="footer">
	<div class="container-1">
		<div class="row">


		<div class="footer-col-1">
			<h3>Download Our App</h3>
			<p>Download App for Android/IOS.</p>
			<div class="app-logo">
				<a href="#"><img src="googleplay.png"></a>
				<a href="#"><img src="appstore.png"></a>
			</div>
		</div>

		<div class="footer-col-2">
			<img src="ecologo.png">
			<p>Customer service shouldn’t just be a department, it should be the entire company.</p>
		</div>

		<div class="footer-col-3">
			<h3>Useful Links</h3>
			<p>
				<a style="color:#8a8a8a;text-decoration:none;" href="#" >Coupons</a><br>
				<a style="color:#8a8a8a;text-decoration:none;" href="#" >Blog Post</a><br>
				<a style="color:#8a8a8a;text-decoration:none;" href="#" >Return Policy</a><br>
				<a style="color:#8a8a8a;text-decoration:none;" href="#" >Terms & Conditions</a><br>
			</p>
		</div>

		<div class="footer-col-4">
			<h3>Follow Us</h3>
			<p>
			<a href="#"><img class="icon" src="https://img.icons8.com/color/40/000000/facebook-new.png"/></i></a><br>
			<a href="#"><img class="icon" src="https://img.icons8.com/color/40/000000/instagram-new--v1.png"/></a><br>
			<a href="#"><img class="icon" src="https://img.icons8.com/color/40/000000/twitter--v1.png"/></a><br>
			<a href="#"><img class="icon" src="https://img.icons8.com/color/40/000000/youtube-play.png"/></a><br>
		</p>
		</div>
</div>
<div class="row" id="aboutus">
	<div>
		<h3>About Us</h3>
		<p>The more data that servers have to process and the more time that users spend online,
			 the unhealthier our planet grows. Eco-Logico can help reduce this carbon footprint though.
			 Buying through eco-Logico also improves your quality of life in terms of mortality, age, etc.
			 One might have a better shot at living a quality life with health if you choose to go eco-friendly.
		 </p>
	</div>
</div>



<div class="row" id="contactus">
	<div>
		<h3>Contact Us</h3>
		<p><a>Mail Us : ecologico_us@gmail.com</a><br>
			<a href="mailto: sundaraneedisravya@gmail.com" style="color:#8a8a8a;text-decoration:none;">Click Here To Send Email</a><br>

			<a>Call Us : +91 9381855992</a>
		 </p>
	</div>
</div>

<hr>
<p class="copyright">CopyRight 2021 - Group Project</p>
</hr>
	</div>
</div>

	</body>
</html>