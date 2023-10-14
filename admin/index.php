<?php
session_start();
if (isset($_SESSION['admin'])) {
 echo"hello admin";
}

?>

<?php 
include('../includes/connect.php');
include('../functions/fn.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
 global $con;
 $select_products = " select * from `products`";
 $query = mysqli_query($con, $select_products);

 while ($row = mysqli_fetch_assoc($query)) {
   $product_id = $row['product_id'];
   $product_name = $row['product_name'];
   $product_description = $row['product_description'];
   $product_price = $row['product_price'];

   echo "
 <hr>
     <h5 ><a href='product_details.php?product_id=$product_id'>$product_name</a></h5>
     <p>$product_description</p>
     <p  >Rs: $product_price</p>
     <a class='btn btn-primary' href='edit_product.php?product_id=$product_id'>Edit</a>
     <a class='btn btn-danger'  href='delete_product.php?product_id=$product_id'>Delete</a>
 ";
 }
 
 
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>