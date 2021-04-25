<?php
session_start();
if (isset($_SESSION['Username']) == "") {
  header("location: ../pub/login.php");
}
    $_SESSION['current_page']="checkout";
    define('mydal', TRUE);
    include '../config/dal.php';
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
  <div class="row-checkout">
    <div class="column-75">
      <div class="container-checkout">
        <div class="row-checkout">
          <form action="confirm-checkout.php" method="post">
            <div class="column-50">
              <h3>Payment</h3>
              <label for="fname" style="color: #171717">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <br>
              <label for="cname" style="color: #171717">Name on Card</label>
              <input type="text" class="inputtypetext" id="cname" name="cardname" placeholder="John More Doe">
              <label for="ccnum" style="color: #171717">Credit card number</label>
              <input type="text" class="inputtypetext" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth" style="color: #171717">Exp Month</label>
              <!-- <select type="text" class="form-select" id="expmonth" name="expmonth" placeholder="00">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option> -->
              <input type="text" class="inputtypetext" id="expmonth" name="expmonth" placeholder="01">
              <div class="row-checkout">
                <div class="column-50">
                  <label for="expyear" style="color: #171717">Exp Year</label>
                  <input type="text" class="inputtypetext" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="column-50">
                  <label for="cvv" style="color: #171717">CVV</label>
                  <input type="text" class="inputtypetext" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>
            <input type="submit" value="Effettua prenotazione" class="btn1">
          </form>
        </div>
      </div>
    </div>
    <div class="column-25">
      <div class="container-checkout">
        <p><?php NomeCheckout($IdImmobile)?><span class="price">€<?php PrezzoCheckout($IdImmobile)?></span></p>
        <p>Giorni<span class="price"><?php CalcolaGiorni($datainizio, $datafine);?></span></p>
        <hr>
        <p>Totale <span class="price" style="color:black"><b>€<?php CalcolaCostoTotale($datainizio, $datafine, $prezzoGiornaliero);?></b></span></p>
      </div>
    </div>
  </div>
</div>
<?php
include("../template/footer.php");
?>

</body></html>