<?php
    $currentpage=$_SESSION['current_page'];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php if($currentpage=="index"){echo "css/style.css";}else{echo "../css/style.css";}?>>
    <link rel="stylesheet" href=<?php if($currentpage=="index"){echo "css/styleBootstrap.css";}else{echo "../css/styleBootstrap.css";}?>>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script  type = "text/javascript"  src ="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script  type = "text/javascript" src ="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script  type = "text/javascript"  src ="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel = "stylesheet" type = "text/css"  href ="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg  navbar-dark" style="background-color: #171717;">
    <a class="navbar-brand" href="#"><img src=<?php if($currentpage=="index"){echo "img/logo.png";}else{echo "../img/logo.png";}?> width="58" height="58" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href=<?php if($currentpage!="index"){echo "../index.php";}?>>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contatti</a>
            </li>
            <form class="form-inline">
                <?php
                    if(isset($_SESSION["Username"])){
                        echo "<a class='btn' style='border-color:#d6ad60; border-radius: 5px; color:#d6ad60; position:absolute; right:20px' type='button' href='../pub/logout.php'>Logout</a>";
                        if($currentpage=="index"){
                            echo "<a class='btn' style='border-color:#d6ad60; border-radius: 5px; color:#d6ad60; position:absolute; right:20px' type='button' href='pub/logout.php'>Logout</a>";
                        }
                    }else if($currentpage=="index"){
                        echo " <a class='btn' style=' color:#d6ad60; position:absolute; right:117px' type=-'button' href='pub/login.php'>Accedi</a>";
                        echo "<a class='btn' style='border-color:#d6ad60; border-radius: 5px; color:#d6ad60; position:absolute; right:20px' type='button' href='pub/registrazione.php'>Registrati</a>";
                    }
                ?>
            </form>   
        </ul>
    </div>
    </nav>
   <!-- <footer class="footer">
        <div class="container">
        © 2021 RELPC - All rights reserved
        </div>
    </footer> -->
</body>
</html>