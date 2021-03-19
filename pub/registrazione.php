<?php
    $_SESSION['current_page']="registrazione";
    include ("../template/template.php");
?>

<html lang="it"><head>
    <title>Registrazione</title>
</head>
<body background="../img/wallpaper.jpg">
    <title>Registrazione</title>
    <div id="registrazione">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Registrazione</h3>
                            <div class="form-group">
                                <label for="nome" class="text-info">Nome:</label><br>
                                <input type="text" name="nome" id="nome" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="cognome" class="text-info">Cognome:</label><br>
                                <input type="text" name="cognome" id="cognome" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="DoB" class="text-info">Data di nascita:</label><br>
                                <input type="date" name="dob" id="dob" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="text-info">Telefono:</label><br>
                                <input type="text" name="telefono" id="telefono" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="indirizzo" class="text-info">Indirizzo:</label><br>
                                <input type="text" name="indirizzo" id="indirizzo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-spazio text-info"></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Registrati">
                            </div>
                            <div id="register-link" class="text-right">
                                <p class="text-info">Già registrato? <a href="login.php">Accedi qui</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body></html>