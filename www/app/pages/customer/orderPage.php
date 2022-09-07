<?php 
session_start();
include "../../class/orderProduct.php";
include("../../class/orderUser.php");
include "../../class/order.php";
?>
<?php
$order_id = '';

if(!empty($_GET['products'])) {
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
    $order_id = uniqid('order_',true);

    // Get user's info
    $current_user = $_SESSION['user'];
    $user_data = getUserData($current_user);
    $user_info = new OrderUser($user_data['username'], $user_data['name'], $user_data['address']);

    // Get random distribution hub
    $distribution_hub = $stored_hubs[rand(0, (count($stored_hubs) - 1))];

    // Create new order
    $order = new Order($order_id, $products_list, $total_cost, $user_info, "active", $distribution_hub);
}

// Get data from storage to display order detail
$json_data = file_get_contents("../../database/orders.db");
$orders = json_decode($json_data,true);
$detail = [];
foreach($orders as $order){
    if (strcmp($order['order_id'],$order_id) == 0){
        $detail = $order;
    }
};

?>
<script>
function handleOrder() {
    const currentUrl = (window.location.href);
    const nextURL = currentUrl.slice(0, 55);

    // Replace the URL without reloading
    window.history.replaceState({}, document.title, nextURL);
}

handleOrder();
</script>

<!-- <script type="text/javascript" src="../../../www/assets/js/handleOrder.js">

</script> -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
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
              </div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../homepage/customerHomepage.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
              </nav>
              </div>
              <ul class="list-group p-0">
                <?php
                    if (!empty($detail)) {
                        foreach ($detail['products_list'] as $row => $info) {
                            ?>
                              <li class='list-group-item'>
                                <div class='hstack gap-3'>
                                    <div class='col-2'>
                                        <img src='<?php echo "../../../assets/images/".$info['image']?>' class='img-thumbnail' alt='food'>
                                    </div>
                                    <div class='col-10 d-flex justify-content-between'>
                                        <div class='fw-bold'><?php echo $info['name']?></div>
                                        <span class='badge text-dark rounded-pill me-4 fs-5'><?php echo $info['quantity']?></span>
                                    </div>
                                </div>
                              </li>
                              <?php
                          }
                    }    
                ?>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">TOTAL PRICE</div>
                          <span class="fw-bold"> $<?= !empty($detail) ? $detail['total_price'] : 0 ?></span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">ADDRESS</div>
                          <span class="fw-bold"> <?= !empty($detail) ? $detail['user_info']['address'] : " " ?></span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">STATUS</div>
                          <option value=""><?= !empty($detail) ? $detail['status'] : " " ?></option>
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