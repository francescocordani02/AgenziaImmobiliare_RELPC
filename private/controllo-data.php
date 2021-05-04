<?php
session_start();
define('mydal', TRUE);
include '../config/dal.php';
if (isset($_SESSION['Username'])) {
    if ($_SESSION['IsAdmin'] == 0) {
        $_SESSION['current_page'] = "scelta-data";
        $IdImmobile = $_SESSION['IdAppartamento'];
        $daterange = $_GET['daterange'];
        $date = explode(' ', $daterange);
        $datainizio = $date[0];
        $datafine = $date[2];
        $_SESSION['DataInizio'] = $datainizio;
        $_SESSION['DataFine'] = $datafine;
?>
        <html lang="it">

        <head>
            <title>Data</title>
        </head>

        <body style="background-color: #171717">
            <div class="content">
                <?php
                include("../template/navbar.php");
                ?>
                <div class="jumbotron text-center m-5">
                    <?php
                    ControllaData($IdImmobile, $datainizio, $datafine);
                    ?>
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