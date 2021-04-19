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
            <div class="container-fluid mt-4 mt-xl-0">
                <div class="row ">
                    <div class="col-7" style="text-align:right;color:#d6ad60;padding-top:20px;">
                        <h1>RISULTATI RICERCA</h1>
                    </div>
                    <div class="col-5">
                        <img src="../img/cerca_logo.png" class="img-fluid" alt="logo" style="height:100px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"style="background-color:#171717; padding-top:30px;">
            <div class="row">
                <div class="col-sm-4 m-4">
                    <div class="container"style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                        <div class="row">
                            <div class="col-12"style="padding-top:20px;text-align:center;">
                                <img src="../img/logo.gif" class="rounded" alt="..."style="width=170px;height:170px;padding-bottom:30px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="container">
                                    <form class="row g-3" action="research.php" style="text-align:center;color:white;padding-bottom:23px;padding-top:5px;height:500px;">
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
                                        <input type="text" id="date"name="daterange" value="<?php echo "date ('d/m/Y')";?>-<?php echo "date ('d/m/Y')";?>" style="width:420px;text-align:center;"/>
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
                <?php Appartamenti_Cercati($Quartiere,$Categoria,$PostiLetto,$PostiAuto,$AffittoMin,$AffittoMax,$SuperficieMin,$SuperficieMax,$DataInizio,$DataFine);?>
            </div>
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
    <?php include '../template/footer.php'; ?>
</body>
</html>