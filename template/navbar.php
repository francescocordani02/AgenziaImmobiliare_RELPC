<?php
    $currentpage=$_SESSION['current_page'];
?>
<nav class="navbar navbar-expand-lg  navbar-dark" style="background-color: #171717;">
    <a class="navbar-brand" href="#"><img src=<?php if($currentpage=="index"){echo "img/logo.png";}else{echo "../img/logo.png";}?> width="58" height="58" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href=<?php if($currentpage!="index" ){if(!isset($_SESSION["IsAdmin"])||$_SESSION["IsAdmin"]!=1){echo "../index.php";}else{echo "admin-homepage.php";}}?>>Home</a>
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
                    }else{
                        if($currentpage=="index"){
                            echo " <a class='btn' style=' color:#d6ad60; position:absolute; right:117px' type=-'button' href='pub/login.php'>Accedi</a>";
                            echo "<a class='btn' style='border-color:#d6ad60; border-radius: 5px; color:#d6ad60; position:absolute; right:20px' type='button' href='pub/registrazione.php'>Registrati</a>";
                        }else if($currentpage != "login" && $currentpage != "registrazione"){
                            echo " <a class='btn' style=' color:#d6ad60; position:absolute; right:117px' type=-'button' href='../pub/login.php'>Accedi</a>";
                            echo "<a class='btn' style='border-color:#d6ad60; border-radius: 5px; color:#d6ad60; position:absolute; right:20px' type='button' href='../pub/registrazione.php'>Registrati</a>";
                        }
                    }
                ?>
            </form>
        </ul>
    </div>
</nav>

    