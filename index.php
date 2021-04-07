<?php
include_once 'config/connection.php';
session_start();
$_SESSION['current_page']="index";
include 'template/template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script  type = "text/javascript"  src ="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script  type = "text/javascript" src ="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script  type = "text/javascript"  src ="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel = "stylesheet" type = "text/css"  href ="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

</head>
<body>
   <div class="container-fluid"style="background-color:#171717">
        <div class="row">
            <div class="col-sm-8 m-3">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="image/carosello1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="image/carosello2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="image/carosello3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="image/carosello4.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm m-3">
                <div class="container"style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="row">
                        <div class="col-8">
                            <h1 style="text-align:center; padding-top:23px;color:white;">AGENZIA IMMOBILIARE RELPC</h1>
                        </div>
                        <div class="col-4"style="padding-top:20px;">
                        <img src="image/logo.gif" class="rounded" alt="..."style="width=170px;height:170px;margin-left:-10px;padding-bottom:30px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <form class="row g-3" style="text-align:center;color:white;padding-bottom:23px;padding-top:5px;">
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Quartiere:</label>
                                    <select id="inputState" class="form-select">
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="inputState" class="form-label">Categoria:</label>
                                    <select id="inputState" class="form-select">
                                        <option>...</option>
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
                                    <input type="text" id="data"name="daterange" value="<?php echo "date ('d/m/Y')";?>-<?php echo "date ('d/m/Y')";?>" style="width:370px;text-align:center;"/>
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
            <div class="col-sm-8 m-3">
                <div class="card"style="background-color:#171717; color:white;" >
                    <div class="card-body"style="padding-top:40px;">
                        <h1>CERCHI APPARTAMENTI PER BREVI PERIODI DI TEMPO?</h1>
                        <h3>La soluzione siamo noi.</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm m-3">
                <div class="container" style="border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="card text-center"style="padding-top:13px; background-color:#171717;">
                        <div class="card-body">
                            <h5 class="card-title"style="color:white;">PUBBLICA UN ANNUNCIO</h5>
                            <p class="card-text"style="color:white;">Devi affittare un tuo immobile? Richiedi all'agenzia che valuterà la tua richiesta.</p>
                            <a href="#" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">PUBBLICA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="container-fluid" style="background-color:#171717";>
        <div class="row">
            <div class="col-sm m-4">
                <div class="card" style="width:560px;text-align:center;background-color:#171717;color:white;border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="card-body">
                        <img src="<?php $conn=Connettiti();
                            $query= $conn->query("SELECT Immagine FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE IdAppartamento=1");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo ''.$row['Immagine'].'';
                                }
                            } 
                        ?>" class="card-img-top" alt="img">
                        <h5 class="card-title"style="padding-top:15px;">
                        <?php $conn=Connettiti();
                        $query= $conn->query("SELECT Categoria FROM categorie INNER JOIN appartamenti ON IdCategoria=FK_IdCategoria WHERE IdAppartamento=1");
                        if($query->num_rows>0){
                            while($row =$query->fetch_assoc()){
                                echo ''.$row['Categoria'].'';
                            }
                        } 
                        ?>
                        </h5>
                        <p class="card-text">
                        <?php $conn=Connettiti();
                            $query= $conn->query("SELECT Note FROM appartamenti  WHERE IdAppartamento=1");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo ''.$row['Note'].'';
                                }
                            } 
                        ?>
                        </p>
                        <p class="card-text">
                        <?php $conn=Connettiti();
                            $query= $conn->query("SELECT PrezzoGiorno FROM appartamenti  WHERE IdAppartamento=1");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo 'prezzo giornaliero: '.$row['PrezzoGiorno'].'€';
                                }
                            } 
                        ?>
                        </p>
                        <a href="#" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>
                    </div>
                </div>
            </div>
            <div class="col-sm m-4">
                <div class="card" style="width:560px;text-align:center;background-color:#171717;color:white;border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="card-body">
                        <img src="<?php $conn=Connettiti();
                            $query= $conn->query("SELECT Immagine FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE IdAppartamento=2");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo ''.$row['Immagine'].'';
                                }
                            } 
                        ?>" class="card-img-top" alt="img">
                        <h5 class="card-title"style="padding-top:15px;">
                        <?php $conn=Connettiti();
                        $query= $conn->query("SELECT Categoria FROM categorie INNER JOIN appartamenti ON IdCategoria=FK_IdCategoria WHERE IdAppartamento=2");
                        if($query->num_rows>0){
                            while($row =$query->fetch_assoc()){
                                echo ''.$row['Categoria'].'';
                            }
                        } 
                        ?>
                        </h5>
                        <p class="card-text">
                        <?php $conn=Connettiti();
                            $query= $conn->query("SELECT Note FROM appartamenti  WHERE IdAppartamento=2");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo ''.$row['Note'].'';
                                }
                            } 
                        ?>
                        </p>
                        <p class="card-text">
                        <?php $conn=Connettiti();
                            $query= $conn->query("SELECT PrezzoGiorno FROM appartamenti  WHERE IdAppartamento=2");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo 'prezzo giornaliero: '.$row['PrezzoGiorno'].'€';
                                }
                            } 
                        ?>
                        </p>
                        <a href="#" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>
                    </div>
                </div>
            </div>
            <div class="col-sm m-4">
                <div class="card" style="width:560px;text-align:center;background-color:#171717;color:white;border-style:solid; border-width:4px;border-color:#d6ad60;">
                    <div class="card-body">
                        <img src="<?php $conn=Connettiti();
                            $query= $conn->query("SELECT Immagine FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE IdAppartamento=1");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo ''.$row['Immagine'].'';
                                }
                            } 
                        ?>" class="card-img-top" alt="img">
                        <h5 class="card-title"style="padding-top:15px;">
                        <?php $conn=Connettiti();
                        $query= $conn->query("SELECT Categoria FROM categorie INNER JOIN appartamenti ON IdCategoria=FK_IdCategoria WHERE IdAppartamento=1");
                        if($query->num_rows>0){
                            while($row =$query->fetch_assoc()){
                                echo ''.$row['Categoria'].'';
                            }
                        } 
                        ?>
                        </h5>
                        <p class="card-text">
                        <?php $conn=Connettiti();
                            $query= $conn->query("SELECT Note FROM appartamenti  WHERE IdAppartamento=1");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo ''.$row['Note'].'';
                                }
                            } 
                        ?>
                        </p>
                        <p class="card-text">
                        <?php $conn=Connettiti();
                            $query= $conn->query("SELECT PrezzoGiorno FROM appartamenti  WHERE IdAppartamento=1");
                            if($query->num_rows>0){
                                while($row =$query->fetch_assoc()){
                                    echo 'prezzo giornaliero: '.$row['PrezzoGiorno'].'€';
                                }
                            } 
                        ?>
                        </p>
                        <a href="/information.php?IdAppartamento=1" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>
                    </div>
                </div>
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
</body>
</html>