<?php
    $_SESSION['current_page']="registrazione";
    include ("../template/template.php");
    define('mydal', TRUE);
    include '../config/dal.php';
?>

<html lang="it"><head>
    <title>Registrazione</title>
</head>
<body background="../img/wallpaper.jpg">
    <div id="registrazione">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <?php
                        if (isset($_REQUEST['username'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $email = $_POST['email'];
                            $nome = $_POST['nome'];
                            $cognome = $_POST['cognome'];
                            $indirizzo = $_POST['indirizzo'];
                            $dob = $_POST['dob'];
                            $telefono = $_POST['telefono'];
                            Registrazione($nome, $cognome, $username, $email, $password, $indirizzo, $dob, $telefono);
                        }else{
                    ?>
                        <form id="login-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">Registrazione</h3>
                            <div class="form-group">
                                <label for="nome" class="text-info">Nome (solo lettere)*: </label><br>
                                <input type="text" name="nome" id="nome" pattern="[A-Za-z]+" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label for="cognome" class="text-info">Cognome (solo lettere)*:</label><br>
                                <input type="text" name="cognome" id="cognome" pattern="[A-Za-z]+" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="DoB" class="text-info">Data di nascita*:</label><br>
                                <input type="date" name="dob" id="dob" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="text-info">Telefono (solo numeri)*:</label><br>
                                <input type="number" name="telefono" id="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email*:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="indirizzo" class="text-info">Indirizzo:</label><br>
                                <input type="text" name="indirizzo" id="indirizzo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username*:</label><br>
                                <input type="username" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password*:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-spazio text-info">*: campi richiesti</label><br><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Registrati">
                            </div>
                            <div id="register-link" class="text-right">
                                <p class="text-info">Già registrato? <a href="login.php">Accedi qui</a></p>
                            </div>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/scriptdatemax.js"></script>
</body></html>