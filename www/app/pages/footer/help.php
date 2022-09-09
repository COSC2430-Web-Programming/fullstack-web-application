<?php
  session_start()
?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
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
            <div class='col-10'>
                <ul class='row text-right justify-content-space-evenly mx-auto'>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">Return Conditions & Policy at Laza</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">A overview of Return at Laza</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">Information about Freeship</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">How to contact Vendors</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">How do I track my order status?</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">Official recruiting website of Laza</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">Warning: fraudulent Laza!</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">How to write reviews on Laza?</a></li>
                    <li class='col-lg-3 col-md-3 m-2 p-2 border-bottom'><a href ="#" class = "text-decoration-none text-black">Tips to collect Laza Coins</a></li>
                </ul>
            </div>
            <h2 class='col-12 text-right'>TOPICS</h2>
            <div class='col-10'>
                <ul class='d-flex justify-content-around list-unstyled text-center row'>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">My Account</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Refunds</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Vouchers</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Returns</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Delivery</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Payments</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Products</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Seller Support</a></li>
                    <li class=' col-lg-3 col-md-3 m-2 p-2 bg-none'><a  class = "btn btn-outline-secondary d-flex justify-content-around text-center" href="#" role = "button">Policies</a></li>
                </ul>
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