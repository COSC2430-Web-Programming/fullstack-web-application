<?php
  session_start();

  foreach($GLOBALS('accounts') as $account ){
    echo($account);
  };
  include("../class/user.php")
?>

<?php 
  session_start();
  $json_data = file_get_contents("../database/accounts.db");
  $accounts = json_decode($json_data, true);

  if(isset($_POST["upload"])){
    $path = $_FILES['profilePic']['name'];
    echo $path;
    // $accounts->updateUser($_SESSION['user'], 'profilePicture', $path);
    foreach($accounts as $account){
      if($account['username'] == $_SESSION['user']){
        echo $account->getStoredUsers();
      }
    }
  }
    // $tmp = $accounts[$index];
    // // delete user
    // unset($accounts[$index]);
    // $account = array_values($accounts);
    // file_put_contents("../database/accounts.db", json_encode($accounts, JSON_PRETTY_PRINT));

    // $username = $tmp['username'];
    // $password = $tmp['password'];
    // $profilePicture = $_FILES['profilePic'];
    // $name = $tmp['name'];
    // $address = $tmp['address'];
    // $registeredTime = $tmp['register'];
    // $password = $tmp['password'];
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

    <title>My Account</title>
  </head>
  <body>
    <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('layout/nav.php')
        ?>

      </div>
      <div class='header_order'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>MY ACCOUNT PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
        <div class='container mt-4'>
            <div class='row justify-content-center'>
                <div class='mb-4'>
                    <h2 class="col-12 text-center ">MY ACCOUNT</h2>
                </div>
                <div class="col-10">
                  <ul class='d-flex justify-content-around list-unstyled text-center'>
                    <?php
                        foreach($accounts as $account){
                          if(strcmp($_SESSION['user'], $account['username']) == 0){
                            if($account['role'] == VENDOR_ROLE){
                                ?>
                              <li class=' col-xl-2 col-lg-2 col-md-2 m-2 p-2 bg-secondary border border-secondary'>Vendor</li>
                            <?php
                              }
                            ?>
                            <?php 
                            if($account['role'] == CUSTOMER_ROLE){
                              ?>
                              <li class='col-xl-2 col-lg-2 col-md-2 m-2 p-2 bg-secondary border border-secondary'>Customer</li>
                            <?php
                              }
                            ?>
                            <?php 
                            if($account['role'] == SHIPPER_ROLE){
                              ?>
                              <li class='col-xl-2 col-lg-2 col-md-2 m-2 p-2 bg-secondary border border-secondary'>Shipper</li>
                            <?php
                              }
                            ?>
                        <?php
                          }
                        }
                        ?>
                    </ul>
                    <?php
                      foreach($accounts as $account){
                        if(strcmp($_SESSION['user'], $account['username']) == 0){
                          ?>
                          <div class="row mt-4 justify-content-evenly">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-md-12 text-center mb-2">
                            <!-- <input name="customerProfile" type="file" class="form-control w-100" id="customerProfile"> -->
                            <img class='avatar' src='<?php echo "../../www/assets/images/".$account['profilePicture'] ?>'>
                            <form action="myAccount.php" enctype="multipart/form-data" name='changeProfilePicForm' method='post' id='form' >
                            <input name="profilePic" type="file">
                            <input class=" btn btn-outline-dark " type="submit" name="upload" value="Update Profile Picture" id="upload">
                          </div>
              
                            <div class="col-xl-4 col-lg-4 col-md-6 col-md-12">
                              <div class="mb-4">
                                <label for="customerName" class="form-label pb-3 ">Username</label>
                                <label for="customerName" class="form-control w-100" id="customerName"><?php echo $account['username']?></label>
                              </div>
                  
                              <?php
                                foreach($accounts as $account){
                                  if(strcmp($_SESSION['user'], $account['username']) == 0){
                                    if($account['role'] == VENDOR_ROLE){
                                        ?>
                                      <div class="mb-4">
                                        <label for="customerAddress" class="form-label pb-2">Business Name</label>
                                        <label for="customerAddress" class="form-control w-100" id="customerAddress"><?php echo $account['businessName'] ?></label>
                                      </div>
                                      <div class="mb-4">
                                        <label for="customerAddress" class="form-label pb-2">Business Address</label>
                                        <label for="customerAddress" class="form-control w-100" id="customerAddress"><?php echo $account['businessAddress'] ?></label>
                                      </div>
                                    <?php
                                      }
                                    ?>
                                    <?php 
                                    if($account['role'] == CUSTOMER_ROLE){
                                      ?>
                                      <div class="mb-4">
                                        <label for="customerName" class="form-label pb-3 ">Name</label>
                                        <label for="customerName" class="form-control w-100" id="customerName"><?php echo $account['name'] ?></label>
                                      </div>
                                      <div class="mb-4">
                                        <label for="customerAddress" class="form-label pb-2">Address</label>
                                        <label for="customerAddress" class="form-control w-100" id="customerAddress"><?php echo $account['address'] ?></label>
                                      </div>
                                    <?php
                                      }
                                    ?>
                                    <?php 
                                    if($account['role'] == SHIPPER_ROLE){
                                      ?>
                                      <div class="mb-4">
                                        <label for="customerAddress" class="form-label pb-2">Distribution Hub</label>
                                        <label for="customerAddress" class="form-control w-100" id="customerAddress"><?php echo $account['distributionHub'] ?></label>
                                      </div>
                                    <?php
                                      }
                                    ?>
                                <?php
                                  }
                                }
                                ?>
                              </div>
                          </div>
                    <?php
                        }
                      }
                    ?>
                      <ul class = 'd-flex justify-content-evenly list-unstyled text-center'>
                          <li input class=" btn btn-outline-dark " type="submit" name="upload" value="upload" id="upload">Update Profile Picture</li>
                          <li class="myacc_btn btn btn-outline-dark" onclick="location.href='logout.php';">Log Out</li>
                      </ul>
                </div>
            </div>
        </div>
    </main>
    <footer class='mt-4'>
      <?php 
          require('layout/footer.php')
      ?>
  </footer>
  </body>
</html>