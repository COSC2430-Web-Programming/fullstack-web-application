<?php 
include "../../class/orderProduct.php";
include("../../class/orderUser.php");
include "../../class/order.php";
session_start();
?>
<?php
if(!empty($_GET)) {
    $products_str = $_GET['products'];
    $total_cost = $_GET['total'];
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

        foreach((array) $stored_products as $product) {
            if ($p_id === $product['product_id']) {
                // Create new object product
                $product_obj = new OrderProduct($p_id, $p_quantity, $product['name'], $product['price'], $product['image']);
                // Add to product array
                array_push($products_list, $product_obj);
            }
        }
    }
    // Generate id

    // Get user's info
    $current_user = $_SESSION['user'];
    $user_data = getUserData($current_user);
    $user_info = new OrderUser($user_data['username'], $user_data['name'], $user_data['address']);

    // Get random distribution hub
    $distribution_hub = $stored_hubs[rand(0, (count($stored_hubs) - 1))];

    // Create new order
    $order = new Order($products_list, $total_cost, $user_info, "active", $distribution_hub);
}
?>
<script type="text/javascript" src="../../../www/assets/js/handleOrder.js"></script>

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
        <div class='container mt-4'>
          <div class="row">
              <div class='mb-4 d-flex justify-content-between '>
                  <h2 class="">ORDER DETAIL</h2>
                  <div>
                    <input type="submit" name="submit" value="Save" class='status-btn'>
                  </div>
              </div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../homepage/customerHomepage.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
              </nav>
              </div>
              <ul class="list-group p-0">
                     
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">TOTAL PRICE</div>
                          <span class="fw-bold"> total price</span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">ADDRESS</div>
                          <span class="fw-bold"> User's address</span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">STATUS</div>
                          
                      </div>
                  </li>
              </ul>
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