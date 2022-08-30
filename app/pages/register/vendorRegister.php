<?php include("../../class/vendor.php") ?>
<?php
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password = password_hash($password, PASSWORD_DEFAULT);
      $profilePicture =  $_FILES['profilePicture'];
      $businessName = $_POST['businessName'];
      $businessAddress = $_POST['businessAddress'];

      $user = new Vendor($username, $password, $profilePicture, $businessName, $businessAddress);
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
    <title>Register for Vendor</title>
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
                    <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary '><span class=' text-white'>Vendor</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><span class=' text-secondary'>Customer</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><span class=' text-secondary'>Shipper</span></li>
                </ul>
                <div id='error'></div>
                <form action="" class="col-sm-10 col-lg-8 form mx-auto" id="form" enctype="multipart/form-data" name='registerForm' method='post'>
                  <div class="mb-4">
                    <label for="username" class="form-label pb-3 ">Username</label>
                    <input name="username" type="text" class="form-control w-100" id="username" placeholder='Username' required>
                    <small></small>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label pb-3">Password</label>
                    <input name="password" type="password" class="form-control w-100" id="password" placeholder='Password' required>
                    <small></small>
                  </div>
                  <div class="mb-4">
                    <label for="profilePicture" class="form-label pb-2">Profile Picture</label>
                    <input name="profilePicture" type="file" class="form-control w-100" id="profilePicture">
                    <small></small>
                  </div>
                  <div class="mb-4">
                    <label for="businessName" class="form-label pb-3 ">Business Name</label>
                    <input name="businessName" type="text" class="form-control w-100" id="businessName" placeholder='Business Name' required>
                    <small></small>
                  </div>
                  <div class="mb-4">
                    <label for="businessAddress" class="form-label pb-3 ">Business Address</label>
                    <input name="businessAddress" type="text" class="form-control w-100" id="businessAddress" placeholder='Business Address' required>
                    <small></small>
                  </div>
                  <div class="mb-4 row justify-content-center">
                    <input name='submit' value="Register" type="submit" class=" col-lg-8 btn btn-outline-dark " id="submit">
                    <small></small>
                  </div>
                  <p class="error"><?php echo @$user->error ?></p>
                  <p class="success"><?php echo @$user->success ?></p>
                </form>
            </div>
        </div>
    </div>
    <script src="../../../www/assets/js/register.js"></script>
  </body>
</html>