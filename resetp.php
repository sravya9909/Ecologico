<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ecologico | Reset Password</title>
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="stylereg.css">
</head>
<body>
    
    <img src="ecologot.png" width="240" height="65">

  <?php
   include ('server.php');


   if(isset($_POST['reset'])){


    if(isset($_GET['token'])){
        $token = $_GET['token'];
    

    $password = mysqli_real_escape_string($db,$_POST['Password']);
    $cpassword = mysqli_real_escape_string($db,$_POST['Confirmpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


    


    if($password === $cpassword){

        $updatequery = "update registration set password='$pass'  where token='$token' ";

        $iquery = mysqli_query($db,$updatequery);

        if($iquery){
            $_SESSION['msg'] = "Your Password has been updated";
            header('location:new.php');

        }else{
            $_SESSION['passmsg'] = "Your password is not updated";
            header('location:resetp.php');
        }
    }else{
        $_SESSION['passmsg'] = "Password is not matching";
    }

   }else{
        echo "No token found";
   }
 }
?>

    
    <center>
    <div class="regi">
        <form  name=f2 action="" method="post">
        <h1><i><u>Update your password</u></i></h1><br>
        <p> <?php

            if(isset($_SESSION['passmsg'])){
                echo $_SESSION['passmsg'];
            }else{
                echo $_SESSION['passmsg'] = "";
            }
            ?> </p>
        
        <input type="password" placeholder="New Password" id="password" name="Password" autocomplete="off" required=""><br>
      <input type="password" placeholder="Confirm password" id="password2" name="ConfirmPassword" autocomplete="off" required=""><br><br>
      
     <a ><input class="submit-btn" type="submit" name="reset" value="Update Password"></a>
    </div>
    </center>
  </form>
</body>
</html>
