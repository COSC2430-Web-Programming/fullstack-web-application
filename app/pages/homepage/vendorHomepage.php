<?php 
    session_start();
    if(!isset($_SESSION['user'])) {
        header("location: ../pages/login.php");
        exit();
    }

    if(isset($_GET['logout']) || isset($_GET['login'])) {
        unset($_SESSION['user']);
        header("location: ../pages/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Homepage</title>
</head>
<body>
    <?php 
        require('../layout/nav.php')
    ?>
    <div class="content">
        <h2>Welcome to your homepage <?php $_SESSION['user']; ?></h2>
        <a href="?logout">Log out</a>
    </div>
    
</body>
</html>