<?php
session_start();
include "../../class/orderProduct.php";
include("../../class/orderUser.php");
include "../../class/order.php";
?>
<?php
$order_id = '';

if (!empty($_GET['products'])) {
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
  $storage_userss = "../../../../accounts.db";
  $stored_users = json_decode(file_get_contents($storage_userss), true);
  // Store products in cart to products_list
  $products_list = [];

  function getUserData($username)
  {
    foreach ($GLOBALS['stored_users'] as $user) {
      if ($user['username'] == $username) {
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

    foreach ((array) $stored_products as $product) {
      if ($p_id === $product['product_id']) {
        // Create new object product
        $product_obj = new OrderProduct($p_id, $p_quantity, $product['name'], $product['price'], $product['image']);
        // Add to product array
        array_push($products_list, $product_obj);
      }
    }
  }

  // Generate id
  $order_id = uniqid('order_', true);

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
$orders = json_decode($json_data, true);
$detail = [];
foreach ($orders as $order) {
  if (strcmp($order['order_id'], $order_id) == 0) {
    $detail = $order;
  }
};

?>

<script type="text/javascript" src="../../../assets/js/handleOrder.js"></script>