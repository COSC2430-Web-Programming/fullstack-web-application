<?php
  session_start();
  if(!isset($_SESSION['user'])) {
    header("location: ../login.php");
    exit();
};
  $json_data = file_get_contents("../../database/products.db");
  $products = json_decode($json_data,true);
  $product_list = [];
  $json_data = file_get_contents("../../database/products.db");
  $products = json_decode($json_data,true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Customer Homepage</title>
</head>
<body>
<!-- Header starts-->
<!-- Header ends-->
    <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('../layout/nav.php')
        ?>          
      </div>
      <div class='header_vendor'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>CUSTOMER HOMEPAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
    <div class='container mt-4'>
        <div class='row justify-content-center'>
            <div class='mb-4'>
                <h2 class="col-12 text-center">ALL PRODUCTS</h2>
            </div>
            <div class='vstack gap-4 align-items-center mb-5'>
                <div class="mb-4">
                    <form action="" class='row d-flex ' method="get">
                        <div class=" d-flex w-100 justify-content-center input-group mb-3">
                        <input type="text" class="form-control" placeholder="Type something here..." name="name" value="<?php echo (isset($_GET['name']))?$_GET['name']:'';?>">
                        <input class="btn btn-outline-secondary" type="submit" value="Search" name="search">
                        </div>
                        <div class="col form-row hstack gap-2 my-3">
                            <label for="filter-price-from" class="font-weight-bold">From</label>
                            <input name="filter-price-from" type="number" class="form-control w-100" id="filter-price-from" placeholder='Minimum Price' value="<?php echo (isset($_GET['filter-price-from']))?$_GET['filter-price-from']:'';?>">
                        </div>
                        <div class="col form-row hstack gap-2 my-3">
                            <label for="filter-price-to" class="font-weight-bold">To</label>
                            <input name="filter-price-to" type="number" class="form-control w-100" id="filter-price-to" placeholder='Maximum Price' value="<?php echo (isset($_GET['filter-price-to']))?$_GET['filter-price-to']:'';?>">
                        </div>
                        <div class="col-md-auto form-row my-3">
                            <button type="submit" name="submit" class="btn-filter w-100">Filter</button>
                        </div>
                    </form>
            </div>
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-around">
                    <?php
                    $json_data= file_get_contents("../../database/products.db");
                    $products=json_decode($json_data,true);
                    $hasProduct = false;
                    foreach ($products as $product){
                        if (isset($_GET['filter-price-from']) && is_numeric($_GET['filter-price-from']) && !empty($_GET['filter-price-from'])) {
                            if ($product['price'] < $_GET['filter-price-from']) {
                                continue;
                            }
                        }
                        if (isset($_GET['filter-price-to']) && is_numeric($_GET['filter-price-to']) && !empty($_GET['filter-price-to'])) {
                            if ($product['price'] > $_GET['filter-price-to']) {
                                continue;
                            }
                        }
                        if(isset($_GET['name']) && !empty($_GET['name'])){
                            if (stripos($product['name'], $_GET['name']) === false) {
                              continue;
                            }
                        }
                        $hasProduct = true
                        ?>
                        <a class='text-decoration-none' href="../customer/productDetail.php?product_id=<?= $product['product_id']; ?>">
                            <div class="col card">
                                <img src='<?php echo "../../../assets/images/".$product['image'] ?>' class='image-product'>
                                <div class="card-body d-flex justify-content-between ml-xl-3">
                                <span class='fw-bold'><?php echo $product['name']?></span>
                                <span class='fw-semibold'><?php echo $product['price']?></span>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div> <?php
                if ($hasProduct == false){ ?>
                    <h3>No results found!</h3>
                <?php
                } ?>
            </div>
            </div>
        </div>
    </div>
<!-- Customer homepage ends -->
    </main>
    <footer>
        <?php 
            require('../layout/footer.php')
        ?>
    </footer>
</body>
</html>