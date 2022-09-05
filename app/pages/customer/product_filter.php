<?php 
  session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css" />
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
            <h3>CUSTOMER SEARCH</h3>
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
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-around">
                <?php
                    $json_data= file_get_contents("../../database/products.db");
                    $products=json_decode($json_data,true);
                    foreach ($products as $product){
                        if (isset($_GET['filter-price-from']) && is_numeric($_GET['filter-price-from'])) {
                            if ($product['price'] < $_GET['filter-price-from']) {
                                continue;
                            }
                        }
                        if (isset($_GET['filter-price-to']) && is_numeric($_GET['filter-price-to'])) {
                            if ($product['price'] > $_GET['filter-price-to']) {
                                continue;
                            }
                        }
                        // if (isset($_GET['form-control me-2']) && !empty($_GET['name'])){
                        //     if (strpos($product['name'], $_GET['form-control me-2']) === false) {
                        //         continue;
                        //     }
                        // }
                        ?>
                        <a class='text-decoration-none' href="../customer/productDetail.php?product_id=<?= $product['product_id']; ?>">
                            <div class="col card">
                                <img src='<?php echo "../../../www/assets/images/".$product['image'] ?>' class='card-img-top'>
                                <div class="card-body d-flex justify-content-between ml-xl-3">
                                <span class='fw-bold'><?php echo $product['name']?></span>
                                <span class='fw-semibold'><?php echo $product['price']?></span>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
    </main>
    <footer>
        <?php 
            require("../layout/footer.php")
        ?>
    </footer>
</body>
</html>