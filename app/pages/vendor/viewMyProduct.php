<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
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
            <h3>VENDOR DASHBOARD</h3>
          </div>
        </div>
      </div>
    </header>
    <div class='container mt-4'>
      <div class='row justify-content-center'>
            <div class='mb-4'>
                <h2 class="col-12 text-center">ALL PRODUCTS</h2>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 ">
            <?php
              session_start();
              $json_data = file_get_contents("../../database/products.db");
              $products = json_decode($json_data,true);
              foreach ($products as $product){
                if (strcmp($_SESSION['user'], $product['creator']) == 0){
                  ?>
                    <div class="col text-center d-flex flex-column">
                      <span>
                        <img src="http://cdn.tgdd.vn/Files/2020/10/24/1301635/list-12-nha-hang-quan-an-sushi-cuc-chat-luong-o-quan-1-202201141555392974.jpg" width="50%">
                      </span>
                      <hstack justify-content-between>
                        <span><?php echo $product['name']?></span>
                        <span><?php echo $product['price']?></span>
                      </hstack>
                    </div>
              
                <?php
                }
              }
              ?>
              </div>
    </div>
  </body>
</html>