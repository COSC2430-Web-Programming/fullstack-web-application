<?php
  session_start()
?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Help Center</title>
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
            <h3>HELP CENTER</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
    <div class='container mt-4'>
        <h2 class='col-12 text-right'>TOP QUESTIONS</h2>
        <div class='row justify-content-center'>
            <div class='col-12'>
                <ul class='row text-right'>
                    <li class='col-lg-3 col-md m-1 col-5'>Return Conditions and Policy at Laza</li>
                    <li class='col-lg-3 col-md m-1 col-5'>A overview of Return at Laza</li>
                    <li class='col-lg-3 col-md m-1 col-5'>Information about Freeship</li>
                    <li class='col-lg-3 col-md m-1 col-5'>How to contact Vendors</li>
                    <li class='col-lg-3 col-md m-1 col-5'>How do I track my order status?</li>
                    <li class='col-lg-3 col-md m-1 col-5'>Official recruiting website of Laza</li>
                    <li class='col-lg-3 col-md m-1 col-5'>Warning: fraudulent Laza!</li>
                    <li class='col-lg-3 col-md m-1 col-5'>How to write reviews on Laza?</li>
                </ul>
            </div>
            <h3 class='col-12 text-right'>TOPICS</h3>
            <div class='col-12'>
                <ul class='d-flex justify-content-around list-unstyled text-center row'>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>My Account</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Refunds</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Vouchers & Promotions</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Returns</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Shipping & Delivery</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Payments</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Produts on Laza</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Seller Support</li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-light border border-secondary'>Laza Comunities Policies</li>
                </ul>
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