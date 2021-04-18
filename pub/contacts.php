<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
$_SESSION['current_page']="research";
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <h1 style="color:#d6ad60;text-align:center;">AGENZIA IMMOBILIARE RELPC</h1>
                </div>
            </div>
            <div class="container-fluid"style="padding-top:60px;">
                <div class="row">
                    <div class="col-sm">
                        <img src="../img/contatti6.jpg" class="img-fluid" alt="img" style="width:100%;height:542px;">
                    </div>
                    <div class="col-sm">
                        <div class="container-fluid"style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                            <div class="row">
                                <div class="col"style="text-align:center;color:white;padding-top:20px;color:#d6ad60;">
                                    <h3>CONTATTACI</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="text-align:center;color:white;padding-top:15px;">
                                    <dt><h5>Numero Aziendale:</h5></dt>
                                    <dd><h5>☏ 0523 55555</h5></dd>
                                </div>
                                <div class="col-6" style="text-align:center;color:white;padding-top:15px;">
                                    <dt><h5>Lorenzo Losi:</h5></dt>
                                    <dd><h5>✆ +39 44444 55555</h5></dd>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="text-align:center;color:white;padding-top:15px;">
                                    <dt><h5>Lorenzo Pedegani:</h5></dt>
                                    <dd><h5>✆ +39 55555 55555</h5></dd>
                                </div>
                                <div class="col-6" style="text-align:center;color:white;padding-top:15px;">
                                    <dt><h5>Francesco Cordani:</h5></dt>
                                    <dd><h5>✆ +39 66666 55555</h5></dd>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"style="text-align:center;color:white;padding-top:20px;color:#d6ad60;">
                                    <h3>DOVE SIAMO?</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"style="text-align:center;color:white;padding-top:20px;">
                                    <h5>Via Massimo Corneliani N°23 - 29122 Piacenza (PC)</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"style="text-align:center;color:white;padding-top:20px;padding-bottom:20px;">
                                    <img src="../img/contatti5.jpg" class="img-fluid" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="container-fluid"style="padding-top:30px;">
                <div class="row">
                    <div class="col-8">
                        <div class="card"style="background-color:#171717;color:white;padding-top:30px;">
                            <div class="card-body">
                                <h3 style="font-size:35px;">CERCHI L'APPARTAMENTO DEI TUOI SOGNI? LA SOLUZIONE SIAMO NOI.<h3>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <img src="../img/logo.gif" class="rounded " alt="img"style="height:170px;padding-bottom:20px;">
                    </div>
                    <div class="col-sm">
                        <div class="container-fluid"style="border-style:solid; border-width:4px;border-color:#d6ad60;margin-top:10px;">
                            <h3 style="text-align:center;color:#d6ad60;padding-top:20px;">EMAIL</h3>
                            <h5 style="text-align:center;color:white;padding-bottom:20px;">agenziaimmobiliare@RELPC.com</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../template/footer.php'; ?>
</body>
</html>