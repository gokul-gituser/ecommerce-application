<?php
include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg</title>
</head>
<body>

<form method="post">
  <div class="mb-3">
    <h3>Register</h3>
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="place" class="form-label">Place</label>
    <input type="text" class="form-control" name="place" id="place" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
 
  <button type="submit" name="user_register" class="btn btn-primary">Submit</button>
  <p>Already have an account? <a href="login.php">Login</a></p>
</form>
    
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $place = $_POST['place'];
    $password = $_POST['password'];
    $password_h = password_hash($password,PASSWORD_DEFAULT);

    $register_user = "insert into `user` (name,phone,email,address,place,password) values('$name',$phone,'$email','$address','$place','$password_h')";

    $reg_query=mysqli_query($con,$register_user);

    if($reg_query){
        echo"<script> alert('Registration Success');window.open('login.php' , '_self') ;</script>";
    }else{
        die(mysqli_error($con));
    }
}

?>