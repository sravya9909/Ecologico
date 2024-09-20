<?php
   include ('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Ecologico | Login / Register</title>
  <link rel="stylesheet" href="new1.css">
  <link rel="icon" href="icon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script language="javascript">
    function validation()
    {
      var pass1=f1.password.value;
      var mail=f1.email.value;
      if(mail=="")

        alert("Enter some E-Mail");

      else if(mail.indexOf('@')==-1 || mail.indexOf('.')==-1)
      {
        alert("It is a invalid email id");
      }
      else  if(mail.indexOf("@")==0 || mail.indexOf(".")==0 || mail.indexOf('@')>mail.indexOf('.') )
      {
        alert("It is a invalid email id");
      }

      else if(mail.indexOf('@') +1== mail.indexOf('.'))
      {
         alert("It is a invalid email id");
      }
      else
      {
        alert("vaild email id");
      }

      if(pass1=="")

        alert("Enter some password");

      else if(pass1.length<6)

        alert("Enter morethan 6 characters");
      else
      {
        alert("valid password");
      }
     }
   </script>



</head>
<body class="background">
  <img src="ecologot.png" width="240" height="65">
<div id="container">
  
  
  <div id="cover">
      
      <h1 class="sign-up">Hello, People..!!</h1>
      <p class="sign-up">Enter your details</p>
      <a class="button sign-up" href="#cover">Sign Up</a>
    
      
      <h1 class="sign-in">Welcome Back..!!</h1>
      <p class="sign-in">To keep connected with us<br> please login</p>
      <br>
      <a class="button sub sign-in" href="#">Sign In</a>
 
  </div>
  
  
  <div id="login">
    <form name=f1 action="new.php" method="post">
      <?php
        include ('errors.php');
      ?>
      <h1>Sign In</h1>
       
      <input type="text" placeholder="Email" id="email" name="email" autocomplete="off" required=""><br>
      <input type="password" placeholder="Password" id="password" name="password" autocomplete="off" required=""><br><br>
      <!--<a id="forgot-pass" href="recover.php">Forgot your password?</a><br><br>-->
      <input class="submit-btn" type="submit" value="Sign In" name="b1"><!--onClick='validation()'>-->
    </form>
  </div>
  
  
  <div id="register">
    <form name=f2 action="new.php" method="post">
      <h1>Create Account</h1>
       
    
      <input type="text" placeholder="Name" id="name" name="Name" autocomplete="off" required=""><br>
      <input type="email" placeholder="Email" id="email" name="Email" autocomplete="off" required=""><br>
      <input type="password" placeholder="Password" id="password" name="Password" autocomplete="off" required=""><br>
      <input type="password" placeholder="Confirm password" id="password2" name="ConfirmPassword" autocomplete="off" required=""><br><br>
      
    <a ><input class="submit-btn" type="submit" name="sign-up" value="Sign Up"></a>

    </form>
  </div>
  
</div> 

  
</body>
</html>



<!-- <div class="social-container">
            <a href="https://accounts.google.com/signin/v2/identifier?service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social"><i class="fa fa-google"></i></a>
        </div>
 
       <p>or use your Account</p>-->

      <!-- <div class="social-container">
            <a href="https://accounts.google.com/signin/v2/identifier?service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social"><i class="fa fa-google"></i></a>
        </div>
 
      <p>or use your email for Registration</p>-->
