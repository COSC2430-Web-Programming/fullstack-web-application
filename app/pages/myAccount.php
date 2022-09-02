<?php
  session_start();
  define('VENDOR_ROLE', 0);
  define('CUSTOMER_ROLE', 1);
  define('SHIPPER_ROLE', 2);
  $json_data = file_get_contents("../database/accounts.db");
  $accounts = json_decode($json_data, true);
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
                <div class="col-12">
                    <ul class='d-flex justify-content-around list-unstyled text-center'>
                    <?php
                        foreach($accounts as $account){
                          if(strcmp($_SESSION['user'], $account['username']) == 0){
                            if($account['role'] == VENDOR_ROLE){
                                ?>
                              <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Vendor</li>
                            <?php
                              }
                            ?>
                            <?php 
                            if($account['role'] == CUSTOMER_ROLE){
                              ?>
                              <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Customer</li>
                            <?php
                              }
                            ?>
                            <?php 
                            if($account['role'] == SHIPPER_ROLE){
                              ?>
                              <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Shipper</li>
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-md-12 text-center mb-5">
                            <!-- <input name="customerProfile" type="file" class="form-control w-100" id="customerProfile"> -->
                            <img src='<?php echo "../../www/assets/images/".$account['profilePicture'] ?>' width="60% ">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-md-12 info">
                              <div class="mb-4">
                                <label for="customerName" class="form-label pb-3 ">Username</label>
                                <label for="customerName" class="form-control w-100" id="customerName"><?php echo $account['username']?></label>
                              </div>
                              <div class="mb-4">
                                <label for="customerName" class="form-label pb-3 ">Name</label>
                                <label for="customerName" class="form-control w-100" id="customerName"><?php echo $account['name'] ?></label>
                              </div>
                  
                              <?php
                                foreach($accounts as $account){
                                  if(strcmp($_SESSION['user'], $account['username']) == 0){
                                    if($account['role'] == VENDOR_ROLE){
                                        ?>
                                      <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Vendor</li>
                                    <?php
                                      }
                                    ?>
                                    <?php 
                                    if($account['role'] == CUSTOMER_ROLE){
                                      ?>
                                      <div class="mb-5">
                                        <label for="customerAddress" class="form-label pb-2">Address</label>
                                        <label for="customerAddress" class="form-control w-100" id="customerAddress"><?php echo $account['address'] ?></label>
                                      </div>
                                    <?php
                                      }
                                    ?>
                                    <?php 
                                    if($account['role'] == SHIPPER_ROLE){
                                      ?>
                                      <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Shipper</li>
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
                    <div class="mb-4 d-grid gap-2 col-6 mx-auto">
                        <ul class = 'd-flex justify-content-around list-unstyled text-center'>
                            <li input name='submit' value="Change Password" type="submit" class=" btn btn-outline-dark " id="submit">Change Password
                            <li input name='submit' value="Log Out" type="submit" class=" btn btn-outline-dark " id="submit">Log Out
                        </ul>
                    </div>
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

<!-- <?php
                        session_start();
                        if($_SESSION('user') === 0){
                          ?>
                        <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Vendor</li>
                      <?php
                        }
                      ?>
                      <?php 
                        if($_SESSION('user')['role'] === 1){
                          ?>
                        <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Customer</li>
                      <?php
                        }
                      ?>
                      <?php 
                        if($_SESSION('user')['role'] === 2){
                          ?>
                        <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Shipper</li>
                      <?php
                        }
                      ?> -->