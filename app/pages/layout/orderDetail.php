<?php
    $data2 = [
        [
        'orderID' => '1',
        'products' => array(
            ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Sushi','quantity' => '1'],
            ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Kimpap','quantity' => '3'],
            ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Egg','quantity' => '1'],
        ),
        'total_price' => '100',
        'address' => '359 Le Dai Hanh',
        'status' => 'active'],
        [
        'orderID' => '2',
        'products' => array(
            ['image' => 'https://umamidays.com/wp-content/uploads/2022/03/pork-ears-bbq-1200x800.jpg','name' => 'Egg','quantity' => '1'],
            ['image' => 'https://umamidays.com/wp-content/uploads/2022/03/pork-ears-bbq-1200x800.jpg','name' => 'Kimpap','quantity' => '3'],
            ['image' => 'https://umamidays.com/wp-content/uploads/2022/03/pork-ears-bbq-1200x800.jpg','name' => 'Sushi','quantity' => '1'],
        ),
        'total_price' => '300',
        'address' => '359 Le Dai Hanh',
        'status' => 'active'],
      ];

    $order_id = '';
    $detail = [];
   if(isset($_GET['orderID'])){
    $order_id = $_GET['orderID'];
    }


    foreach($data2 as $row => $info){
        // echo '<pre>';
        // print_r($info['orderID']);
        // echo '</pre>';
        if (strcmp($info['orderID'],$order_id) == 0){
            $detail = $info;
        }
      };
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('nav.php')
        ?>

      </div>
      <div class='header_p'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>ORDER DETAIL PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    
    <div class='container mt-4'>
        <div class="row">
            <div class='mb-4'>
                <h2 class="col-12 text-center ">ORDER DETAIL</h2>
            </div>
            <ul class="list-group p-0">
                    <?php
                    foreach ($detail['products'] as $row => $info) {
                        echo "
                        <li class='list-group-item'>
                        <div class='hstack gap-3'>
                            <div class='col-2'>
                                <img src='{$info['image']}' class='img-thumbnail' alt='food'>
                            </div>
                            <div class='col-10 d-flex justify-content-between'>
                                <div class='fw-bold'>{$info['name']}</div>
                                <span class='badge bg-dark rounded-pill me-4'>{$info['quantity']}</span>
                            </div>
                        </div>
                    </li>";
                    }; 
                    ?>
                <li class="list-group-item">
                    <div class=" d-flex justify-content-between">
                        <div class="fw-bold">TOTAL PRICE</div>
                        <span class="fw-bold"> <?= $detail['total_price'] ?>$</span>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class=" d-flex justify-content-between">
                        <div class="fw-bold">ADDRESS</div>
                        <span class="fw-bold"> <?= $detail['address'] ?></span>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class=" d-flex justify-content-between">
                        <div class="fw-bold">STATUS</div>
                        <span class="fw-bold"> <?= $detail['status'] ?></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    
  </body>
</html>