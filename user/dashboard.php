<?php session_start();  ?>
<?php include('../functions/fn.php');


if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
    $name = $_SESSION['name'];


    echo "Welcome <strong>$name </strong>";
} else {
    header('Location: login.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
<?php
selectproducts();
?>