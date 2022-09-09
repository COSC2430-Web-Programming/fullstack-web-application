<?php
  session_start();
  if(!isset($_SESSION['user'])) {
    header("location: ../login.php");
    exit();
  }
  define('VENDOR', 0);
  define('CUSTOMER', 1);
  define('SHIPPER', 2);
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

    <title>My Account</title>
  </head>
  <?php
  function validateImage($rawProfilePicture) {
    $imageName = $rawProfilePicture['name'];
    $imageTmpName = $rawProfilePicture['tmp_name'];
    $imageSize = $rawProfilePicture['size'];
    $imageError = $rawProfilePicture['error'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));
    // Allowed types for an image
    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'webp');

    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 1000000) {
                return true;
            } else{
              return false;
            }
        }else{
          return false;
        }
      }else{
        return false;
    }
  }
?>

  <?php
    // include("../../class/user.php");
    $json_data = file_get_contents("../../../../accounts.db");
    $accounts = json_decode($json_data, true);
    foreach($accounts as $index => $account){
    if(strcmp($_SESSION['user'], $account['username'])==0){
        $i = $index;
        $acc = $accounts[$index];
      }
    }

    if(isset($_POST["upload"])){
      if(validateImage($_FILES['profilePic'])){
        $image_new_name = uniqid('user_', true).basename($_FILES['profilePic']['name']);
        $isValidated = true;
        if($acc['role'] == CUSTOMER){
          $input = array(
            'username' => $acc['username'],
            'password' => $acc['password'],
            'profilePicture' => $image_new_name,
            'name' => $acc['name'],
            'address' => $acc['address'],
            'registeredTime' => $acc['registeredTime'],
            'role' => $acc['role'],
          );
        }
        if($acc['role'] == VENDOR){
          $input = array(
            'username' => $acc['username'],
            'password' => $acc['password'],
            'profilePicture' => $image_new_name,
            'businessName' => $acc['businessName'],
            'businessAddress' => $acc['businessAddress'],
            'registeredTime' => $acc['registeredTime'],
            'role' => $acc['role'],
          );
        }
        if($acc['role'] == SHIPPER){
          $input = array(
            'username' => $acc['username'],
            'password' => $acc['password'],
            'distributionHub' => $acc['distributionHub'],
            'profilePicture' => $image_new_name,
            'registeredTime' => $acc['registeredTime'],
            'role' => $acc['role'],
          );
        }

        $accounts[$i] = $input;
        $imageDir = '../../../assets/images/';
        $imagePath = $imageDir.$image_new_name;
        if(move_uploaded_file($_FILES['profilePic']['tmp_name'], $imagePath)){
          unlink("../../../assets/images/".$acc['profilePicture']);
        }
        file_put_contents('../../../../accounts.db', json_encode($accounts, JSON_PRETTY_PRINT));
      }
    }
  ?>
  <body>
    <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('../layout/nav.php')
        ?>
      </div>
      <div class='header_customer'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div class="text-center">
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
                              <li class=' col-xl-2 col-lg-2 col-md-2 m-2 p-2 bg-secondary border border-secondary text-white'>Vendor</li>
                            <?php
                              }
                            ?>
                            <?php 
                            if($account['role'] == CUSTOMER_ROLE){
                              ?>
                              <li class='col-xl-2 col-lg-2 col-md-2 m-2 p-2 bg-secondary border border-secondary text-white'>Customer</li>
                            <?php
                              }
                            ?>
                            <?php 
                            if($account['role'] == SHIPPER_ROLE){
                              ?>
                              <li class='col-xl-2 col-lg-2 col-md-2 m-2 p-2 bg-secondary border border-secondary text-white'>Shipper</li>
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
                              <img alt="Profile Picture" class='avatar mb-2' src='<?php echo "../../../assets/images/".$account['profilePicture'] ?>'>
                              <form action="myAccount.php" enctype="multipart/form-data" name='changeProfilePicForm' method='post' id='form' >
                                <input name="profilePic" type="file" id="profilePic">
                                <input class=" btn btn-outline-dark btn-sm mb-4" type="submit" name="upload" value="Update Profile Picture" id="upload">
                            </form>
                            </div>
              
                            <div class="col-xl-4 col-lg-4 col-md-6 col-md-12">
                              <div class="mb-4">
                                <p class="mb-2">Username</p>
                                <p class="profileInfo w-100"><?php echo $account['username']?></p>
                              </div>
                  
                              <?php
                                foreach($accounts as $account){
                                  if(strcmp($_SESSION['user'], $account['username']) == 0){
                                    if($account['role'] == VENDOR_ROLE){
                                        ?>
                                      <div class="mb-4">
                                        <p class="mb-2">Business Name</p>
                                        <p class="profileInfo w-100"><?php echo $account['businessName'] ?></p>
                                      </div>
                                      <div class="mb-4">
                                        <p class="mb-2">Business Address</p>
                                        <p class="profileInfo w-100"><?php echo $account['businessAddress'] ?></p>
                                      </div>
                                    <?php
                                      }
                                    ?>
                                    <?php 
                                    if($account['role'] == CUSTOMER_ROLE){
                                      ?>
                                      <div class="mb-4">
                                        <p class="mb-2">Name</p>
                                        <p class="profileInfo w-100" id="customerName"><?php echo $account['name'] ?></p>
                                      </div>
                                      <div class="mb-4">
                                        <label class="mb-2">Address</label>
                                        <label class="profileInfo w-100"><?php echo $account['address'] ?></label>
                                      </div>
                                    <?php
                                      }
                                    ?>
                                    <?php 
                                    if($account['role'] == SHIPPER_ROLE){
                                      ?>
                                      <div class="mb-4">
                                        <label class="mb-2">Distribution Hub</label>
                                        <label class="profileInfo w-100"><?php echo $account['distributionHub'] ?></label>
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
                      <div class = 'd-flex justify-content-evenly list-unstyled text-center'>
                         <input class="myacc_btn btn btn-outline-dark btn-md" placeholder="Log Out" onclick="location.href='../logout.php';">
                      </div>
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