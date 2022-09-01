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
                        <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'>Customer</li>
                    </ul>
                    <div class="mb-4">
                        <label for="realName" class="font-weight-bold pb-3">Name</label>
                        <label for name="realName" class="form-control w-100" id="realName">May Tran</label>
                    </div>
                    <div class="mb-4">
                        <label for="customerName" class="form-label pb-3 ">Username</label>
                        <label for="customerName" class="form-control w-100" id="customerName">maytran216</label>
                    </div>
                    <div class="mb-5">
                        <label for="customerProfile" class="form-label pb-2">Profile picture</label>
                        <input name="customerProfile" type="file" class="form-control w-100" id="customerProfile">
                    </div>
                    <div class="mb-5">
                        <label for="customerAddress" class="form-label pb-2">Address</label>
                        <label for="customerAddress" class="form-control w-100" id="customerAddress">702 Nguyen Van Linh</label>
                    </div>
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