<?php
define('mydal', TRUE);
include '../config/dal.php';
session_start();
$_SESSION['current_page'] = "registrazione";
?>

<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
</head>

<body style="background-color:#171717">
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <div id="registrazione">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <?php
                            if (isset($_REQUEST['username'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $email = $_POST['email'];
                                $nome = $_POST['nome'];
                                $cognome = $_POST['cognome'];
                                $indirizzo = $_POST['indirizzo'];
                                $dob = $_POST['dob'];
                                $telefono = $_POST['telefono'];
                                Registrazione($nome, $cognome, $username, $email, $password, $indirizzo, $dob, $telefono);
                            } else {
                            ?>
                                <form id="login-form" class="row g-3" action="" method="POST" style="border-style:solid; border-width:4px;border-color:#d6ad60;color:white;">
                                    <h3 style="text-align:center; color:white;padding-bottom:10px;">REGISTRAZIONE</h3>
                                    <div class="col-md-6">
                                        <label for="nome" class="form-label">Nome (solo lettere)*: </label>
                                        <input type="text" class="form-control" name="nome" id="nome" pattern="[A-Za-z]+" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cognome" class="form-label">Cognome (solo lettere)*:</label>
                                        <input type="text" name="cognome" id="cognome" pattern="[A-Za-z]+" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="DoB" class="form-label">Data di nascita*:</label>
                                        <input type="date" name="dob" id="dob" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Telefono (solo numeri)*:</label>
                                        <input type="number" name="telefono" id="telefono" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email*:</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="indirizzo" class="form-label">Indirizzo:</label>
                                        <input type="text" name="indirizzo" id="indirizzo" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">Username*:</label>
                                        <input type="username" name="username" id="username" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password*:</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="form-group" style="text-align:center;padding-top:30px;">
                                        <label for="remember-me" class="text-spazio text-info">*: campi richiesti</label><br><br>
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Registrati">
                                    </div>
                                    <div id="register-link" style="text-align:center;padding-top:15px;">
                                        <p class="text-info">Già registrato? <a href="login.php" style="color:#d6ad60;">Accedi qui</a></p>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../template/footer.php"); ?>
    <script src="../js/scriptdatemax.js"></script>
</body>

</html>