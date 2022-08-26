<!doctype html>
<html lang="en">
  <head>
  <head>
    <title>Add New Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
  </head>
  </head>
  <body>
    <div class="container mt-4">
        <?php 
            require('nav.php')
        ?>
        <div class="row justify-content-center">
            <div class="mb-4">
                <h2 class="col-12 text-center"> ADD NEW PRODUCT</h2>
            </div>
            <div class="col-10">
                <form action="" class="col-sm-10 col-lg-8 form mx-auto" enctype="multipart/form-data" name='addNewProductForm' method='post'>
                    <div class="mb-4">
                        <label for="productName" class="font-weight-bold pb-3">Name</label>
                        <input name="productName" type="text" class="form-control w-100" id="productName" placeholder="Product Name">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="font-weight-bold pb-3">Price</label>
                        <input name="price" type="number" class="form-control w-100" id="price" placeholder="Price">
                    </div>
                    <div class="form floating mb-4">
                        <label for="description" class="font-weight-bold pb-3">Description</label>
                        <textarea class="form-control w-100" placeholder="Leave a description here" id="description"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="productImg" class="font-weight-bold pb-3">Product Image</label>
                        <input name="productImg" type="file" class="form-control w-100" id="productImg">
                    </div>
                    <div class="mb-4 row justify-content-center">
                        <input name='save' value="Save" type="submit" class=" col-lg-8 btn btn-outline-dark " id="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
  <script src="libs/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>