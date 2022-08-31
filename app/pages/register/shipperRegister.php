<?php include("../../class/shipper.php") ?>
<?php
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password = password_hash($password, PASSWORD_DEFAULT);
      $hub = $_POST['distributionHub'];
      $profilePicture =  $_FILES['profilePicture'];
     
      $user = new Shipper($username, $password, $hub, $profilePicture);
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

    <title>Register for Shipper</title>
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
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><span class=' text-secondary'>Vendor</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary '><span class=' text-secondary'>Customer</span></li>
                    <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'><span class=' text-white' id="userRole">Shipper</span></li>
                </ul>
                <div id='error'></div>
                <form action="" class="col-sm-10 col-lg-8 form mx-auto" enctype="multipart/form-data" name='registerForm' method='post'>
                  <div class="mb-4">
                    <label for="username" class="font-weight-bold pb-3">Username</label>
                    <input name="username" type="text" class="form-control w-100" id="username" placeholder='Username'>
                    <small id="usernameError"></small>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label pb-3">Password</label>
                    <input name="password" type="password" class="form-control w-100" id="password" placeholder='Password'>
                    <small id="passwordError"></small>
                  </div>
                  <div class="mb-4">
                    <label for="distributionHub" class="form-label pb-3">Distribution Hub</label>
                    <select name="distributionHub" class="form-select mb-4" aria-label="Default select example"">
                        <option selected value="">Select one distribution hub</option>
                        <?php 
                          // display all hubs in the database
                          $storage_hubs =  '../../database/hubs.db';
                          $stored_hubs = json_decode(file_get_contents($storage_hubs), true);
                          foreach($stored_hubs as $hub) {
                        ?>
                          <option value="<?php echo $hub['name']; ?>"> <?php echo $hub['name']; ?> </option>
                        <?php } ?> 
                    </select> 
                  </div>
                  <div class="mb-5">
                    <label for="profilePicture" class="form-label pb-2">Profile</label>
                    <input name="profilePicture" type="file" class="form-control w-100" id="profilePicture">
                  </div>
                  <div class="mb-4 row justify-content-center">
                    <input name='submit' value="Register" type="submit" class=" col-lg-8 btn btn-outline-dark " id="submit">
                  </div>
                  <p class="error"><?php echo @$user->error ?></p>
                  <p class="success"><?php echo @$user->success ?></p>
                </form>
                
            </div>
        </div>
    </div>
    <script>      
      document.getElementById("userRole").value = 'shipper';
    </script>
    <script src="../../../www/assets/js/register.js"></script>
  </body>
</html>