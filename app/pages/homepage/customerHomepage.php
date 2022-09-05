<?php
  session_start();
  $json_data = file_get_contents("../../database/products.db");
  $products = json_decode($json_data,true);
  $product_list = [];

  // function search(){
  //   foreach($products as $product){
  //     if(isset($_GET['name']) && !empty($_GET['name'])){
  //       if (strpos($product['name'], $_GET['name']) === false) {
  //         continue;
  //       }
  //   }
  //   $product_list = $product;
  //   $_SESSION['product_list'] = $product_list;
  // }
  // if(isset($_SESSION['product_list'])){
  //   echo '<pre>';
  //   print_r($_SESSION['product_list']);
  //   echo '</pre>';
  // }
 
// }

?>
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
                <div class="mb-4">
                  <form method="get" action="customerHomepage.php">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Type something here..." name="name">
                    <input class="btn btn-outline-secondary" type="submit" value="Search" name="search">
                  </div>
                  </form>
                </div>
                <div class="row justify-content-evenly">
                <?php
                    foreach ($products as $product){
                      if(isset($_GET['name']) && !empty($_GET['name'])){
                        if (strpos($product['name'], $_GET['name']) === false) {
                          continue;
                        }
                      }
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