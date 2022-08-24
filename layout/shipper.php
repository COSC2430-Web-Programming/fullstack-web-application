<?php 
  $data=[
    ['OrderID',"Address","Date"],
    ['1','359 Le Dai Hanh',"22/8/2022"],
    ['2','359 Le Dai Hanh',"22/8/2022"]
  ];

  function make_tbl($data){
    $tbl_array = [];
    $tbl_array[] = "<table>";
    foreach($data as $row ){
      $tbl_array[] = "<tr>";
      foreach($row as $cell){
        $tbl_array[] = "<td>$cell</td>";
      }
      $tbl_array[] = "</tr>";
    }
    $tbl_array[] = "</table>";

    return implode('', $tbl_array);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <header class='col-12 p-0'>
      <?php 
        require('header.php')
      ?>
      <div class='header_p'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>SHIPPING PAGE</h3>
          </div>
        </div>
      </div>
    </header>
    <div class='container bg-primary mt-4'>
      <div class='row justify-content-center'>
            <div class='mb-4'>
                <h2 class="col-12 text-center ">ORDER</h2>
            </div>
            <div class="col-lg-10 bg-danger">
              <?= make_tbl($data) ?>
            </div>
    </div>
  </body>
</html>