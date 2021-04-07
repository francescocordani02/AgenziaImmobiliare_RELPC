<?php
session_start();
$_SESSION['current_page'] = "view-apartments";
include("../template/template.php");
define('mydal', TRUE);
include '../config/dal.php';
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <title>View Rent</title>
  <script src="../js/scriptpaginazione.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body style="background-color: #171717;">
  <div class="content">
    <h3 class="titolo">Lista appartamenti</h3>
    <div class="container">
      <table class="table" style="color:white; background-color:#171717; border:2px solid #d6ad60;">
        <thead>
          <tr>
            <th class="th-sm">Posti auto</th>
            <th class="th-sm">Posti Letto</th>
            <th class="th-sm">Numero Camere</th>
            <th class="th-sm">Indirizzo</th>
            <th class="th-sm">Note</th>
            <th class="th-sm">Prezzo Giorno</th>
            <th class="th-sm">dpc</th>
            <th class="th-sm">Superficie</th>
            <th class="th-sm">Vedi Appartamento</th>
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
  </div>
  <?php include("../template/footer.php"); ?>
</body>
</html>