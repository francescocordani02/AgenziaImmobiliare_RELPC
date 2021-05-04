<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
if (isset($_SESSION['Username'])) {
    $_SESSION['current_page'] = "admin-homepage";
?>
    <!DOCTYPE html>
    <html lang="it">

    <head>
        <?php include '../template/header.php'; ?>
    </head>

    <body style="background-color:#171717">
        <div class="content">
            <?php include '../template/navbar.php'; ?>
            <div id="admin">
                <h3 class="text-center text-white pt-5" style="text-align: center;">Benvenuto <?php echo $_SESSION["NomeCognome"]; ?></h3>
                <div class="container-fluid" style="padding-top:50px;">
                    <div id="admin-row" class="row justify-content-center align-items-center">
                        <div id="admin-column" class="col-md-6">
                            <div id="admin-box" class="col-md-12">
                                <div id="admin-form" class="row g-3 mt-4" action="" method="post" style="border-style:solid; max-width: 500px; border-width:4px;border-color:#d6ad60;color:white;">
                                    <div class="form-group" style="text-align:center;">
                                        <a href="view-requests.php"><input type="submit" name="submit" class="btn btn-info btn-md" value="Richieste di affitto" style="margin-top:15px; width: 190px;"></a>
                                    </div>
                                    <div class="form-group" style="text-align:center;">
                                        <a href="view-apartments.php"><input type="submit" name="submit" class="btn btn-info btn-md" value="Appartamenti in affitto" style="margin-top:15px; width: 190px;"></a>
                                    </div>
                                    <div class="form-group" style="text-align:center;">
                                        <a href="view-bookings.php"><input type="submit" name="submit" class="btn btn-info btn-md" value="Storico prenotazioni" style="margin-top:15px; width: 190px;"></a>
                                    </div>
                                    <div class="form-group" style="text-align:center;">
                                        <a href="view-users.php"><input type="submit" name="submit" class="btn btn-info btn-md" value="Elenco utenti" style="margin-top:15px; margin-bottom: 30px; width: 190px;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../template/footer.php'; ?>
    </body>

    </html>
<?php } else {
    header("location: ../pub/login.php");
} ?>