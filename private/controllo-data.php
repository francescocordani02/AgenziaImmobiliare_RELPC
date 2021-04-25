<?php
session_start();
if (isset($_SESSION['Username']) == "") {
    header("location: ../pub/login.php");
}
$_SESSION['current_page'] = "scelta-data";
define('mydal', TRUE);
include '../config/dal.php';
$IdImmobile = $_SESSION['IdAppartamento'];
$daterange = $_GET['daterange'];
$date = explode(' ', $daterange);
$datainizio = $date[0];
$datafine = $date[2];
$_SESSION['DataInizio'] = $datainizio;
$_SESSION['DataFine'] = $datafine;
?>
<html lang="it">

<head>
    <title>Data</title>
    <?php
    include('../template/header.php');
    ?>
</head>

<body style="background-color: #171717">
    <div class="content">
        <?php
        include("../template/navbar.php");
        ?>
        <div class="jumbotron text-center m-5">
            <?php
            ControllaData($IdImmobile, $datainizio, $datafine);
            ?>
        </div>
    </div>
    <?php
    include("../template/footer.php");
    ?>
</body>

</html>