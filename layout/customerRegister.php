<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class='container mt-4'>
        <?php 
            require('nav.php')
        ?>
        <div class='row justify-content-center'>
            <div class='mb-4'>
                <h2 class="col-12 text-center ">REGISTER</h2>
            </div>
            <div class="col-10">
                <ul class='d-flex justify-content-around list-unstyled text-center'>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><span class=' text-secondary'>Vendor</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary '><span class=' text-white'>Customer</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><span class=' text-secondary'>Shipper</span></li>
                </ul>
                <form action="signup.php" class="col-sm-10 col-lg-8 form mx-auto" enctype="multipart/form-data" name='registerForm' method='post'>
                  <div class="mb-4">
                    <label for="realName" class="font-weight-bold pb-3">Name</label>
                    <input name="realName" type="text" class="form-control w-100" id="realName" placeholder='Name'>
                  </div>
                  <div class="mb-4">
                    <label for="customerName" class="form-label pb-3 ">Username</label>
                    <input name="customerName" type="text" class="form-control w-100" id="customerName" placeholder='Username'>
                  </div>
                  <div class="mb-4">
                    <label for="customerPassword" class="form-label pb-3">Password</label>
                    <input name="customerPassword" type="password" class="form-control w-100" id="customerPassword" placeholder='Password'>
                  </div>
                  <div class="mb-5">
                    <label for="customerProfile" class="form-label pb-2">Profile picture</label>
                    <input name="customerProfile" type="file" class="form-control w-100" id="customerProfile">
                  </div>
                  <div class="mb-5">
                    <label for="customerAddress" class="form-label pb-2">Address</label>
                    <input name="customerAddress" type="text" class="form-control w-100" id="customerProfile">
                  </div>
                  <div class="mb-4 d-grid gap-2 col-6 mx-auto">
                    <input name='submit' value="Register" type="submit" class=" btn btn-outline-dark " id="submit">
                  </div>
                </form>
                
            </div>
        </div>
    </div>
  </body>
</html>