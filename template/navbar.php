<?php
$currentpage = $_SESSION['current_page'];
?>
<header>
    <nav class="navbar navbar-expand-lg  navbar-dark" style="background-color: #171717;">
        <a class="navbar-brand" href="#"><img src=<?php if ($currentpage == "index") {
                                                        echo "img/logo.png";
                                                    } else {
                                                        echo "../img/logo.png";
                                                    } ?> width="58" height="58" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href=<?php if ($currentpage != "index") {
                                                    if (!isset($_SESSION["IsAdmin"]) || $_SESSION["IsAdmin"] != 1) {
                                                        echo "../index.php";
                                                    } else {
                                                        echo "../admin/admin-homepage.php";
                                                    }
                                                } ?>>Home</a>
                </li>
                <?php if ($currentpage != "login" && $currentpage != "registrazione") {
                    if (isset($_SESSION["IsAdmin"])) {
                        if ($_SESSION["IsAdmin"] == 1) {
                            if ($currentpage != "index") {
                                echo '<li class="nav-item"><a class="nav-link" href="../admin/view-requests.php">Richieste di affitto</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="../admin/view-apartments.php">Appartamenti in affitto</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="../admin/view-bookings.php">Storico prenotazioni</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="../admin/view-users.php">Elenco utenti</a></li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="admin/view-requests.php">Richieste di affitto</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="admin/view-apartments.php">Appartamenti in affitto</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="admin/view-bookings.php">Storico prenotazioni</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="admin/view-users.php">Elenco utenti</a></li>';
                            }
                        } else if ($_SESSION["IsAdmin"] == 0) {
                            if ($currentpage == "index") {
                                $page = "private/";
                                $page2 = "pub/";
                            } else {
                                if ($currentpage == "research" || $currentpage == "registrazione" || $currentpage == "login" || $currentpage == "information" || $currentpage == "contacts") {
                                    $page = "../private/";
                                } else {
                                    $page = "";
                                }
                                $page2 = "../pub/";
                            }
                            echo '<li class="nav-item"><a class="nav-link" href="' . $page . 'rent-your-house.php">Nuova richiesta</a></li>' . PHP_EOL . '<li class="nav-item"><a class="nav-link" href="' . $page2 . 'contacts.php">Contatti</a></li>';
                        }
                    } else {
                        if ($currentpage != "contacts" && $currentpage == "index") {
                            echo '<li class="nav-item"><a class="nav-link" href="pub/contacts.php">Contatti</a></li>';
                        } else if ($currentpage != "contacts") {
                            echo '<li class="nav-item"><a class="nav-link" href="contacts.php">Contatti</a></li>';
                        }
                    }
                } else {
                    if ($currentpage != "contacts") {
                        echo '<li class="nav-item"><a class="nav-link" href="contacts.php">Contatti</a></li>';
                    }
                }
                ?>
                <div class="float-right">
                <form class="form-inline">
                    <?php
                    if ($currentpage != "login" && $currentpage != "registrazione") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Utenza
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (isset($_SESSION["Username"])) {
                                if ($currentpage == "index") {
                                    echo "<a class='dropdown-item' href='pub/logout.php'>Logout</a>";
                                } else {
                                    echo "<a class='dropdown-item' href='../pub/logout.php'>Logout</a>";
                                }
                            } else {
                                if ($currentpage == "index") {
                                    echo " <a class='dropdown-item'  href='pub/login.php'>Accedi</a>";
                                    echo "<a class='dropdown-item'  href='pub/registrazione.php'>Registrati</a>";
                                } else if ($currentpage != "login" && $currentpage != "registrazione") {
                                    echo " <a class='dropdown-item'  href='../pub/login.php'>Accedi</a>";
                                    echo "<a class='dropdown-item' href='../pub/registrazione.php'>Registrati</a>" . PHP_EOL . "</div>" . PHP_EOL . "</li>";
                                }
                            }
                        } ?>
                </form>
                </div>
            </ul>
        </div>
    </nav>
</header>