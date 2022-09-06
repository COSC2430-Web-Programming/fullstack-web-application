<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <title>Your Cart</title>
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
            <h3>CART</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
        <div class="container mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="mb-4">
                    <h2 class="col-12 text-center">YOUR CART</h2>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody class='products'>
            
            </tbody>
            </table>
            <div class="d-flex w-100 justify-content-center mt-5">
              <button class='w-50 btn btn-outline-dark' type='button' onclick="orderProducts()">Order</button>
            </div>
        </div>
    </main>
    <footer class='mt-5'>
        <?php 
            require('../layout/footer.php')
        ?>
    </footer>
    <script src="../../../www/assets/js/cartDisplay.js"></script>
    <script src="../../../www/assets/js/orderProducts.js"></script>
  </body>
</html>