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
                            <div class="col-12">
                                <h1 style="text-align:center; padding-top:50px;color:white;font-size:25px;">INFORMAZIONI APPARTAMENTO</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="padding-top:20px;">
                                <img src="../image/logo.gif" class="rounded mx-auto d-block" alt="..." style="height:120px;margin-top:-10px;">
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
                    <div class="card-body" style="padding-top:0px;">
                        <?php Descrizione($IdAppartamento); ?>
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