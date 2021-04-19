<?php
define('mydal', TRUE);
include '../config/dal.php';
session_start();
if (!isset($_SESSION['IsAdmin']) || $_SESSION['IsAdmin'] != 1) {
    header("location: ../login.php");
}
$_SESSION['current_page'] = "view-apartments";
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body style="background-color: #171717;">
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <h2 class="titolo">Lista utenti</h2>
        <div class="container">
            <table id="tableData" class="table table-bordered" style="color:white; background-color:#171717; border:2px solid #d6ad60;">
                <thead>
                    <tr>
                        <th class="th-sm">Nome e cognome</th>
                        <th class="th-sm">Username</th>
                        <th class="th-sm">Data di nascita</th>
                        <th class="th-sm">Telefono</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Indirizzo</th>
                        <th class="th-sm">Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tabella = OttieniUtenti();
                    echo $tabella;
                    ?>
                </tbody>
            </table>
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-sm-4 m-4">
                    <div class="card text-center" style="background-color:#171717;">
                        <div class="card-body">
                            <a href="register-new-admin.php" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717;">Registra nuovo admin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../template/footer.php'; ?>

</body>

</html>