<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
$_SESSION['current_page']="research";
$Quartiere=$_GET['Quartiere'];
$Categoria=$_GET['Categoria'];
$PostiLetto=$_GET['PostiLetto'];
$AffittoMin=$_GET['AffittoMin'];
$AffittoMax=$_GET['AffittoMax'];
$PostiAuto=$_GET['PostiAuto'];
$SuperficieMin =$_GET['SuperficieMin'];
$SuperficieMax=$_GET['SuperficieMax'];
$daterange=$_GET['daterange'];
$date=explode(' ',$daterange);
$DataInizio =$date[0];
$DataFine=$date[2];

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include '../template/header.php'; ?>
</head>
<body style="background-color: #171717; ">
    <div class="content">
        <?php 
            include '../template/navbar.php'; 
        ?>
        <div class="title">
            <div class="row">
                <div class="col-7"style="text-align:right;color:#d6ad60;padding-top:20px;">
                    <h1>RISULTATI RICERCA</h1>
                </div>
                <div class="col-5">
                    <img src="../img/cerca_logo.png" class="img-fluid" alt="logo"style="height:100px;">
                </div>
            </div>
        </div>
        <?php Appartamenti_Cercati($Quartiere,$Categoria,$PostiLetto,$PostiAuto,$AffittoMin,$AffittoMax,$SuperficieMin,$SuperficieMax,$DataInizio,$DataFine);?>
        
    </div>
    <?php include '../template/footer.php'; ?>
</body>
</html>