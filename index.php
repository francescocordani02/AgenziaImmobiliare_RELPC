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
            <div class="col-xl-8 px-0 px-md-auto p-md-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
            <div class="col-xl-4 mt-4">
                <div class="container"style="border-style:solid; max-width:560px; float: left;border-width:4px;border-color:#d6ad60;">
                    <div class="row">
                        <div class="col-12">
                            <h1 style="text-align:center; padding-top:23px;color:white;">AGENZIA IMMOBILIARE RELPC</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <form class="row g-3" action="pub/research.php" style="text-align:center;color:white;padding-bottom:23px;padding-top:5px;">
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Quartiere:</label>
                                    <select id="inputState" class="form-select" name="Quartiere" >
                                    <?php SelezionaQuartieri(); ?>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Categoria:</label>
                                    <select id="inputState" class="form-select" name="Categoria" >
                                    <?php SelezionaCategorie();?>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Posti Letto:</label>
                                    <select id="inputState" class="form-select" name="PostiLetto" >
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
                                        <select id="inputState" class="form-select" name="AffittoMin" >
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
                                    <select id="inputState" class="form-select" name="AffittoMax" >
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
                                    <select id="inputState" class="form-select" name="PostiAuto" >
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="inputState" class="form-label">Superficie min:</label>
                                    <select id="inputState" class="form-select" name="SuperficieMin">
                                        <option>60</option>
                                        <option>80</option>
                                        <option>100</option>
                                        <option>120</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="inputState" class="form-label">Supeficie max:</label>
                                    <select id="inputState" class="form-select" name="SuperficieMax">
                                        <option>140</option>
                                        <option>160</option>
                                        <option>180</option>
                                        <option>200</option>
                                    </select>
                                    </div>
                                    <div class="col-md-12">
                                    <label for="daterange" class="form-label">Range Date:</label>
                                    <input type="text" id="date"name="daterange" value="<?php echo "date ('d/m/Y')";?>-<?php echo "date ('d/m/Y')";?>" style="max-width:370px;text-align:center;"/>
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
            <div class="col-xl-8 px-0 px-md-auto p-md-4">
                <div class="card"style="background-color:#171717; color:white;" >
                    <div class="card-body"style="padding-top:40px;">
                        <h1>CERCHI APPARTAMENTI PER BREVI PERIODI DI TEMPO?</h1>
                        <h3>La soluzione siamo noi.</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mt-4">
                <div class="container-fluid" style="border-style:solid; max-width:560px; float:left;border-width:4px;border-color:#d6ad60;">
                    <div class="card text-center"style="padding-top:13px;  background-color:#171717;">
                        <div class="card-body">
                            <h5 class="card-title"style="color:white;">PUBBLICA UN ANNUNCIO</h5>
                            <p class="card-text"style="color:white;">Immobile da affittare? Invia una richiesta di pubblicazione.</p>
                            <a href="<?php if(isset($_SESSION['Username']) && $_SESSION['IsAdmin']==0){echo 'private/rent-your-house.php';}else{echo 'pub/login.php';}?>" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">RICHIEDI</a>
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