<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Shipper Register</title>
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
                    <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'><span class=' text-white'>Vendor</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary '><span class=' text-secondary'>Customer</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><span class=' text-secondary'>Shipper</span></li>
                </ul>
                <form action="" class="col-sm-10 col-lg-8 form mx-auto" enctype="multipart/form-data" name='registerForm' method='post'>
                  <div class="mb-4">
                    <label for="userName" class="font-weight-bold pb-3">Username</label>
                    <input name="userName" type="text" class="form-control w-100" id="userName" placeholder='Username'>
                  </div>
                  <div class="mb-4">
                    <label for="userPassword" class="form-label pb-3">Password</label>
                    <input name="userPassword" type="password" class="form-control w-100" id="userPassword" placeholder='Password'>
                  </div>
                  <div class="mb-4">
                    <label for="distributionHub" class="form-label pb-3">Distribution Hub</label>
                    <select class="form-select mb-4" aria-label="Default select example"">
                        <option selected value="">Select one distribution hub</option>
                        <option value="district7">District 7</option>
                        <option value="district2">District 2</option>
                        <option value="district3">District 3</option>
                    </select> 
                  </div>
                  <div class="mb-5">
                    <label for="userProfile" class="form-label pb-2">Profile</label>
                    <input name="userProfile" type="file" class="form-control w-100" id="userProfile">
                  </div>
                  <div class="mb-4 row justify-content-center">
                    <input name='submit' value="Register" type="submit" class=" col-lg-8 btn btn-outline-dark " id="submit">
                  </div>

                </form>
                
            </div>
        </div>
    </div>
  </body>
</html>