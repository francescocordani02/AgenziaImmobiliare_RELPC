<?php
    $_SESSION['current_page']="registrazione";
    include ("../template/template.php");
    define('mydal', TRUE);
    include '../config/dal.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body background="../img/wallpaper.jpg">
    <div id="login">
    <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <?php
                        if (isset($_REQUEST['username'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            login($username, $password);
                        }else{
                    ?>
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-spazio text-info"></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Accedi">
                            </div>
                            <div id="register-link" class="text-right">
                                <p class="text-info">Non sei registrato? <a  href="registrazione.php">Registrati qui</a></p>
                            </div>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>