<?php 
    session_start();
    if(!isset($_SESSION['user'])) {
        header("location: ../login.php");
        exit();
    }

    if(isset($_GET['logout']) || isset($_GET['login'])) {
        unset($_SESSION['user']);
        header("location: ../login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Homepage</title>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
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
            <h3>VENDOR PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
        <div class="container mt-5 pt-5 pb-5">
            <div class="row justify-content-center">
                <div class="hstack gap-3 col-lg-8 mt-3 mb-3">
                    <a href='../vendor/addNewProduct.php' class='btn-option'>Add more Products</a>
                    <a href='../vendor/viewMyProduct.php' class="btn-option">View my Products</a>
                </div>
            </div>
        </div>
    </main>
    <footer class='mt-3'>
      <?php 
          require('../layout/footer.php')
      ?>
    </footer>
</body>
</html>


<!-- <h2>Welcome to your homepage <?php $_SESSION['user']; ?></h2> -->