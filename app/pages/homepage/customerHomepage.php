<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Homepage</title>
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
            <h3>CUSTOMER HOMEPAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
        <div class='container mt-4'>
            <div class='row justify-content-center'>
                <div class='mb-4'>
                    <h2 class="col-12 text-center">ALL PRODUCTS</h2>
                </div>
                <div class="row justify-content-evenly">
                <?php
                    session_start();
                    $json_data = file_get_contents("../../database/products.db");
                    $products = json_decode($json_data,true);
                    foreach ($products as $product){
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-md-12 card">
                            <img src='<?php echo "../../../www/assets/images/".$product['image'] ?>' class='card-img-top'>
                            <div class="card-body d-flex justify-content-between ml-xl-3">
                            <span class='fw-bold'><?php echo $product['name']?></span>
                            <span class='fw-semibold'><?php echo $product['price']?></span>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <?php 
            require('../layout/footer.php')
        ?>
    </footer>



</body>
</html>