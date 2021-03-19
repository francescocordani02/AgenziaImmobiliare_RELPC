<?php
    session_start();
    $_SESSION['current_page']="index";
    include ("template/template.php");
    define('mydal', TRUE);
    include 'config/dal.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Homepage</title>
</head>
<body>
    
</body>
</html>