<?php 
  session_start();
  $json_data = file_get_contents("../../database/products.db");
  $products = json_decode($json_data,true);

  $product_id = '';
  $detail = [];
  if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  }

  foreach($products as $row => $info){
    if (strcmp($info['product_id'],$product_id) == 0){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
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
            <h3 class='h3 text-center'>PRODUCT DETAIL PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
          <div class="mb-4">
            <h2 class="col-12 text-center"> PRODUCT DETAILS</h2>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-10 d-flex justify-content-center">
              <div class="card col-sm-8">
               
                <img src='<?php echo "../../../assets/images/".$detail['image'] ?>' class="img-fluid w-100" alt="product_img" id='productImg'>

                <div class="card-body">
                  <div class="d-flex justify-content-between mt-4 mb-4 align-items-center w-100">
                    <h5 id='productName' class="card-title mb-4"> <?= $detail['name'] ?></h5>
                    <p id='productPrice' class="mb-4 d-flex justify-content-end fw-bold fs-3"><?= $detail['price'] ?></p>
                  </div>
                  <p id='productDescription' class="card-text mb-5 text-wrap text-justify"><?= $detail['description'] ?></p>
                  <button class=" w-100 btn btn-outline-dark btn-sm mt-3" id='add-cart' >Add To Cart</button>
                  <a href='cartPage.php' class='cart-link'>
                    <button class='cart'>View your cart <span>0</span></button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <?php 
          require('../layout/footer.php')
      ?>
    </footer>
    <script src="../../../assets/js/addToCart.js"></script>
  </body>
</html>

