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
    <script src=<?php if($currentpage=="index"){echo "js/script.js";}else{echo "../js/script.js";}?>></script>
    <script src=<?php if($currentpage=="index"){echo "js/script2.js";}else{echo "../js/script2.js";}?>></script>
    <script src=<?php if($currentpage=="index"){echo "js/script3.js";}else{echo "../js/script3.js";}?>></script>
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
            <?php if($currentpage=="index"){echo " <a class='btn' style=' color:#d6ad60; position:absolute; right:117px' type=-'button' href='pub/login.php'>Accedi</a>"; echo "<a class='btn' style='border-color:#d6ad60; border-radius: 5px; color:#d6ad60; position:absolute; right:20px' type='button' href='pub/registrazione.php'>Registrati</a>";}?>
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