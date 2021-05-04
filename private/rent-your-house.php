<?php
session_start();
define('mydal', TRUE);
include '../config/dal.php';
if (isset($_SESSION['Username'])) {
    if ($_SESSION['IsAdmin'] == 0) {
        $_SESSION['current_page'] = "rent-your-house";
?>
        <html lang="it">

        <head>
            <script src="../js/script-upload-image.js"></script>
            <?php
            include('../template/header.php');
            ?>
        </head>

        <body style="background-color: #171717">
            <div class="content">
                <?php
                include("../template/navbar.php");
                ?>
                <div class="container-fluid" style="background-color:#171717;  height: 640px;">
                    <div class="row">
                        <div class="col-sm m-4">
                            <div class="container" style="border-style:solid; border-width:4px;border-color:#d6ad60;">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="container">
                                            <form id="login-form" action="send-request.php" method="post" enctype="multipart/form-data" class="row g-3" style="text-align:center;color:white;padding-bottom:23px;padding-top:5px;">
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Quartiere:</label>
                                                    <select id="inputState" class="form-select" name="quartiere">
                                                        <?php SelezionaQuartieri(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Categoria:</label>
                                                    <select id="inputState" class="form-select" name="categoria">
                                                        <?php SelezionaCategorie(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Posti Letto:</label>
                                                    <select id="inputState" class="form-select" name="postiletto">
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
                                                    <label for="inputState" class="form-label">Numero camere:</label>
                                                    <select id="inputState" class="form-select" name="ncamere">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Prezzo giornaliero (€):</label>
                                                    <input type="number" name="prezzo-giornaliero" step=0.01 id="username" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Posti auto:</label>
                                                    <select id="inputState" class="form-select" name="postiauto">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Note:</label>
                                                    <textarea type="text" rows="10" name="note" id="username" class="form-control" required></textarea>
                                                </div>

                                                <div class="col-md-8">
                                                    <label for="inputState" class="form-label">Superficie (mq):</label>
                                                    <input type="text" name="superficie" id="username" class="form-control" required>
                                                    <label for="inputState" class="form-label">Indirizzo:</label>
                                                    <input type="text" name="indirizzo" id="username" class="form-control" required>
                                                    <label for="inputState" class="form-label">Latitudine:</label>
                                                    <input type="number" name="lat" step=0.01 id="username" class="form-control" required>
                                                    <label for="inputState" class="form-label">Longitudine:</label>
                                                    <input type="number" name="long" step=0.01 id="username" class="form-control" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputState" class="form-label">Nome appartamento:</label>
                                                    <input type="text" name="titolo" id="username" class="form-control" required>
                                                </div>
                                                <div class="col-12 ">
                                                    <label for="inputState" class="form-label">Immagini:</label>
                                                    <input type="file" name="my_image[]" multiple>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" id="button" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">RICHIEDI</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include("../template/footer.php");
            ?>
        </body>

        </html>
<?php } else {
        if (isset($_SESSION['Username'])) {
            exit('<h3>Non puoi accedere a questa pagina, <a href="../admin/admin-homepage.php">torna alla homepage</a>.</h3>');
        } else {
            exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login</a> per poter accedere.</h3>');
        }
    }
} else {
    exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login</a> per poter accedere.</h3>');
} ?>