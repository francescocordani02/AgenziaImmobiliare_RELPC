<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
if (!isset($_SESSION['IsAdmin']) || $_SESSION['IsAdmin'] != 1) {
    exit("Non puoi accedere a questa pagina");
}
$_SESSION['current_page'] = "view-requests";
$IdRichiesta = $_GET['IdRichiesta'];
$rowinfo = InformazioniRichiesta($IdRichiesta);
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
</head>

<body style="background-color:#171717">
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <div class="container-fluid" style="background-color:#171717;padding-top:10px;">
            <div class="row">
                <div class="col-xl-8 px-0 px-md-auto p-md-4">
                    <?php CaroselloImmaginiRichiesta($IdRichiesta); ?>
                </div>
                <div class="col-xl-4 mt-4">
                    <div class="container-fluid mt-4 mt-xl-0" style="border-style:solid; border-width:4px;border-color:#d6ad60;background-color:#171717;">
                        <div class="row">
                            <div class="col-12">
                                <h1 style="text-align:center; padding-top:30px;color:#d6ad60;font-size:25px;">INFORMAZIONI RICHIESTA</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="padding-top:20px;">
                                <img src="../img/logo.gif" class="rounded mx-auto d-block" alt="..." style="height:180px;margin-top:-10px;">
                            </div>
                        </div>
                        <div class="row align-items-center" style="font-size:18px;">
                            <div class="col" style="margin-left:10px;">
                                <dl style="color:white;text-align:center;">
                                    <dt style="color:#d6ad60;">
                                        <h5>Categoria:</h5>
                                    </dt>
                                    <dd>
                                        <h5><?php echo $rowinfo['Categoria']; ?></h5>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col">
                                <dl style="color:white;text-align:center;">
                                    <dt style="color:#d6ad60;">
                                        <h5>Superficie:</h5>
                                    </dt>
                                    <dd>
                                        <h5><?php echo $rowinfo['Superficie']; ?>mq</h5>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row align-items-center" style="margin-left:0px;font-size:18px;">
                            <div class="col">
                                <dl style="color:white;text-align:center;">
                                    <dt style="color:#d6ad60;">
                                        <h5>Numero camere:</h5>
                                    </dt>
                                    <dd>
                                        <h5><?php echo $rowinfo['NumeroCamere']; ?></h5>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col">
                                <dl style="color:white;text-align:center;">
                                    <dt style="color:#d6ad60;">
                                        <h5>Posti letto:</h5>
                                    </dt>
                                    <dd>
                                        <h5><?php echo $rowinfo['PostiLetto']; ?></h5>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row align-items-center" style="margin-left:0px;">

                            <div class="col">
                                <dl style="color:white;text-align:center;">
                                    <dt style="color:#d6ad60;">
                                        <h5>Parcheggi:</h5>
                                    </dt>
                                    <dd>
                                        <h5><?php echo $rowinfo['Parcheggio']; ?></h5>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col">
                                <dl style="color:white;text-align:center;">
                                    <dt style="color:#d6ad60;">
                                        <h5>Prezzo Giorno:</h5>
                                    </dt>
                                    <dd>
                                        <h5><?php echo $rowinfo['PrezzoGiorno']; ?> €</h5>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row align-items-center" style="margin-left:0px;">
                            <div class="col" style="text-align:center;padding-bottom:50px;padding-top:30px;">
                                <a type="submit" id="button" class="btn btn-warning" href="accept-refuse.php?IdRichiesta=<?php echo $IdRichiesta; ?>&Valore=Accetta" style="color:#d6ad60;width:100px;border: radius 5px;border-color:#d6ad60;background-color:#171717;">ACCETTA</a>
                                <a type="submit" id="button" class="btn btn-warning" href="accept-refuse.php?IdRichiesta=<?php echo $IdRichiesta; ?>&Valore=Rifiuta" style="color:#d6ad60;width:100px;border: radius 5px;border-color:#d6ad60;background-color:#171717;">RIFIUTA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color:#171717">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="card" style="background-color:#171717; ">
                        <div class="card-body" style="margin-left:3px;">
                            <h1 style="text-transform:uppercase;color:#d6ad60;"><?php echo $rowinfo['NomeApp']; ?></h1>
                            <h4 style="color:white;"><?php echo $rowinfo['Note']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-fluid" style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                        <div class="card text-center" style="padding-top:10px; background-color:#171717;">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#d6ad60;">ZONA APPARTAMENTO</h5>
                                <?php ZonaRichiesta($IdRichiesta); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color:#171717">
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="container-fluid" style="height:100%;border-color:#171717;margin-left:-10px;">
                    <?php
                        require '../config/richiesta.php';
                        $edu = new richiesta;
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
                <div class="col-md-6">
                    <div class="container-fluid" style="border-style:solid; border-width:4px;border-color:#d6ad60;background-color:#171717;">
                        <div class="row">
                            <div class="col-12">
                                <h1 style="text-align:center; padding-top:20px;color:#d6ad60;font-size:25px;">PROPRIETARIO APPARTAMENTO</h1>
                            </div>
                        </div>
                        <?php ProprietarioRichiesta($IdRichiesta); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../template/footer.php'; ?>
</body>

</html>