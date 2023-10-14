<?php 
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
  <div class="mb-3">
    <h3>Login</h3>
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  
  <button type="submit" name="user_login" class="btn btn-primary">Submit</button>
  <p>New User? <a href="registration.php">Register</a></p>
</form>
</body>
</html>

<?php
 if (isset($_POST['user_login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $select_query="select * from `user` where email='$email'";
    $result = mysqli_query($con,$select_query);
    

    $rows = mysqli_num_rows($result);
    $data= mysqli_fetch_assoc($result);
    

    if($rows>0){
        if(password_verify($password, $data['password'])){
         
          session_start();
          $_SESSION['userid'] = $data['user_id'];
          $_SESSION['name'] = $data['name'];
        
            
    
           
            echo"<script> window.open('dashboard.php' , '_self') </script>";
          
           
           
        }else{
            echo"<script> alert('Invalid')</script>";
        }
         
    }else{
        echo"<script> alert('Invalid')</script>";
    }

 }
?>