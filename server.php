<?php
//session_start();

// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ecologico');

// REGISTER USER
if (isset($_POST['sign-up'])) {
  // receive all input values from the form
  $userid = mysqli_real_escape_string($db, $_POST['Name']);
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['Password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['ConfirmPassword']);

  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }else{

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $SELECT= "SELECT Email FROM registration WHERE  Email = ? LIMIT 1";
  //$INSERT = "INSERT Into registration (Name, Email,Password, ConfirmPassword ) values(?, ?, ?, ?)";
  $stmt = $db->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;
  
  if($rnum==0){
    $stmt->close();


   
   $password = md5($password_1);//encrypt the password before saving in the database
   //$token = bin2hex(random_bytes(15));
    $query = "INSERT INTO registration (Name, Email, Password) 
          VALUES('$userid', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['Email'] = $email;



    //$stmt = $db->prepare($INSERT);
    //$stmt->bind_param("ssss", $userid, $email, $password_1, $password_2);
    //$stmt->execute();
  }else{
    array_push($errors,"someone already registered using this email");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database
    $_SESSION['success'] = "Successfully Registered";
  	
  	header('Location: new.php');
  }
 }
}
// ... 
// LOGIN USER
if (isset($_POST['b1'])) { //login button name 
  $userid = $_POST['email'];
  $password = $_POST['password'];
    
     //$INSERT = "INSERT Into login (email,password) values(?, ?)";
     //$stmt = $db->prepare($INSERT);
    //$stmt->bind_param("ss", $userid, $password);
    //$stmt->execute();
    
    $query = "SELECT * FROM registration WHERE Email=? ";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();
      if($data['Password'] === md5($password)){//encrypted password matching
        header("Location: Homepage-Ecologico.html");
      }else {
        array_push($errors, "Wrong username/password");
      }
    }else {
      array_push($errors, "Wrong username/password");
    }
}

?>