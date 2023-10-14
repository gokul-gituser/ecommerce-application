<?php
session_start();
?>

<?php
include('../includes/connect.php');

if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
    $name = $_SESSION['name'];
  

    echo "<h2>$name's cart</h2>";

    $cart_query = "select cart.cart_id, products.product_name, cart.quantity
                   from cart
                   inner join products on cart.product_id = products.product_id
                   where cart.user_id = $user_id";

    $cart_result = mysqli_query($con, $cart_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <a href="dashboard.php" class="navbar-brand mb-0 h1">Home</a>
            <a class="btn btn-secondary" href="cart.php">Cart</a>
            <a href="logout.php">Logout</a>

        </div>
    </nav>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if (isset($cart_result)) {
                    while ($row = mysqli_fetch_assoc($cart_result)) {
                        $cart_id = $row['cart_id'];
                        $product_name = $row['product_name'];
                        $quantity = $row['quantity'];

                        echo "<tr>
                                <td>$product_name</td>
                                <td>$quantity</td>
                                <td>
                                    <form method='post' action='cart.php'>
                                        <input type='hidden' name='cart_id' value='$cart_id'>
                                        <button type='submit' name='delete_item' class='btn btn-danger'>Delete</button>

                                    </form
                                </td>
                            </tr>";

                    }
        
                }
                if (isset($_POST['delete_item'])) {
                    $cart_id = $_POST['cart_id'];
                
                  
                    $delete_query = "delete from cart where cart_id = $cart_id";
                    $delete_result = mysqli_query($con, $delete_query);
                
                    if ($delete_result) {
                        echo "<script>alert('Delete Success')</script>";

                        echo "<script> window.location.href = 'cart.php'</script>";
                    } else {
                       
                        echo "Error: " . mysqli_error($con);
                    }
                }
            ?>

            </tbody>
        </table>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>