<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
$_SESSION['current_page'] = "information";
$IdAppartamento = $_GET['IdAppartamento'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/header.php'; ?>
    <title>APARTMENT INFORMATION</title>
</head>

<body>
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <div class="container-fluid" style="background-color:#171717">
            <div class="row">
                <div class="col-sm-8 m-4">
                    <?php CaroselloImmaginiAppartamento($IdAppartamento); ?>
                </div>
                <div class="col-sm m-4">
                    <div class="container" style="border-style:solid; border-width:4px;border-color:#d6ad60;background-color:#171717;">
                        <div class="row">
                            <div class="col-8">
                                <h1 style="text-align:center; padding-top:50px;color:white;font-size:17px;padding-left:40px;">INFORMAZIONI APPARTAMENTO</h1>
                            </div>
                            <div class="col-4" style="padding-top:20px;">
                                <img src="../image/logo.gif" class="rounded" alt="..." style="height:120px;margin-left:20px;padding-bottom:35px;">
                            </div>
                        </div>
                        <?php InformazioniAppartamento($IdAppartamento); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color:#171717">
        <div class="row">
            <div class="col-sm-8 m-4">
                <div class="card" style="background-color:#171717; color:white;">
                    <div class="card-body" style="padding-top:40px;">
                        <h1>CERCHI APPARTAMENTI PER BREVI PERIODI DI TEMPO?</h1>
                        <h3>La soluzione siamo noi.</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm m-4">
                <div class="container" style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="card text-center" style="padding-top:13px; background-color:#171717;">
                        <div class="card-body">
                            <h5 class="card-title" style="color:white;">ZONA DELL'APPARTAMENTO</h5>
                            <?php Zona($IdAppartamento); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../template/footer.php"); ?>
</body>

</html>