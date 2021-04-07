<?php
define('mydal', TRUE);
include_once 'config/dal.php';
session_start();
$_SESSION['current_page']="index";
include 'template/template.php';
$IdAppartamento =$_GET['IdAppartamento'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APARTMENT INFORMATION</title>
</head>
<body>
    <div class="container-fluid"style="background-color:#171717">
        <div class="row">
            <div class="col-sm-8 m-4">
                <?php CaroselloImmaginiAppartamento($IdAppartamento); ?>
            </div>
            <div class="col-sm m-4">
                <div class="container"style="border-style:solid; border-width:4px;border-color:#d6ad60;background-color:#171717;">
                    <div class="row">
                        <div class="col-12">
                            <h1 style="text-align:center; padding-top:23px;color:white;font-size:20px;padding-bottom:30px;">INFORMAZIONI APPARTAMENTO</h1>
                        </div>
                        <?php InformazioniAppartamento($IdAppartamento); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


















<?php include ("template/footer.php");?>   
</body>
</html>