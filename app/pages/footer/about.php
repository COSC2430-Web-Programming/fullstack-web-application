<?php
  session_start()
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
    <title>About Us</title>
  </head>
  <body>
  <header class='col-12 p-0'>
      <div class="container">
        <?php 
          require('../layout/nav.php')
        ?>          
      </div>
      <div class='header_vendor'>
        <div class="color_overlay d-flex justify-content-center align-items-center">
          <div>
            <h3>ABOUT US</h3>
          </div>
        </div>
      </div>
    </header>
    <main>
    <div class='container mt-4'>
        <div class='row justify-content-center'>
          <div>
            <p>
                Founded in 2022, we are a team of 4 was determined to finish this project (because of the deadline!?!). 
                Our team met and instanly felt the connection between us. Sponsored from Lazada, we made it here where we have enought budget to develop our final touch.
            </p>
          </div>
          <div>
            <p>
              Starting from Nguyen Thanh Hoang Anh, our amazing team leader. She may seem a little bit clueless but deep down she is really smart and hard-working.
              She usually gives us the strangest ideas but she is always there to help when we are in need.
            </p>
          </div>
          <div>
            <p>
              Next up is our Project Assistant Nguyen Thanh Sang. He works perfectly well with Hoang Anh but he always makes sure to keep us on task, even though he is a bit tough.
              He is just like Hoang Anh, hard-working and always trying non-stop.
            </p>
          </div>
          <div>
            <p>
              Nguyen Le Bao Han is a wonderful teammate and developer. She is sporty and always energetic. She always reachs out for help and ask to help everyone else.
              She is also humble and fun to hang around.
            </p>
          </div>
          <div>
            <p>
              Last but not least, Tran Thuc Ai Quynh is also an important piece of this project. She may work slower than everyone else but still she tries hard to keep up with the team.
              She is good at brainstorming the broad idea of the project and is the final one to check the project.
            </p>
          </div>
        </div>
    </div>
    </main>
    <footer class="mt-4">
      <?php
        require('../layout/footer,php')
      ?>
    </footer>
  </body>