<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ecologico | Cart</title>
</head>
<link rel="stylesheet" href="cart2.css">
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
        <li class="cool-link BC"><a href="#">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>  <span id="cart-item" class="badge badge-danger"></span></a></li>
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
	</div><br style="line-height:60em">
	<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
					<span id="spanSurrounder" style="position:relative;margin:10px;display:inline-block;">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="6">
                  <h2 class="text-center text-info m-0">Products in your cart</h2>
                </td><br><br>
              </tr>
              <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge p-1 cls" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'server.php';
                $stmt = $db->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['p_image'] ?>" width="100" height="80"></td>
                <td><?= $row['p_name'] ?></td>
                <td>
                  <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['p_price'],2); ?>

                <input type="hidden" class="pprice" value="<?= $row['p_price'] ?>">
								</td>
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>">
                </td>
                <td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead cls" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  
                </td>
                <td colspan="1"><b>Total Amount:</b></td>
                <td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
              </tr>
            </tbody>
          </table>
					<hr class="check">
					  <center><a href="checkout.php" class="st btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a></center>
				</span>
        </div>
      </div>
    </div>
  </div>
	</div>

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
<div class="row" id=#aboutus>
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
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>
</html>
