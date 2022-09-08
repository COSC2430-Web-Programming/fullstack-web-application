<?php
  session_start();
  $json_data = file_get_contents("../../database/orders.db");
  $orders = json_decode($json_data,true);
  $selectOption = '';

  $order_id = '';
  $detail = [];
  if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
  }
  //Get the select value
  if(isset($_POST['submit'])){

    // Get the select value 
    $selectOption = $_POST['statusOption'];

    foreach ($orders as $key => &$value) {

      //Find the index of the order
      if (strcmp($value['order_id'],$order_id) == 0) {
        //Update the order status
        $value['status'] = $selectOption;
      };
    };
    file_put_contents('../../database/orders.db', json_encode($orders, JSON_PRETTY_PRINT));
  };

  foreach($orders as $order){
      if (strcmp($order['order_id'],$order_id) == 0){
          $detail = $order;
      }
  };
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('../layout/nav.php')
        ?>
      </div>
      <div class='header_customer'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3 class='h3 text-center'>ORDER DETAIL PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
      <form action='' method='post'>
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
                  <li class="breadcrumb-item"><a href="../homepage/shipperHomepage.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
              </nav>
              </div>
              <ul class="list-group p-0">
                      <?php
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
                      ?>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">TOTAL PRICE</div>
                          <span class="fw-bold"> $<?= $detail['total_price'] ?></span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">ADDRESS</div>
                          <span class="fw-bold"> <?= $detail['user_info']['address'] ?></span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                          <div class="fw-bold">STATUS</div>
                          <select name="statusOption">
                            <option value=""><?= $detail['status'] ?></option>
                            <option value="Delievered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>

                          
                      </div>
                  </li>
              </ul>
          </div>
      </div>
      </form>
    </main>
    <footer class='mt-4'>
      <?php 
          require('../layout/footer.php')
      ?>
    </footer>
  </body>
</html>