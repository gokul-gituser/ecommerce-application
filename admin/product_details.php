<?php
session_start();
$admin = $_SESSION['admin'];
?>
<?php include('../functions/fn.php');
include('../includes/connect.php');



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
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand mb-0 h1">Home</a>
    <a href="add_products.php" class="btn">Add Products</a>

<button><a href="list_users.php">List Users</a></button>

<button><a href="logout.php">Logout</a></button>
  </div>
</nav>
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
    
  

<h1>Product Details</h1>
    <?php
    if (isset($product_id)) {
        
        echo "<h2>$product_name</h2>";
        echo "<p>$product_description</p>";
        echo "<p> Rs $product_price</p>";

       echo" <a class='btn btn-primary' href='edit_product.php?product_id=$product_id'>Edit</a>";
    echo" <a class='btn btn-danger'  href='delete_product.php?product_id=$product_id'>Delete</a>";
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>