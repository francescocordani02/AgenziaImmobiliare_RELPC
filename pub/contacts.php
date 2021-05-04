<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
$_SESSION['current_page']="contacts";
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
        </div>
        <div class="container-fluid"style="text-align:center;padding-top:50px;max-width:1400px;">
            <div id="carouselExampleFade" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" style="border-style:solid;border-color:#d6ad60;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="https://www.prescompanies.com/images/slider/slider1.jpg" class="d-block w-100" alt="..."style="max-height:700px;">
                    </div>
                    <div class="carousel-item">
                    <img src="https://www.incimages.com/uploaded_files/image/1920x1080/getty_502211716_210176.jpg" class="d-block w-100" alt="..."style="max-height:700px;">
                    </div>
                    <div class="carousel-item">
                    <img src="https://s3-eu-west-1.amazonaws.com/askremax/129/c9a7dbd2-e547-6005-0965-3df9e7461f84.jpg" class="d-block w-100" alt="..."style="max-height:700px;">
                    </div>
                    <div class="carousel-item">
                    <img src="http://tynyrheolprimary.co.uk/wp-content/uploads/2021/02/4.jpg" class="d-block w-100" alt="..."style="max-height:700px;">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>';
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>';
                </div>
                    
            </div>
        </div>
        <div class="container-fluid"style="padding-top:50px;">
            <div class="row">
                <div class="col-xl-4 mt-4">
                    <div class="card" style="max-width:560px;text-align:center;background-color:#171717;color:white;border-style:solid;border-width:2px;border-color:#d6ad60;border-radius:0px;">
                        <img src="http://www.studiobuzzanca.it/images/imgufficio.jpg" class="card-img-top" alt="..."style="max-height:310px">
                            <div class="card-body">
                                <h5 class="card-title"style="color:#d6ad60;">Chi siamo?</h5>
                                <p class="card-text"><h5>Agenzia Immobiliare RELPC </h5></p>
                                <p class="card-text"><h5>La nostra agenzia mette  disposizione un'ampia gamma di immobili da affittare per brevi periodi per assecondare il flusso turistico-lavorativo della città.</h5></p>
                            </div>
                    </div>
                </div>
                <div class="col-xl-4 mt-4">
                    <div class="card" style="max-width:560px;text-align:center;background-color:#171717;color:white;border-style:solid;border-width:2px;border-color:#d6ad60;border-radius:0px;">
                        <img src="https://lavoro.lidl.it/images/variations/hero/7/5/3/0/87600357-1-ita-IT/16-9%20DR%20SOMAGLIA.jpg" class="card-img-top" alt="..."style="max-height:310x">
                            <div class="card-body">
                                <h5 class="card-title"style="color:#d6ad60;">Dove siamo?</h5>
                                <p class="card-text"><h5>Via Relcini n°24, Piacenza (PC)</h5></p>
                                <p class="card-text"><h5>Uffici situati nel pieno centro della città. I nostri agenti verranno direttamente da te per qualsiasi richiesta sugli immobili.</h5></p>
                            </div>
                    </div>
                </div>
                <div class="col-xl-4 mt-4">
                    <div class="card" style="max-width:560px;text-align:center;background-color:#171717;color:white;border-style:solid;border-width:2px;border-color:#d6ad60;border-radius:0px;">
                        <img src="https://www.abianco.it/wp-content/uploads/2020/01/Contact-us1.jpg" class="card-img-top" alt="..."style="max-height:310x">
                            <div class="card-body" style="padding-bottom:25px;">
                                <h5 class="card-title"style="color:#d6ad60;">Contatti:</h5>
                                <p class="card-text"><h5>Email: agenziaimmobiliare@RELPC.it</h5></p>
                                <p class="card-text"><h5>Lorenzo Losi: 📞 + 39 333 3333444</h5></p>
                                <p class="card-text"><h5>Lorenzo Pedegani: 📞 + 39 333 3333444</h5></p>
                                <p class="card-text"><h5>Francesco Cordani: 📞 + 39 333 3333444</h5></p>
                                <p class="card-text"><h5>Instagram: Agenzia_RELPC_Immobiliare</h5></p>
                                <p class="card-text"><h5>Contatta la nostra agenzia per qualsiasi richiesta, informazione o dubbio su qualsiasi immobile presente nel nostro sito web.</h5></p>
                            </div>
                    </div>
                </div>
            </div>
               
        </div>
    </div>
    <?php include '../template/footer.php'; ?>
</body>
</html>