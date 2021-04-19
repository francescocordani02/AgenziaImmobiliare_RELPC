<?php
define('mydal', TRUE);
include_once '../config/dal.php';
session_start();
if (!isset($_SESSION['IsAdmin']) || $_SESSION['IsAdmin'] != 1) {
    header("location: ../login.php");
}
$_SESSION['current_page'] = "view-bookings";
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body style="background-color:#171717">
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <h2 class="titolo">Lista prenotazioni</h2>
        <div class="container">
            <table id="tableData" class="table table-bordered" style="color:white; background-color:#171717; border:2px solid #d6ad60;">
                <thead>
                    <tr>
                        <th class="th-sm">Nome appartamento</th>
                        <th class="th-sm">Nome locatario</th>
                        <th class="th-sm">Data inizio</th>
                        <th class="th-sm">Data fine</th>
                        <th class="th-sm">Costo €</th>
                        <th class="th-sm">Vedi appartamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tabella = OttieniPrenotazioni();
                    echo $tabella;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include '../template/footer.php'; ?>
</body>

</html>