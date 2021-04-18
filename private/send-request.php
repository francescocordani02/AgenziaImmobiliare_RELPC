<?php
session_start();
if (!isset($_SESSION['IsAdmin']) || $_SESSION['IsAdmin'] != 0) {
  exit("Non puoi accedere a questa pagina");
}
$_SESSION['current_page'] = "confirm-rent-your-house";
define('mydal', TRUE);
include '../config/dal.php';
$titolo = $_POST['titolo'];
$prezzogiornaliero = $_POST['prezzo-giornaliero'];
$postiauto = $_POST['postiauto'];
$postiletto = $_POST['postiletto'];
$ncamere = $_POST['ncamere'];
$quartiere = $_POST['quartiere'];
$categoria = $_POST['categoria'];
$indirizzo = $_POST['indirizzo'];
$superficie = $_POST['superficie'];
$note = $_POST['note'];
$latitudine = $_POST['lat'];
$longitudine = $_POST['long'];
$idutente = $_SESSION['IdUtente'];
print_r($_FILES['my_image']);
?>
<html lang="it">

<head>
  <?php include '../template/header.php'; ?>
</head>

<body style="background-color: #171717">
  <div class="content">
    <?php include '../template/navbar.php'; ?>
    <div class="jumbotron text-center m-5">
      <?php InserisciRichiesta($_FILES['my_image'],$titolo, $prezzogiornaliero, $postiauto, $postiletto, $ncamere, $quartiere, $categoria, $indirizzo, $superficie, $note, $latitudine, $longitudine, $idutente);?>
      <hr>
      <p class="lead">
        <a class="btn btn-link btn-sm" href="../index.php" role="button">Torna alla home</a>
      </p>
    </div>
  </div>
  <?php
  include("../template/footer.php");
  ?>
</body>

</html>