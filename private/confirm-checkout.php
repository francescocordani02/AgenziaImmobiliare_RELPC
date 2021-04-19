<?php
session_start();
if(isset($_SESSION['Username']) == "") {
  header("location: ../login.php");
}
    $_SESSION['current_page']="confirm-checkout";
    define('mydal', TRUE);
    include '../config/dal.php';
    $intestatariocarta = $_POST['cardname'];
    $numerocarta = $_POST['cardnumber'];
    $mesescadenza = $_POST['expmonth'];
    $annoscadenza = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $datainizio = $_SESSION['DataInizio'];
    $datafine = $_SESSION['DataFine'];
    $prezzogiornaliero = $_SESSION['PrezzoGiorno'];
    $idutente = $_SESSION['IdUtente'];
    $idappartamento = $_SESSION['IdAppartamento'];
?>
<html lang="it">
<head>
  <title>Grazie</title>
  <?php 
  include('../template/header.php');
  ?>
</head>
<body style="background-color: #171717">
<div class="content">
<?php
include ("../template/navbar.php");
?>
  <div class="jumbotron text-center m-5">
    <?php InserisciPrenotazione($datainizio, $datafine, $prezzogiornaliero, $idappartamento, $idutente)?>
    <hr>
    <p class="lead">
      <a class="btn btn-link btn-sm" href="../index.php" role="button">Torna alla home</a>
    </p>
  </div>
</div>
<?php
include("../template/footer.php");
?>
</body></html>