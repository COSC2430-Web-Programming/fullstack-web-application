<?php
  session_start();
  $json_data = file_get_contents("../../database/products.db");
  $products = json_decode($json_data,true);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../assets/css/style.css">
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
            <div class="row">
              <?php
                foreach ($products as $product){
                  if (strcmp($_SESSION['user'], $product['vendor']) == 0){
                    ?>
                      <div class="col-xl-4 col-lg-4 col-md-6 col-md-12 card">
                        <img src='<?php echo "../../../assets/images/".$product['image'] ?>' class='image-product'>
                        <div class="card-body d-flex justify-content-between ml-xl-3">
                          <span class='fw-bold'><?php echo $product['name']?></span>
                          <span class='fw-semibold'><?php echo $product['price']?></span>
                        </div>
                      </div>
                
                  <?php
                  }
                }
             ?>
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