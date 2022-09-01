<?php 
    $data = [
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
          ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Sushi','quantity' => '1'],
          ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Kimpap','quantity' => '3'],
          ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Egg','quantity' => '1'],
      ),
      'total_price' => '300',
      'address' => '359 Le Dai Hanh',
      'status' => 'active'],
      [
        'orderID' => '2',
        'products' => array(
            ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Sushi','quantity' => '1'],
            ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Kimpap','quantity' => '3'],
            ['image' => 'http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg','name' => 'Egg','quantity' => '1'],
        ),
        'total_price' => '300',
        'address' => '359 Le Dai Hanh',
        'status' => 'active'],
    ];

  $table_header= ["OrderID","Address","Status","TotalPrice"];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('../layout/nav.php')
        ?>

      </div>
      <div class='header_order'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>SHIPPING PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class='container mt-4'>
        <div class='row justify-content-center'>
              <div class='mb-4'>
                  <h2 class="col-12 text-center ">ORDER LIST</h2>
              </div>
              <div class="table-responsive col-lg-10">
                <table class='table align-middle table-hover table-sm'>
                    <thead>
                      <tr>
                        <th scope='col'>OrderID</th>
                        <th scope='col'>Address</th>
                        <th scope='col'>Status</th>
                        <th scope='col'>TotalPrice</th>
                        <th scope='col'>Detail</th>
                      </tr>
                    </thead>
                <?php 
                  foreach($data as $row =>$info){
                    ?>
                        <tr>
                        <td><?=$info['orderID']; ?></td>
                        <td><?=$info['address']; ?></td>
                        <td><?=$info['total_price']; ?></td>
                        <td><?=$info['status']; ?></td>
                        <td><a href="orderDetail.php?orderID=<?= $info['orderID']; ?>">See Detail</a></td>
                      </tr>
                    <?php
                  };
                ?>
              </table>
            </div>
        </div>
      </div>
  </main>
  <footer class='mt-4'>
      <?php 
          require('../layout/footer.php')
      ?>
    </footer>
  </body>
</html>

