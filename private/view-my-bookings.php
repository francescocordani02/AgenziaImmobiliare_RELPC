<?php
session_start();
$_SESSION['current_page'] = "test";
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
</head>

<body style="background-color: #171717;">
    <div class="content">
        <?php include '../template/navbar.php';
        echo "<p> Username: " . $_SESSION['Username'] . "<br>" . "Nome e cognome: " . $_SESSION['NomeCognome'] . "</p>"; ?>
    </div>
</body>
<?php include '../template/footer.php'; ?>

</html>
