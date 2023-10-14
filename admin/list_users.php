<?php
session_start(); ?>
<?php include('../includes/connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand mb-0 h1">Home</a>
    <a href="add_products.php" class="btn">Add Products</a>

<button><a href="list_users.php">List Users</a></button>

<button><a href="logout.php">Logout</a></button>
  </div>
</nav>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Place</th>
                    
                </tr>
            </thead>
            <tbody>
    <?php
    $list_user = "select * from `user`";
    $user_result=mysqli_query($con,$list_user);
    $row_count=mysqli_num_rows($user_result);

    if (isset($user_result)) {
        while ($row = mysqli_fetch_assoc($user_result)) {
            $user_id = $row['user_id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];
            $place = $row['place'];


            echo "<tr>
                    <td>$name</td>
                    <td>$phone</td>
                    <td>$email</td>
                    <td>$address</td>
                    <td> $place</td>
                </tr>";

        }}

    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>