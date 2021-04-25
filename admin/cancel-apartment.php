<?php
session_start();
if (isset($_SESSION['Username']) == "") {
  header("location: ../pub/login.php");
}
$_SESSION['current_page'] = "cancel-apartment";
define('mydal', TRUE);
include '../config/dal.php';
$IdAppartamento=$_GET['IdAppartamento']
?>
<html lang="it">

<head>
  <?php include '../template/header.php'; ?>
</head>

<body style="background-color: #171717">
  <div class="content">
    <?php include '../template/navbar.php'; ?>
    <div class="jumbotron text-center m-5">
      <?php EliminaAppartamento($IdAppartamento);?>
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