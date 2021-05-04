<?php
session_start();
define('mydal', TRUE);
include_once '../config/dal.php';
if (isset($_SESSION['Username'])) {
    if ($_SESSION['IsAdmin'] == 1) {
        $_SESSION['current_page'] = "view-bookings";
?>
        <!DOCTYPE html>
        <html lang="it">

        <head>
            <?php include '../template/header.php'; ?>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        </head>

        <body style="background-color:#171717">
            <div class="content">
                <?php include '../template/navbar.php'; ?>
                <h2 class="titolo">Lista prenotazioni</h2>
                <div class="container" style="background-color:white; border: 2px solid #d6ad60; border-radius: 5px;">
                    <table id="example" class="display" style="padding:10px;">
                        <thead>
                            <tr>
                                <th class="th-sm">Codice prenotazione</th>
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
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable({
                                "pagingType": "full_numbers"
                            });
                        });
                    </script>
                </div>
            </div>
            <?php include '../template/footer.php'; ?>
        </body>

        </html>
<?php } else {
        if (isset($_SESSION['Username'])) {
            exit('<h3>Non puoi accedere a questa pagina, <a href="../index.php">torna alla homepage</a>.</h3>');
        } else {
            exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login come admin</a> per poter accedere.</h3>');
        }
    }
} else {
    exit('<h3>Non puoi accedere a questa pagina, <a href="../pub/login.php">fai il login come admin</a> per poter accedere.</h3>');
} ?>