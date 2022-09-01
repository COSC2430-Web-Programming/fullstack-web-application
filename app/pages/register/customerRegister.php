<?php include("../../class/customer.php") ?>
<?php
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $raw_password = $_POST['password'];
      $password = password_hash($password, PASSWORD_DEFAULT);
      $name = $_POST['customerName'];
      $address = $_POST['address'];
      // include("imageUpload.php");
      $profilePicture =  $_FILES['profilePicture'];
     
      $user = new Customer($username, $password, $raw_password, $profilePicture, $name, $address);
   }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/register.css">
    <title>Register for Customer</title>
  </head>
  <body>
    <div class='container mt-4'>
    <?php 
        require('../layout/nav.php')
    ?>
        <div class='row justify-content-center'>
            <div class='mb-4'>
                <h2 class="col-12 text-center ">REGISTER</h2>
            </div>
            <div class="col-10">
                <ul class='d-flex justify-content-around list-unstyled text-center'>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><a href='vendorRegister.php' class=' text-decoration-none text-secondary'>Vendor</a></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary '><a href='customerRegister.php' class=' text-decoration-none text-white' id="userRole">Customer</a></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><a href='shipperRegister.php' class=' text-decoration-none text-secondary'>Shipper</a></li>
                </ul>
                <div id='error'></div>
                <form action="" class="col-sm-10 col-lg-8 form mx-auto" id="form" enctype="multipart/form-data" name='form' method='post'>
                  <p class="error"><?php echo @$user->error ?></p>
                  <p class="success"><?php echo @$user->success ?></p>
                  <div class="mb-4">
                    <label for="customerName" class="font-weight-bold pb-3">Name</label>
                    <input name="customerName" type="text" class="form-control w-100" id="customerName" placeholder='Name'>
                    <small id="customerNameError"></small>
                  </div>
                  <div class="mb-4">
                    <label for="username" class="form-label pb-3 ">Username</label>
                    <input name="username" type="text" class="form-control w-100" id="username" placeholder='Username'>
                    <small id="usernameError"></small>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label pb-3">Password</label>
                    <input name="password" type="password" class="form-control w-100" id="password" placeholder='Password'>
                    <small id="passwordError"></small>
                  </div>
                  <div class="mb-5">
                    <label for="profilePicture" class="form-label pb-2">Profile picture</label>
                    <input name="profilePicture" type="file" class="form-control w-100" id="profilePicture">
                  </div>
                  <div class="mb-5">
                    <label for="address" class="form-label pb-2">Address</label>
                    <input name="address" type="text" class="form-control w-100" id="address">
                    <small id="customerAddressError"></small>
                  </div>
                  <div class="mb-4 d-grid gap-2 col-6 mx-auto">
                    <input name='submit' value="Register" type="submit" class=" btn btn-outline-dark" id="submit">
                  </div>

                </form>
            </div>
        </div>
    </div>
    <script>      
      document.getElementById("userRole").value = 'customer';
    </script>
    <script src="../../../www/assets/js/register.js"></script>
  </body>
</html>