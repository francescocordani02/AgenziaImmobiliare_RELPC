<?php
session_start();
if (!isset($_SESSION['IsAdmin']) || $_SESSION['IsAdmin'] != 1) {
    header("location: ../login.php");
}
$_SESSION['current_page'] = "accept-refuse";
define('mydal', TRUE);
include '../config/dal.php';
$IdRichiesta = $_GET['IdRichiesta'];
$accettatoRifiutato = $_GET['Valore'];
if ($accettatoRifiutato == "Accetta") {
    $accept = AccettaRichiesta($IdRichiesta);
} else {
    $refuse = RifiutaRichiesta($IdRichiesta);
}
?>
<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
</head>

<body style="background-color: #171717">
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <div class="jumbotron text-center m-5">
            <?php if ($accettatoRifiutato == "Accetta") {
                echo '<h1 style="color:#d6ad60;">' . $accept . '</h1>';
            } else {
                echo '<h1 style="color:#d6ad60;">' . $refuse . '</h1>';
            } ?>
            <hr>
            <p class="lead">
                <a class="btn btn-link btn-sm" href="admin-homepage.php" role="button">Torna alla home</a>
            </p>
        </div>
    </div>
    <?php
    include("../template/footer.php");
    ?>
</body>

</html>