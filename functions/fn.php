<?php
include('../includes/connect.php');

function selectproducts()
{
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
    
  ";
    if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
      $modal_id = 'exampleModal' . $product_id;

      echo "<button  type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modal_id'>Add To Cart</button> <hr> 
  <div class='modal fade' id='$modal_id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
    <form method='post'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>$product_name</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
       
        <div class='form-group'>
          <label for='quantity'>Quantity:</label>
          <input type='number' class='form-control' id='quantity' name='quantity' value='1' min='1'>
        </div>
          <input type='hidden' name='product_id' value='$product_id'>
          <input type='hidden' name='user_id' value='{$_SESSION['userid']}'>
        
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <input type='submit'  name='add_to_cart' class='btn btn-primary'>Save</input>
      </div>
    </form>
    </div>
  </div>
</div>
  ";

      
    }
  }

  if (isset($_POST['add_to_cart'])) {

    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $quantity = $_POST['quantity'];


    global $con;

    $existing_cart_query = "select * from cart where product_id = $product_id and user_id = $user_id";
    $existing_cart_result = mysqli_query($con, $existing_cart_query);

    if (mysqli_num_rows($existing_cart_result) > 0) {
      
      $row = mysqli_fetch_assoc($existing_cart_result);
      $existing_quantity = $row['quantity'];
      $new_quantity = $existing_quantity + $quantity;
  
      $update_cart_query = "update cart set quantity = $new_quantity where product_id = $product_id and user_id = $user_id";
      $update_cart_result = mysqli_query($con, $update_cart_query);

      if ($update_cart_result) {
       
        echo "<script>alert('Success')</script>";
      } else {
        
        echo "Error: " . mysqli_error($con);
      }
    }else{

      $insert_cart_query = "insert into cart (product_id,user_id, quantity) values ( $product_id,$user_id, $quantity)";
      $insert_cart_result = mysqli_query($con, $insert_cart_query);

    if ($insert_cart_result) {
      echo "<script>alert('Success')</script>";
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }
}


}
?>