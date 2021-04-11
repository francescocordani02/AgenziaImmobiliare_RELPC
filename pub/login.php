<?php
define('mydal', TRUE);
include '../config/dal.php';
session_start();
$_SESSION['current_page'] = "login";
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <?php include '../template/header.php'; ?>
</head>

<body style="background-color:#171717">
    <div class="content">
        <?php include '../template/navbar.php'; ?>
        <div id="login">
            <h3 class="text-center text-white pt-5"></h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <?php
                            if (isset($_REQUEST['username'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                login($username, $password);
                            } else {
                            ?>
                                <form id="login-form" class="row g-3" action="" method="post" style="border-style:solid; border-width:4px;border-color:#d6ad60;color:white;">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 style="text-align:center; padding-top:23px;color:white;padding-bottom:10px;">LOGIN</h3>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username*:</label>
                                        <input type="username" name="username" id="username" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password*:</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="form-group" style="text-align:center;">
                                        <label for="remember-me" class="text-spazio text-info"></label><br>
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Accedi" style="margin-top:15px;">
                                    </div>
                                    <div id="register-link" style="text-align:center; padding-top:15px;">
                                        <p class="text-info">Non sei registrato? <a href="registrazione.php" style="color:#d6ad60;">Registrati qui</a></p>
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
</body>

</html>