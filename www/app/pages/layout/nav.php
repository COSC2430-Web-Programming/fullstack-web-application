<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laza</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light border-dark border-bottom">
    <div class="hstack gap-3">
      <div>
        <a class="navbar-brand display-1" href="#">
          <img class="logo" src="../../../assets/images/logo.jpeg" />
        </a>
      </div>
      <div>LAZA</div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <i class="bi bi-list text-dark"></i>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
       <ul class="navbar-nav ms-auto">
         <li class="nav-item ms-auto">
           <?php 
            if(isset($_SESSION['user'])) {
              echo '<a href="../allRoles/myAccount.php" class="nav-link">My Account</a>';
            }else{
              echo '<a href="../login.php" class="nav-link">Login</a>';
            };
            ?>
        </li>
        <li class="nav-item ms-auto">
          <a href="../logout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </div>
</nav>
</body>
</html>


