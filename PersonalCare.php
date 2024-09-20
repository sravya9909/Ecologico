<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ecologico | PersonalCare</title>
</head>


<link rel="stylesheet" href="PersonalCareStyle.css">
<link rel="icon" href="icon.png" type="image/png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body>

	<div class="part_1">

		<div id="logo">
		<a href="#"><img src="ecologo.png"<i style="position: relative; height: 60px; width: 200px; margin-left: 4em; margin-top: 0.3em;"></i></a>
		</div>

		<div class="search">
			<input type="text" name="box" placeholder="Search for products and more" class="search_text">
			<button type="button" value="button" class="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>


	<ul class="home_list">
         <li class="cool-link BC"><a href="Homepage-EcoLogico.php"> Home<i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="cool-link BC"><a href="cart.php">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>  <span id="cart-item" class="badge badge-danger"></span></a></li>
        <li class="cool-link BC"><a href="#">Profile &#9662;</a>
            <ul class="dropdown">
            	<li class="common cool-link"><a href="#"><i style="color: #b3b3b3;" class="fa fa-user" aria-hidden="true"></i>  My Profile</a></li>

                <li class="common cool-link"><a href="new.php"><i style="color: #b3b3b3;" class="fa fa-sign-in" aria-hidden="true"></i>  Sign In / <i style="color: #b3b3b3;" class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>

                <li class="common cool-link"><a href="#"><i style="color: #ff0066;" class="fa fa-heart" aria-hidden="true"></i>  Wishlist</a></li>
                <li class="common cool-link"><a href="#">  Orders</a></li>
            </ul>
        </li>
        <li class="cool-link BC"><a href="#">More &#9662;</a>
        	<ul class="dropdown">
            	<li class="common cool-link"><a href="ContactUs.html"> Contact US</a></li>
                <li class="common cool-link"><a href="#">  About Us</a></li>
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

	<div class="container">
		<div class="row row-2">
			<div id="message"></div>
			<h2 >Personal Care Items</h2>
			<select>
				<option>Default Sort</option>
				<option>Sort By Price</option>
				<option>Sort By Popularity</option>
				<option>Sort By Rating</option>
				<option>Sort By Sale</option>
			</select>
		</div>
		<div class="row">

			<?php
		  include('server.php');
		  $stmt = $db->prepare("SELECT * FROM personalcare");
		  $stmt->execute();
		  $result = $stmt->get_result();
		  while($row = $result->fetch_assoc()):
		?>
			<div class="col">
				<p class="img_wrapper">
				<img src="<?= $row['p_image'] ?>">
			</p>

				<h4><?= $row['p_name']?></h4>
				<div class="rating">
					<i class="fa fa-star" ></i>
					<i class="fa fa-star" ></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<h5><i class="fas fa-rupee-sign"></i>&nbsp;<?= number_format($row['p_price'],2)?>/-</h5> 

			<div class="card-footer p-1">
						<form action="" class="forum-submit">
							 <div class="row p-2">
                  				<div class="col-md-6 py-1 pl-4">
                   					 <b>Quantity : </b>
                  				</div>
                  				<div class="col-md-6">
                    				<input type="number" class="form-control pqty" value="<?= $row['p_qty'] ?>">
                  				</div>
               				 </div>
							<input type="hidden" class="pid" value="<?= $row['id']?>">
							<input type="hidden" class="pname" value="<?= $row['p_name']?>">
							<input type="hidden" class="pprice" value="<?= $row['p_price']?>">
							<input type="hidden" class="pimage" value="<?= $row['p_image']?>">
							<input type="hidden" class="pcode" value="<?= $row['p_code']?>">
							<button class="btn addItemBtn"><i class="fas fa-cart-plus"></i> &nbsp; Add to cart</button>
						</form>
					</div>   
			</div>
			

					<?php 
						endwhile;
					?>






			</div>
		</div>
		
	</div>

	<div class="footer">
		<div class="container-1">
			<div class="row">


			<div class="footer-col-1">
				<h3>Download Our App</h3>
				<p>Download App for Android and IOS Mobile Phone.</p>
				<div class="app-logo">
					<img src="googleplay.png">
					<img src="appstore.png">
				</div>
			</div>

			<div class="footer-col-2">
				<img src="ecologo.png">
				<p>Customer service shouldn’t just be a department, it should be the entire company.</p>
			</div>

			<div class="footer-col-3">
				<h3>Useful Links</h3>
				<p>
					Coupons<br>
					Blog Post<br>
					Return Policy<br>
					Join Affiliate<br>
				</p>
			</div>

			<div class="footer-col-4">
				<h3>Follow Us</h3>
				<p>
					Facebook<br>
					Twitter<br>
					Instagram<br>
					YouTube<br>
				</p>
			</div>
	</div>

	<div class="row">
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

	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script type="text/javascript">
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			e.preventDefault();
			var $form = $(this).closest(".forum-submit");
			var pid = $form.find(".pid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();

			var pqty = $form.find(".pqty").val();

			$.ajax({
				url: 'action.php',
				method: 'post',
				data: {
					pid:pid, 
					pname:pname, 
					pprice:pprice, 
					pqty:pqty,
					pimage:pimage, 
					pcode:pcode
				},
				success:function(response){
					$("#message").html(response);
					window.scrollTo(0,0);
					 load_cart_item_number();
				}
			});
		});

		load_cart_item_number(); 

		function load_cart_item_number(){
			$.ajax({
				url: 'action.php',
				method: 'get',
				data: {cartItem:"cart_item"},
				success:function(response){
					$("#cart-item").html(response);
				}
			});
		}
	});
</script>
</body>
	</html>