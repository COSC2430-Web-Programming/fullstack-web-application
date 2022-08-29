<?php include("../class/login.php") ?>

<?php
   if(isset($_POST['submit'])){
      $user = new LoginUser($_POST['username'], $_POST['password']);
   }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Page</title>
    <style>
        <?php include '../../www/assets/css/login.css'; ?>
    </style>
  </head>
  <body>
    <!-- <?php 
        include('layout/nav.php')
    ?> -->
    <section class="Form">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <h1 class="font-weight-bold py-3">Laza</h1>
                    <h4>Login to your account</h4>
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-row">
                            <div class="col-lg">
                                <input type="text" name="username" placeholder="Username" class="form-control my-3 p-2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg">
                                <input type="password" name="password" placeholder="Password" class="form-control my-3 p-2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg">
                                <button type="submit" name="submit" class="btn-login">Login</button>
                            </div>
                        </div>
                        <p>If you haven't had an account? <a href="../register/customerRegister.php">Register here!</a></p>
                        <p class="error"><?php echo @$user->error ?></p>
                        <p class="success"><?php echo @$user->success ?></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>