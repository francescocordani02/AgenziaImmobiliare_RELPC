<?php
session_start();
$_SESSION['current_page'] = "to-admin";
define('mydal', TRUE);
if (isset($_SESSION['Username'])) {
  if ($_SESSION['IsAdmin'] == 1) {
include '../config/dal.php';
$IdUtente=$_GET['IdUtente'];
$PoniAdmin=$_GET['PoniAdmin'];
?>
<html lang="it">

<head>
  <?php include '../template/header.php'; ?>
</head>

<body style="background-color: #171717">
  <div class="content">
    <?php include '../template/navbar.php'; ?>
    <div class="jumbotron text-center m-5">
      <?php PoniRimuoviAdmin($PoniAdmin, $IdUtente);?>
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
<?php } else {
        if (isset($_SESSION['Username'])) {
            exit('<h3>Non puoi accedere a questa pagina, <a href="../index.php">torna alla homepage</a>.</h3>');
        } else {
            exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login come admin</a> per poter accedere.</h3>');
        }
    }
} else {
    exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login come admin</a> per poter accedere.</h3>');
} ?>