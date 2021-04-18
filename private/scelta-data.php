<?php
session_start();
if (isset($_SESSION['Username']) == "") {
    header("location: ../login.php");
}
$_SESSION['current_page'] = "scelta-data";
define('mydal', TRUE);
include '../config/dal.php';
?>
<html lang="it">

<head>
    <?php
    include('../template/header.php');
    ?>
</head>

<body style="background-color: #171717">
    <div class="content">
        <?php
        include("../template/navbar.php");
        ?>
        <div class="scelta-data">
            <h3 class="display-3" style="color: white">Periodo prenotazione</h3>
            <form class="scelta-data" action="checkout.php">
                <label for="daterange" class="form-label">Range Date:</label>
                <input type="text" id="date" name="daterange" value="<?php echo "date ('d/m/Y')"; ?>-<?php echo "date ('d/m/Y')"; ?>" style="width:370px;text-align:center;" />
                <br>
                <button type="submit" id="button" class="btn btn-warning" style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Vai al checkout</button>
            </form>
            <script>
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                        opens: 'left'
                    }, function(start, end, label) {
                        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    });
                });
            </script>
        </div>
    </div>
    <?php
    include("../template/footer.php");
    ?>
</body>

</html>