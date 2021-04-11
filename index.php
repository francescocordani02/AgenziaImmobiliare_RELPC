<?php
define('mydal', TRUE);
include_once 'config/dal.php';
session_start();
$_SESSION['current_page']="index";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'template/header.php';?>
</head>
<body>
    <?php include 'template/navbar.php'; ?>
   <div class="container-fluid"style="background-color:#171717">
        <div class="row">
            <div class="col-sm-8 m-4">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="img/carosello1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carosello2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carosello3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carosello4.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm m-4">
                <div class="container"style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="row">
                        <div class="col-8">
                            <h1 style="text-align:center; padding-top:23px;color:white;">AGENZIA IMMOBILIARE RELPC</h1>
                        </div>
                        <div class="col-4"style="padding-top:20px;">
                        <img src="img/logo.gif" class="rounded" alt="..."style="width=170px;height:170px;margin-left:-10px;padding-bottom:30px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <form class="row g-3" style="text-align:center;color:white;padding-bottom:23px;padding-top:5px;">
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Quartiere:</label>
                                    <select id="inputState" class="form-select">
                                    <?php SelezionaQuartieri(); ?>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Categoria:</label>
                                    <select id="inputState" class="form-select">
                                    <?php SelezionaCategorie();?>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Posti Letto:</label>
                                    <select id="inputState" class="form-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Affitto min:</label>
                                        <select id="inputState" class="form-select">
                                            <option>40</option>
                                            <option>60</option>
                                            <option>80</option>
                                            <option>100</option>
                                            <option>120</option>
                                            <option>140</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Affitto max:</label>
                                    <select id="inputState" class="form-select">
                                        <option>160</option>
                                        <option>180</option>
                                        <option>200</option>
                                        <option>220</option>
                                        <option>240</option>
                                        <option>260</option>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Posti auto:</label>
                                    <select id="inputState" class="form-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="inputState" class="form-label">Superficie min:</label>
                                    <select id="inputState" class="form-select">
                                        <option>60</option>
                                        <option>80</option>
                                        <option>100</option>
                                        <option>120</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="inputState" class="form-label">Supeficie max:</label>
                                    <select id="inputState" class="form-select">
                                        <option>140</option>
                                        <option>160</option>
                                        <option>180</option>
                                        <option>200</option>
                                    </select>
                                    </div>
                                    <div class="col-md-12">
                                    <label for="daterange" class="form-label">Range Date:</label>
                                    <input type="text" id="date"name="daterange" value="<?php echo "date ('d/m/Y')";?>-<?php echo "date ('d/m/Y')";?>" style="width:370px;text-align:center;"/>
                                    </div>
                                    <div class="col-12">
                                    <button type="submit" id="button" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">RICERCA</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="container-fluid"style="background-color:#171717">
        <div class="row">
            <div class="col-sm-8 m-4">
                <div class="card"style="background-color:#171717; color:white;" >
                    <div class="card-body"style="padding-top:40px;">
                        <h1>CERCHI APPARTAMENTI PER BREVI PERIODI DI TEMPO?</h1>
                        <h3>La soluzione siamo noi.</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm m-4">
                <div class="container" style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="card text-center"style="padding-top:13px; background-color:#171717;">
                        <div class="card-body">
                            <h5 class="card-title"style="color:white;">PUBBLICA UN ANNUNCIO</h5>
                            <p class="card-text"style="color:white;">Immobile da affittare? Invia una richiesta di pubblicazione.</p>
                            <a href="#" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">RICHIEDI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="container-fluid" style="background-color:#171717";>
        <div class="row">
            <?php AppartamentiHomepage();?>                                                                                               
        </div>
   </div>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<?php include ("template/footer.php");?>
</body>
</html>