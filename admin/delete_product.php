<?php session_start(); ?>
<?php include('../includes/connect.php');  ?>

<?php
$product_id = $_GET['product_id'];
global $con;

$select_products = " select * from `products` where product_id = $product_id";
$query = mysqli_query($con, $select_products);

if ($row = mysqli_fetch_assoc($query)) {
  
  $product_name = $row['product_name'];
  
}else {
    echo "Product not found.";
    exit();
 }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete_product = "delete from `products` where product_id = $product_id";

    $delete_query = mysqli_query($con, $delete_product);

    if ($delete_query) {
        echo"<script>alert('Successfully Deleted')</script>";
        echo"<script> window.open('index.php' , '_self') </script>";
    } else {
        echo "Error " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
    <p>Are you sure you want to delete <?php echo $product_name ;?> from the table?</p>
    <form method="post">
        <input type="submit" name="confirm_delete" value="Delete">
        <a href="index.php">Cancel</a> 
    </form>
</body>
</html>