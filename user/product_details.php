<?php
session_start();
?>
<?php include('../functions/fn.php');
include('../includes/connect.php');

if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
    $name = $_SESSION['name'];


    echo "Welcome <strong>$name </strong>";
} else {
    header('Location: login.php');
    exit();
}

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<?php

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

   

    $select_product = "select * from products where product_id = $product_id";

    $result = mysqli_query($con, $select_product);

    if ($result) {
        $product_data = mysqli_fetch_assoc($result);

        $product_name = $product_data['product_name'];
        $product_description = $product_data['product_description'];
        $product_price = $product_data['product_price'];
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Product not found.";
    exit(); 
}
   ?>
     <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a href="dashboard.php" class="navbar-brand mb-0 h1">Home</a>
            <a class="btn btn-secondary" href="cart.php">Cart</a>
            <a href="logout.php">Logout</a>

        </div>
    </nav>
  

<h1>Product Details</h1>
    <?php
    if (isset($product_id)) {
        
        echo "<h2>$product_name</h2>";
        echo "<p>$product_description</p>";
        echo "<p> Rs $product_price</p>";
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>