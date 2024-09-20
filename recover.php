<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>Ecologico | Recover</title>
  <link rel="stylesheet" href="new1.css">
  <link rel="icon" href="icon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body class="background">
  <img src="ecologot.png" width="240" height="65">


  <?php
   include ('server.php');

   if(isset($_POST['send-email'])){

   	$email = mysqli_real_escape_string($db,$_POST['Email']);
   	$emailquery = "select * from registration where Email='$email' ";
   	$query = mysqli_query($con,$emailquery);

   	$emailcount = mysqli_num_rows($query);

   	if($emailcount){

   		$userdata = mysqli_fetch_array($query);

   		$username = $userdata['Name'];
   		$token = $userdata['token'];

   		$subject = "Password Reset";
   		$body = "Hi, $username. Click here to reset your password http://localhost/ecologico/resetp.php?token=$token";
   		$sender_email = "From: ecologicous@gmail.com";

   		if(mail($email,$subject,$body,$sender_email)) {
   			$_SESSION['msg'] = "check your mail to reset your password $email";
   			header('location:new.php');
   		}
   		else{
   			echo "Email sending failed..!!";
   		}


   	}else{
   		echo "No emial found..!!";
   	}



   }
?>
<div id="container">

	<div id="cover">
      
      <h1 class="sign-up">Hello, People..!!</h1>
      <p class="sign-up">Enter your details</p>
      <a class="button sign-up" href="#cover">Sign Up</a>
 
  </div>




	<div id="register">
    <form name=f2 action="resetp.php" method="post">
      <h1>Recover Your Account</h1>
      <p class="text-center">Please enter your correct Email</p>
       
     
      <input type="email" placeholder="Email" id="email" name="Email" autocomplete="off" required=""><br>
     
      
    <a ><input class="submit-btn" type="submit" name="send-email" value="Send Mail"></a>

    </form>
  </div>
  
</div> 

  
</body>
</html>