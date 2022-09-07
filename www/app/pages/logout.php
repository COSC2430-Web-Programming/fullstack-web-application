<?php
    session_start();
    unset($_SESSION['user']); // q: using unset or destroy?
    header("location:login.php");
?>