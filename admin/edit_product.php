<?php session_start(); ?>
<?php include('../includes/connect.php');  ?>


<?php

$product_id = $_GET['product_id'];


global $con;
$select_product = "select * from `products` where product_id = $product_id";
$query = mysqli_query($con, $select_product);

if ($query) {

    $product_data = mysqli_fetch_assoc($query);

    if ($product_data) {
        $product_name = $product_data['product_name'];
        $product_description = $product_data['product_description'];
        $product_price = $product_data['product_price'];
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Error: " . mysqli_error($con);
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $updated_name = $_POST['product_name'];
    $updated_description = $_POST['product_description'];
    $updated_price = $_POST['product_price'];


    $update_product = "update `products` set product_name = '$updated_name', product_description = '$updated_description', product_price = $updated_price where product_id = $product_id";

    $update_query = mysqli_query($con, $update_product);

    if ($update_query) {
        header('Location: product_details.php?product_id=' . $product_id);
        exit();
    } else {
        echo "Error " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
    <h1>Edit Product</h1>
    <form method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product_name; ?>" required><br><br>

        <label for="product_description">Product Description:</label>
        <textarea name="product_description" required><?php echo $product_description; ?></textarea><br><br>

        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" value="<?php echo $product_price; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>