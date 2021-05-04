<?php
session_start();
define('mydal', TRUE);
include '../config/dal.php';
if (isset($_SESSION['Username'])) {
  if ($_SESSION['IsAdmin'] == 0) {
    $_SESSION['current_page']="checkout";
    $IdImmobile = $_SESSION['IdAppartamento'];
    // $daterange = $_GET['daterange'];
    // $date=explode(' ',$daterange);
    // $datainizio =$date[0];
    // $datafine=$date[2];
    // $_SESSION['DataInizio'] = $datainizio;
    // $_SESSION['DataFine'] = $datafine;
    $datainizio = $_SESSION['DataInizio'];
    $datafine = $_SESSION['DataFine'];
    // ControllaData($IdImmobile, $datainizio, $datafine);
    $prezzoGiornaliero = $_SESSION['PrezzoGiorno'];
?>
<html lang="it">
<head>
  <title>Checkout</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php 
  include('../template/header.php');
  ?>
</head>
<body style="background-color: #171717">
<div class="content">
  <?php
  include ("../template/navbar.php");
  ?>
  <div class="row-checkout" >
    <div class="column-75">
      <div class="container-checkout" style="background-color:#171717;border-color:#d6ad60;">
        <div class="row-checkout">
          <form action="confirm-checkout.php" method="post">
            <div class="column-50">
              <h3 style="color:#d6ad60">PAGAMENTO</h3>
              <label for="fname" style="color: #171717">Carte accettate</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <br>
              <label for="cname" style="color: white;">Nome Carta</label>
              <input type="text" class="inputtypetext" id="cname" name="cardname" placeholder="John More Doe">
              <label for="ccnum" style="color: white">Numero carta di credito</label>
              <input type="text" class="inputtypetext" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth" style="color: white">Exp Mese</label>
              <input type="text" class="inputtypetext" id="expmonth" name="expmonth" placeholder="01">
              <div class="row-checkout">
                <div class="column-70">
                  <label for="expyear" style="color: white">Exp Anno</label>
                  <input type="text" class="inputtypetext" id="expyear" name="expyear" placeholder="2021" value="2021">
                </div>
                <div class="column-50">
                  <label for="cvv" style="color: white">CVV</label>
                  <input type="text" class="inputtypetext" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>
            <button type="submit" id="button" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717; margin-left:15px;">Effettua prenotazione</button>
          </form>
        </div>
      </div>
    </div>
    <div class="column-25">
      <div class="container-checkout" style="background-color:#171717;border-color:#d6ad60;">
        <p style="color: white; padding-top:20px;"><?php NomeCheckout($IdImmobile)?> affitto giornaliero:<span class="price" style="color: white">€<?php PrezzoCheckout($IdImmobile)?></span></p>
        <p style="color: white">N° Giorni:<span class="price" style="color: white"><?php CalcolaGiorni($datainizio, $datafine);?></span></p>
        <hr>
        <p style="color: white">Totale: <span class="price" style="color:black"><b style="color: white">€<?php CalcolaCostoTotale($datainizio, $datafine, $prezzoGiornaliero);?></b></span></p>
      </div>
    </div>
  </div>
</div>
<?php
include("../template/footer.php");
?>

</body></html>
<?php } else {
    if (isset($_SESSION['Username'])) {
      exit('<h3>Non puoi accedere a questa pagina, <a href="../admin/admin-homepage.php">torna alla homepage</a>.</h3>');
    } else {
      exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login</a> per poter accedere.</h3>');
    }
  }
} else {
  exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login</a> per poter accedere.</h3>');
} ?>