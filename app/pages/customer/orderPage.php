<?php 
include "../../class/orderProduct.php";
include("../../class/orderUser.php");
include "../../class/order.php";
session_start();
?>
<?php
$products_str = $_GET['products'];
$products = explode(",", $products_str);
// Get the products data
$storage_products = "../../database/products.db";
$stored_products = json_decode(file_get_contents($storage_products), true);
// Get the distribution hub data
$storage_hubs = "../../database/hubs.db";
$stored_hubs = json_decode(file_get_contents($storage_hubs), true);
// Get the user data
$storage_userss = "../../database/accounts.db";
$stored_users = json_decode(file_get_contents($storage_userss), true);
// Store products in cart to products_list
$products_list = [];

function getUserData($username) {
    foreach($GLOBALS['stored_users'] as $user){
        if($user['username'] == $username){
            return $user;
        }
    }
}

for ($i = 0; $i < count($products); $i++) {
    $p_id = substr($products[$i], 0, -3); 
    trim($p_id, " ");
    $p_quantity = substr($products[$i], -2, 1); 
    $p_quantity = strval($p_quantity);
    trim($p_quantity, " ");
    // echo ("quantity = ");
    // echo ($p_quantity);

    foreach((array) $stored_products as $product) {
        if ($p_id === $product['product_id']) {
            // Create new object product
            echo ("check quantity start ");
            echo (strval($p_quantity));
            echo ("check quantity end ");
            $product_obj = new OrderProduct($p_id, $p_quantity, $product['name'], $product['price'], $product['image'], $product['description']);
            // Add to product array
            // var_dump($product_obj);
            array_push($products_list, $product_obj);
        }
    }
}


// Get user's info
$current_user = $_SESSION['user'];
$user_data = getUserData($current_user);
$user_info = new OrderUser($user_data['username'], $user_data['name'], $user_data['address']);

// Get random distribution hub
$distribution_hub = $stored_hubs[rand(0, count($stored_hubs))];

// Create new order
$order = new Order($products_list, 500, $user_info, "active", $distribution_hub);

// var_dump($user_info);
// echo json_encode($products_list);
// var_dump($products_str);
// var_dump($products);
// http://localhost:2222/app/pages/customer/orderPage.php?
// p_id=product_6311f1d8251bd0.48478000[1]&
// p_id=product_6311f116506c19.37934972[1]&
// p_id=product_6312b42b2d46f2.13141630[1]&
// p_id=product_6316c277724e50.26300018[1]&

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <title>Your Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('../layout/nav.php')
        ?>          
      </div>
      <div class='header_vendor'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>YOUR ORDER</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
        <div class="container mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="mb-4">
                    <h2 class="col-12 text-center">YOUR ORDER</h2>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody class='products'>
            
            </tbody>
            </table>
            <div class="d-flex w-100 justify-content-center mt-5">
              <button class='w-50 btn btn-outline-dark' type='button' onclick="">Return to Homepage</button>
            </div>
        </div>
    </main>
    <footer class='mt-5'>
        <?php 
            require('../layout/footer.php')
        ?>
    </footer>
  </body>
</html>