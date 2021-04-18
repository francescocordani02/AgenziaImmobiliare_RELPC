<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
$_SESSION['current_page']="contacts";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include '../template/header.php'; ?>
</head>
<body style="background-color: #171717; ">
    <div class="content">
        <?php 
            include '../template/navbar.php';
        ?>
    </div>
    <?php include '../template/footer.php'; ?>
</body>
</html>