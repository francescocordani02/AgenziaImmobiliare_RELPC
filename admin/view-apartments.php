<?php
define('mydal', TRUE);
include '../config/dal.php';
session_start();
if (isset($_SESSION['Username']) == "") {
  header("location: ../pub/login.php");
}
$_SESSION['current_page'] = "view-apartments";
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include '../template/header.php'; ?>
  <script src="../js/index.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body style="background-color: #171717;">
  <div class="content">
    <?php include '../template/navbar.php'; ?>
    <h2 class="titolo">Lista appartamenti</h2>
    <div class="container">
      <table id="tableData" class="table table-bordered" style="color:white; background-color:#171717; border:2px solid #d6ad60;">
        <thead>
          <tr>
            <th class="th-sm">Nome appartamento</th>
            <th class="th-sm">Indirizzo</th>
            <th class="th-sm">Quartiere</th>
            <th class="th-sm">Categoria</th>
            <th class="th-sm">Superficie</th>
            <th class="th-sm">Prezzo giornaliero</th>
            <th class="th-sm">Proprietario</th>
            <th class="th-sm">Posti auto</th>
            <th class="th-sm">Posti letto</th>
            <th class="th-sm">Vedi</th>
            <th class="th-sm">Elimina</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $tabella = OttieniAppartamenti();
          echo $tabella;
          ?>
        </tbody>
      </table>
    </div>
    <div class="container-fluid d-flex justify-content-center">
      <div class="col-sm-4 m-4">
        <div class="card text-center" style="background-color:#171717;">
          <div class="card-body">
            <a href="rent-new-house.php" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717;">Affitta nuovo appartamento</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include '../template/footer.php'; ?>
</body>

</html>