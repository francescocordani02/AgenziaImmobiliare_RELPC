<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
$_SESSION['current_page'] = "information";
$IdAppartamento = $_GET['IdAppartamento'];
$row = Descrizione($IdAppartamento);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/header.php'; ?>
</head>

<body style="background-color: #171717;">
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
                                <img src="../img/logo.gif" class="rounded" alt="..." style="height:120px;margin-left:20px;padding-bottom:35px;">
                            </div>
                        </div>
                        <?php InformazioniAppartamento($IdAppartamento); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color:#171717">
            <div class="row">
                <div class="col-sm-8 m-4">
                    <div class="card" style="background-color:#171717; ">
                        <div class="card-body" style="margin-top: -17px; padding-bottom:35px;">
                            <h1 style="text-transform:uppercase;color:#d6ad60;"><?php echo $row['NomeApp']; ?></h1>
                            <h4 style="color:white;"><?php echo $row['Note']; ?>.</h4>
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
        <div class="container-fluid" style="background-color:#171717">
            <div class="row">
                <div class="col-sm-8 m-4">
                    <div class="card" style="background-color:#171717; color:white;">
                        <div class="card-body" style="padding-top:40px;">
                            <h1 style="color: #d6ad60">DISPONIBILITÀ DELL'APPARTAMENTO</h1>
                            <h3>L' <?php echo $row['NomeApp']; ?> è già affittato nei seguenti giorni: </h3>
                            <?php Disponibilità($IdAppartamento); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm m-4">
                    <div class="container1">
                        <?php
                        require '../config/appartamento.php';
                        $edu = new appartamento;
                        $coll = $edu->getApartmentsBlankLatLng();
                        $coll = json_encode($coll, true);
                        echo '<div id="data">' . $coll . '</div>';

                        $allData = $edu->getApartments();
                        $allData = json_encode($allData, true);
                        echo '<div id="allData">' . $allData . '</div>';
                        ?>
                        <div id="map"></div>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyTdYw74imZz4GrAbV0UwvRObPqohoNlY&callback=loadMap">
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include("../template/footer.php"); ?>
</body>

</html>