<?php
    session_start();
    $_SESSION['current_page']="index";
    include ("template/template.php");
    define('mydal', TRUE);
    include 'config/dal.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Homepage</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm m-3 border rounded ricerca">
                <div class="search-container">
                    <h3>Filtri di ricerca</h3>
                    <input type="text" name="quartiere" placeholder="Quartiere della città">
                    <select class="mdb-select md-form">
                        <option value="" disabled selected>Categoria immobile</option>
                        <option value="1">Qualsiasi</option>
                        <option value="2">Appartamento</option>
                        <option value="3">Altro</option>
                    </select>
                    <label for="affitto">Affitto giornaliero &euro;</label><br>
                    <select class="mdb-select md-form dropdown-md">
                        <option value="" disabled selected>Da</option>
                        <option value="1">20</option>
                        <option value="2">50</option>
                        <option value="3">100</option>
                    </select>
                    <select class="mdb-select md-form dropdown-md">
                        <option value="" disabled selected>A</option>
                        <option value="1">125</option>
                        <option value="2">150</option>
                        <option value="3">200</option>
                    </select>
                    <label for="posti auto" class="two-label-a-row">Posti auto</label><br>
                    <label for="posti letto" class="two-label-a-row">Posti letto</label><br>
                    <select class="mdb-select md-form dropdown-md">
                        <option value="" disabled selected>Qualsiasi</option>
                        <option value="1">125</option>
                        <option value="2">150</option>
                        <option value="3">200</option>
                    </select>   
                    <select class="mdb-select md-form dropdown-md">
                        <option value="" disabled selected>Qualsiasi</option>
                        <option value="1">125</option>
                        <option value="2">150</option>
                        <option value="3">200</option>
                    </select>   
                    <label for="superficie (mq)">Superficie (mq)</label><br>
                    <select class="mdb-select md-form dropdown-md">
                        <option value="" disabled selected>Da</option>
                        <option value="1">20</option>
                        <option value="2">50</option>
                        <option value="3">100</option>
                    </select>
                    <select class="mdb-select md-form dropdown-md">
                        <option value="" disabled selected>A</option>
                        <option value="1">125</option>
                        <option value="2">150</option>
                        <option value="3">200</option>
                    </select>     
                    <label for="data (da, a)">Data (da, a)</label><br>
                    
                </div>
            </div>
            <div class="col-sm-8 m-3 border rounded">
                <div class="rent-container">
                    <img src="img/immobile-prova.jpg" class="img-thumbnail img-responsive" alt="immagine">
                </div>
            </div>
        </div>
    </div>
</body>
</html>