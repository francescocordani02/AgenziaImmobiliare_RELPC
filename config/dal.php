<?php
if (!defined('mydal')) {
    exit('Non puoi accedere a questa pagina');
}
define('myconn', TRUE);
include "Connection.php";

function Registrazione($nome, $cognome, $username, $email, $password, $indirizzo, $dob, $telefono)
{
    $conn = Connettiti();
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $nome = mysqli_real_escape_string($conn, $nome);
    $cognome = mysqli_real_escape_string($conn, $cognome);
    $indirizzo = mysqli_real_escape_string($conn, $indirizzo);
    $dob = mysqli_real_escape_string($conn, $dob);
    $telefono = mysqli_real_escape_string($conn, $telefono);
    $passwordhash = password_hash($password, PASSWORD_BCRYPT);
    $isadmin = 0;
    $querycontrollousername = "SELECT Username FROM utenti WHERE (Username='$username')";
    $resultcontrollousername = mysqli_query($conn, $querycontrollousername);
    $rowscontrollousername = mysqli_num_rows($resultcontrollousername);
    $querycontrolloemail = "SELECT Email FROM utenti WHERE (Email='$email')";
    $resultcontrolloemail = mysqli_query($conn, $querycontrolloemail);
    $rowscontrolloemail = mysqli_num_rows($resultcontrolloemail);
    if ($rowscontrollousername > 0) {
        echo "<div class='form1'><h3>Username già esistente.</h3><br/>Cliccare qui per <a href='registrazione.php'>riprovare.</a></div>";
    } else if ($rowscontrolloemail > 0) {
        echo "<div class='form1'><h3>Email già esistente.</h3><br/>Cliccare qui per <a href='registrazione.php'>riprovare.</a></div>";
    } else {
        $query = "INSERT INTO utenti (Nome, Cognome, DoB, Telefono, Email, Indirizzo, Username, Password, IsAdmin) VALUES ('$nome','$cognome','$dob','$telefono','$email', '$indirizzo', '$username', '$passwordhash', '$isadmin')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Errore query");
        } else {
            $queryid = $conn->query("SELECT IdUtente FROM utenti WHERE Username=$username");
            $rowid = $queryid->fetch_assoc();
            $_SESSION['IdUtente'] = $rowid['IdUtente'];
            $_SESSION['Username'] = $username;
            $_SESSION['NomeCognome'] = $nome . " " . $cognome;
            $_SESSION['IsAdmin'] = 0;
            echo "<div class='form1'><h3>Ti sei registrato con successo.</h3><br/>Cliccare qui per <a href='../private/test.php'>andare alla homepage.</a></div>";
        }
    }
    mysqli_close($conn);
}

function login($username, $password)
{
    $conn = Connettiti();
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT IdUtente, Nome, Cognome, Username, Password, IsAdmin FROM utenti WHERE (Username='$username')";
    $result = mysqli_query($conn, $query) or die("Errore query");
    $rows = mysqli_num_rows($result);
    $Riga = $result->fetch_assoc();
    if ($rows == 1) {
        if (password_verify($password, $Riga['Password'])) {
            session_start();
            $_SESSION['IdUtente'] = $Riga['IdUtente'];
            $_SESSION['Username'] = $Riga['Username'];
            $_SESSION['NomeCognome'] = $Riga['Nome'] . " " . $Riga['Cognome'];
            $_SESSION['IsAdmin'] = $Riga['IsAdmin'];
            if ($Riga['IsAdmin'] == 1) {
                header('Location: ../admin/admin-homepage.php');
            } else {
                header('Location: ../index.php');
            }
        } else {
            echo "<div class='form1'><h3>Username o password errati</h3><br/>Cliccare qui per <a href='login.php'>Riprovare</a></div>";
        }
    } else {
        echo "<div class='form1'><h3>Username o password errati</h3><br/>Cliccare qui per <a href='login.php'>Riprovare</a></div>";
    }
    mysqli_close($conn);
}

function OttieniAppartamenti()
{
    $conn = Connettiti();
    $tabella = "";
    $query = "SELECT * FROM appartamenti INNER JOIN quartieri ON FK_IdQuartiere=IdQuartiere INNER JOIN categorie ON FK_IdCategoria=IdCategoria INNER JOIN utenti ON FK_IdUtenti=IdUtente ORDER BY NomeAPP ASC";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        if ($row['dpc'] == 0) {
            $prenotato = "No";
        } else {
            $prenotato = "Si";
        }
        $tabella .= "<tr><td>" . $row["NomeApp"] . "</td><td>" . $row["Indirizzo"] . "</td><td>" . $row["NomeQuartiere"] . "</td><td>" . $row["Categoria"] . "</td><td>" . $row["Superficie"] . "</td><td>" . $row["PrezzoGiorno"] . "</td><td>" . $row["Nome"] . " " . $row["Cognome"] . "</td><td>" . $row["Parcheggio"] . "</td><td>" . $row["PostiLetto"] . "</td><td>" . $prenotato . "</td><td><a href='../pub/information.php?IdAppartamento=" . $row["IdAppartamento"] . "'>Vedi</a></td><td><a href='cancel-apartment.php?IdAppartamento=" . $row["IdAppartamento"] . "'>Elimina</a></td></tr>";
    }
    return $tabella;
    mysqli_close($conn);
}

function OttieniPrenotazioni()
{
    $conn = Connettiti();
    $tabella = "";
    $query = "SELECT * FROM prenotazioni INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento INNER JOIN utenti ON FK_IdUtente=IdUtente ORDER BY NomeAPP ASC";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $tabella .= "<tr><td>" . $row["NomeApp"] . "</td><td>" . $row["Nome"] . " " . $row["Cognome"] . "</td><td>" . date("d/m/Y", strtotime($row['DataInizio'])) . "</td><td>" . date("d/m/Y", strtotime($row['DataFine']))  . "</td><td>" . $row["Costo"] . "</td><td><a href='../pub/information.php?IdAppartamento=" . $row["FK_IdAppartamento"] . "'>Vedi</a></td></tr>";
    }
    return $tabella;
    mysqli_close($conn);
}

function OttieniRichieste()
{
    $conn = Connettiti();
    $tabella = "";
    $query = "SELECT * FROM richieste INNER JOIN quartieri ON FK_IdQuartiere=IdQuartiere INNER JOIN categorie ON FK_IdCategoria=IdCategoria INNER JOIN utenti ON FK_IdUtente=IdUtente ORDER BY NomeApp ASC";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $tabella .= "<tr><td>" . $row["NomeApp"] . "</td><td>" . $row["Indirizzo"] . "</td><td>" . $row["NomeQuartiere"] . "</td><td>" . $row["Categoria"] . "</td><td>" . $row["Superficie"] . "</td><td>" . $row["PrezzoGiorno"] . "</td><td>" . $row["Nome"] . " " . $row["Cognome"] . "</td><td>" . $row["Parcheggio"] . "</td><td>" . $row["PostiLetto"] . "</td><td><a href='information-request.php?IdRichiesta=" . $row["IdRichiesta"] . "'>Vedi</a></td></tr>";
    }
    return $tabella;
    mysqli_close($conn);
}

function AppartamentiHomepage()
{
    $conn = Connettiti();
    $i = 1;
    while ($i <= 6) {
        echo '<div class="col-sm m-4">' . PHP_EOL . '<div class="card" style="width:560px;text-align:center;background-color:#171717;color:white;border-style:solid; border-width:4px;border-color:#d6ad60;border-radius:0px;">' . PHP_EOL . '<div class="card-body">';
        $query = $conn->query("SELECT Immagine, Categoria, Note, PrezzoGiorno FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento INNER JOIN categorie ON FK_IdCategoria=IdCategoria WHERE IdAppartamento=$i LIMIT 1");
        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
            echo '<img src=' . $row['Immagine'] . ' class="card-img-top" alt="img"style="height:300px">';
            echo '<h5 class="card-title"style="padding-top:15px;">' . $row['Categoria'] . '</h5>';
            echo '<p class="card-text">' . $row['Note'] . '</p>' . PHP_EOL . '<p class="card-text">Prezzo giornaliero: € ' . $row['PrezzoGiorno'] . '</p>';
        }
        echo '<a href="pub/information.php?IdAppartamento=' . $i . '" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>';
        echo '</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        $i++;
    }
    mysqli_close($conn);
}

function SelezionaQuartieri()
{
    $conn = Connettiti();
    $query = $conn->query("SELECT NomeQuartiere FROM quartieri ORDER BY NomeQuartiere ASC");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option>' . $row["NomeQuartiere"] . '</option>';
        }
    }
    mysqli_close($conn);
}

function SelezionaCategorie()
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Categoria FROM categorie ORDER BY Categoria ASC");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option>' . $row["Categoria"] . '</option>';
        }
    }
    mysqli_close($conn);
}

function CaroselloImmaginiAppartamento($IdAppartamento)
{
    $conn = Connettiti();
    echo '<div id="carouselExampleFade" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel">' . PHP_EOL . '<div class="carousel-inner">';
    $query = $conn->query("SELECT Immagine FROM immagini WHERE FK_IdAppartamento=$IdAppartamento");
    if ($query->num_rows > 0) {
        $img = 1;
        while ($row = $query->fetch_assoc()) {
            if ($img == 1) {
                echo '<div class="carousel-item active">' . PHP_EOL . '<img src="' . $row['Immagine'] . '" class="d-block w-100" alt="img">' . PHP_EOL . '</div>';
            } else {
                echo '<div class="carousel-item">' . PHP_EOL . '<img src="' . $row['Immagine'] . '" class="d-block w-100" alt="img">' . PHP_EOL . '</div>';
            }
            $img++;
        }
    }
    echo '</div>';
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">' . PHP_EOL . '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' . PHP_EOL . '<span class="visually-hidden">Previous</span>' . PHP_EOL .  '</button>';
    echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">' . PHP_EOL . '<span class="carousel-control-next-icon" aria-hidden="true"></span>' . PHP_EOL . '<span class="visually-hidden">Next</span>' . PHP_EOL .  '</button>';
    echo '</div>';
    mysqli_close($conn);
}

function CaroselloImmaginiRichiesta($IdRichiesta)
{
    $conn = Connettiti();
    echo '<div id="carouselExampleFade" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel">' . PHP_EOL . '<div class="carousel-inner">';
    $query = $conn->query("SELECT Immagine FROM immagini WHERE FK_IdRichiesta=$IdRichiesta");
    if ($query->num_rows > 0) {
        $img = 1;
        while ($row = $query->fetch_assoc()) {
            if ($img == 1) {
                echo '<div class="carousel-item active">' . PHP_EOL . '<img src="' . $row['Immagine'] . '" class="d-block w-100" alt="img">' . PHP_EOL . '</div>';
            } else {
                echo '<div class="carousel-item">' . PHP_EOL . '<img src="' . $row['Immagine'] . '" class="d-block w-100" alt="img">' . PHP_EOL . '</div>';
            }
            $img++;
        }
    }
    echo '</div>';
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">' . PHP_EOL . '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' . PHP_EOL . '<span class="visually-hidden">Previous</span>' . PHP_EOL .  '</button>';
    echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">' . PHP_EOL . '<span class="carousel-control-next-icon" aria-hidden="true"></span>' . PHP_EOL . '<span class="visually-hidden">Next</span>' . PHP_EOL .  '</button>';
    echo '</div>';
    mysqli_close($conn);
}

function InformazioniAppartamento($IdAppartamento)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT * FROM categorie INNER JOIN appartamenti ON IdCategoria=FK_IdCategoria WHERE IdAppartamento=$IdAppartamento LIMIT 1");
    if ($query->num_rows > 0) {
        return $row = $query->fetch_assoc();
    }
    mysqli_close($conn);
}

function InformazioniRichiesta($IdRichiesta)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT * FROM categorie INNER JOIN richieste ON IdCategoria=FK_IdCategoria WHERE IdRichiesta =$IdRichiesta LIMIT 1");
    if ($query->num_rows > 0) {
        return $row = $query->fetch_assoc();
    }
    mysqli_close($conn);
}

function Zona($IdAppartamento)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Indirizzo, NomeQuartiere, Valutazione FROM appartamenti INNER JOIN quartieri ON FK_IdQuartiere=IdQuartiere WHERE IdAppartamento=$IdAppartamento");
    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $indirizzo = $row['Indirizzo'];
        echo ' <h5 class="card-text"style="color:white;padding-top:10px;">' . $indirizzo . ', ' . $row['NomeQuartiere'] . '.</h5>';
        $val = $row['Valutazione'];
        $i = 1;
        echo '<span style="color:white;"><h5>Valutazione quartiere: </h5></span>';
        while ($i <= $val) {

            echo '<span class="fa fa-star checked"style="color:#d6ad60;"></span>';
            $i++;
        }
        if ($i != 5) {
            $stelle = 1;
            while ($stelle <= (5 - $val)) {
                echo '<span class="fa fa-star"style="color:white;"></span>';
                $stelle++;
            }
        }
    }
    mysqli_close($conn);
}

function ZonaRichiesta($IdRichiesta)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Indirizzo, NomeQuartiere, Valutazione FROM richieste INNER JOIN quartieri ON FK_IdQuartiere=IdQuartiere WHERE IdRichiesta=$IdRichiesta");
    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $indirizzo = $row['Indirizzo'];
        echo ' <h5 class="card-text"style="color:white;padding-top:10px;">' . $indirizzo . ', ' . $row['NomeQuartiere'] . '.</h5>';
        $val = $row['Valutazione'];
        $i = 1;
        echo '<span style="color:white;"><h5>Valutazione quartiere: </h5></span>';
        while ($i <= $val) {

            echo '<span class="fa fa-star checked"style="color:#d6ad60;"></span>';
            $i++;
        }
        if ($i != 5) {
            $stelle = 1;
            while ($stelle <= (5 - $val)) {
                echo '<span class="fa fa-star"style="color:white;"></span>';
                $stelle++;
            }
        }
    }
    mysqli_close($conn);
}

function Disponibilità($IdAppartamento)
{
    $conn = Connettiti();
    echo '<div class="row">' . PHP_EOL . '<div class="col-12">';
    $query = $conn->query("SELECT dpc,NomeApp FROM appartamenti WHERE IdAppartamento=$IdAppartamento");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            if ($row['dpc'] == 0) {
                $nome = strtolower($row['NomeApp']);
                echo '<h1 style="font-size:18px; color:white;text-align:center;padding-top:20px;">Al momento non risulta nessuna prenotazione in carico sull\'' . $nome . '. <br>L\'immobile è sempre disponibile dalla giornata di oggi.</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
            } else if ($row['dpc'] == 1) {
                $nome = strtolower($row['NomeApp']);
                $querycont = $conn->query("SELECT DataInizio, DataFine FROM prenotazioni WHERE FK_IdAppartamento=$IdAppartamento");
                if ($querycont->num_rows > 0) {
                    echo '<h1 style="font-size:18px; color:white;text-align:center;padding-top:20px;">';
                    if ($querycont->num_rows == 1) {
                        echo 'Al momento risulta 1 prenotazione';
                    } else {
                        echo 'Al momento risultano ' . $querycont->num_rows . ' prenotazioni';
                    }
                    echo ' in carico sull\'' . $nome . '. <br>Le giornate in cui l\'immobile non è disponibile sono le seguenti:</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
                    while ($rowcont = $querycont->fetch_assoc()) {
                        echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;">- Dal ' . date("d/m/Y", strtotime($rowcont['DataInizio'])) . ' al ' . date("d/m/Y", strtotime($rowcont['DataFine'])) . '.</h1>';
                    }
                    echo  '</div>' . PHP_EOL . '</div>';
                }
            }
        }
    }
    mysqli_close($conn);
}

function Proprietario($IdAppartamento)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Nome, Cognome, Telefono, Email FROM utenti INNER JOIN appartamenti ON IdUtente=FK_IdUtenti WHERE IdAppartamento = $IdAppartamento");
    if ($query->num_rows > 0) {
        echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="font-size:18px;color:white;text-align:center;padding-top:20px;">Informazioni relative al proprietario dell\'immobile:</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        while ($row = $query->fetch_assoc()) {
            echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;">- Nome: ' . $row['Nome'] . '.</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
            echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;">- Cognome: ' . $row['Cognome'] . '.</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
            echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;padding-bottom:20px;">- ☏: +39 ' . $row['Telefono'] . '</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        }
    }
    mysqli_close($conn);
}

function ProprietarioRichiesta($IdRichiesta)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Nome, Cognome, Telefono, Email FROM utenti INNER JOIN richieste ON IdUtente=FK_IdUtente WHERE IdRichiesta = $IdRichiesta");
    if ($query->num_rows > 0) {
        echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="font-size:18px;color:white;text-align:center;padding-top:20px;">Informazioni relative al proprietario dell\'immobile:</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        while ($row = $query->fetch_assoc()) {
            echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;">- Nome: ' . $row['Nome'] . '.</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
            echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;">- Cognome: ' . $row['Cognome'] . '.</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
            echo '<div class="row">' . PHP_EOL . '<div class="col-12">' . PHP_EOL . '<h1 style="color:white;text-align:center; font-size:18px;padding-top:5px;padding-bottom:20px;">- ☏: +39 ' . $row['Telefono'] . '</h1>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        }
    }
    mysqli_close($conn);
}

function OttieniUtenti()
{
    $conn = Connettiti();
    $tabella = "";
    $query = "SELECT IdUtente, Nome, Cognome, DoB, Telefono, Email, Indirizzo, Username, IsAdmin FROM utenti WHERE IdUtente!=" . $_SESSION['IdUtente'];
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $admin = "";
        if ($row['IsAdmin'] == 0) {
            $admin = "No";
        } else {
            $admin = "Si";
        }
        $tabella .= "<tr><td>" . $row["Nome"] . " " . $row["Cognome"] . "</td><td>" . $row["Username"] . "</td><td>" . date("d/m/Y", strtotime($row['DoB'])) . "</td><td>" . $row["Telefono"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Indirizzo"] . "</td><td>" . $admin . "</td></tr>";
    }
    return $tabella;
    mysqli_close($conn);
}

function RegistrazioneNuovoAccountAdmin($nome, $cognome, $username, $email, $password, $indirizzo, $dob, $telefono)
{
    $conn = Connettiti();
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $nome = mysqli_real_escape_string($conn, $nome);
    $cognome = mysqli_real_escape_string($conn, $cognome);
    $indirizzo = mysqli_real_escape_string($conn, $indirizzo);
    $dob = mysqli_real_escape_string($conn, $dob);
    $telefono = mysqli_real_escape_string($conn, $telefono);
    $passwordhash = password_hash($password, PASSWORD_BCRYPT);
    $isadmin = 1;
    $querycontrollousername = "SELECT Username FROM utenti WHERE (Username='$username')";
    $resultcontrollousername = mysqli_query($conn, $querycontrollousername);
    $rowscontrollousername = mysqli_num_rows($resultcontrollousername);
    $querycontrolloemail = "SELECT Email FROM utenti WHERE (Email='$email')";
    $resultcontrolloemail = mysqli_query($conn, $querycontrolloemail);
    $rowscontrolloemail = mysqli_num_rows($resultcontrolloemail);
    if ($rowscontrollousername > 0) {
        echo "<div class='form1'><h3>Username già esistente.</h3><br/>Cliccare qui per <a href='register-new-admin.php'>riprovare.</a></div>";
    } else if ($rowscontrolloemail > 0) {
        echo "<div class='form1'><h3>Email già esistente.</h3><br/>Cliccare qui per <a href='register-new-admin.php'>riprovare.</a></div>";
    } else {
        $query = "INSERT INTO utenti (Nome, Cognome, DoB, Telefono, Email, Indirizzo, Username, Password, IsAdmin) VALUES ('$nome','$cognome','$dob','$telefono','$email', '$indirizzo', '$username', '$passwordhash', '$isadmin')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Errore query");
        } else {
            echo "<div class='form1'><h3>Nuovo account admin registrato con successo.</h3><br/>Cliccare qui per <a href='admin-homepage.php'>tornare alla homepage.</a></div>";
        }
    }
    mysqli_close($conn);
}

function ImmagineAppartamentoRicerca($IdAppartamento)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Immagine FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE IdAppartamento=$IdAppartamento LIMIT 1");
    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        return $row['Immagine'];
    } else {
        return null;
    }
    mysqli_close($conn);
}

function Appartamenti_Cercati($Quartiere, $Categoria, $PostiLetto, $PostiAuto, $AffittoMin, $AffittoMax, $SuperficieMin, $SuperficieMax, $DataInizio, $DataFine)
{
    $conn = Connettiti();
    $cont_ricerche = 0;
    echo '<div class="col-sm m-4"style="color:white;">';
    $query_quartiere = $conn->query("SELECT IdQuartiere FROM quartieri WHERE NomeQuartiere='" . $Quartiere . "'");
    if ($query_quartiere->num_rows > 0) {
        $row = $query_quartiere->fetch_assoc();
        $FK_IdQuartiere = $row['IdQuartiere'];
    }
    $query_categoria = $conn->query("SELECT IdCategoria FROM categorie WHERE Categoria='" . $Categoria . "'");
    if ($query_categoria->num_rows > 0) {
        $row1 = $query_categoria->fetch_assoc();
        $FK_IdCategoria = $row1['IdCategoria'];
    }
    $query_appartamenti = $conn->query("SELECT * FROM appartamenti WHERE PrezzoGiorno BETWEEN $AffittoMin AND $AffittoMax AND FK_IdQuartiere=$FK_IdQuartiere AND FK_IdCategoria=$FK_IdCategoria AND PostiLetto=$PostiLetto AND Parcheggio=$PostiAuto AND dpc=0 AND Superficie BETWEEN $SuperficieMin AND $SuperficieMax");
    if ($query_appartamenti->num_rows > 0) {
        $cont_ricerche++;
        if ($cont_ricerche == 1)
            $ris = "risultato";
        else
            $ris = "risultati";
        while ($row2 = $query_appartamenti->fetch_assoc()) {
            $IdAppartamento = $row2['IdAppartamento'];
            echo '<div class="container-fluid"style="border-style:solid; border-width:4px;border-color:#d6ad60;">' . PHP_EOL . '<div class="row">';
            echo '<div class="col-6"><img src="' . ImmagineAppartamentoRicerca($IdAppartamento) . '" class="img-fluid" alt="img"style="padding-top:20px;padding-bottom:23px;height:300px;"></div>';
            echo '<div class="col-6">' . PHP_EOL . '<div class="container">' . PHP_EOL . '<div class="row"style="padding-top:20px; text-align:center;text-transform:uppercase;color:#d6ad60;">' . PHP_EOL . '<h3>' . $row2['NomeApp'] . '</h3>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>' . $row2['Note'] . '</h5>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>' . $row2['Indirizzo'] . ', ' . $Quartiere . '.</h5>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>Affitto Giornaliero: ' . $row2['PrezzoGiorno'] . ' €</h5>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<a href="pub/information.php?IdAppartamento=' . $IdAppartamento . '" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>' . PHP_EOL . '</div>';
            echo '</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        }
    }
    $DataInizio = date("Y-m-d", strtotime($DataInizio));
    $DataFine = date("Y-m-d", strtotime($DataFine));
    $query_date = $conn->query("SELECT DISTINCT FK_IdAppartamento FROM prenotazioni WHERE DataInizio <> '" . $DataInizio . "' AND DataFine <> '" . $DataFine . "' AND DataInizio NOT BETWEEN '" . $DataInizio . "' AND '" . $DataFine . "' AND DataFine NOT BETWEEN '" . $DataInizio . "' AND '" . $DataFine . "' AND NOT (DataInizio < '" . $DataInizio . "' AND DataFine > '" . $DataFine . "') AND PrezzoGiorno BETWEEN $AffittoMin AND $AffittoMax AND FK_IdQuartiere=$FK_IdQuartiere AND FK_IdCategoria=$FK_IdCategoria AND PostiLetto=$PostiLetto AND Parcheggio=$PostiAuto AND Superficie BETWEEN $SuperficieMin AND $SuperficieMax");
    if ($query_date->num_rows > 0) {
        while ($row3 = $query_date->fetch_assoc()) {
            $FK_IdAppartamento = $row3['FK_IdAppartamento'];
            $query_appartamenti_date = $conn->query("SELECT * FROM appartamenti WHERE IdAppartamento = $FK_IdAppartamento");
            if ($query_appartamenti_date->num_rows > 0) {
                while ($row4 = $query_appartamenti_date->fetch_assoc()) {
                    echo '<div class="container-fluid"style="border-style:solid; border-width:4px;border-color:#d6ad60;">' . PHP_EOL . '<div class="row">';
                    echo '<div class="col-6"><img src="' . ImmagineAppartamentoRicerca($row4['IdAppartamento']) . '" class="img-fluid" alt="img"style="padding-top:20px;padding-bottom:23px;"></div>';
                    echo '<div class="col-6">' . PHP_EOL . '<div class="container">' . PHP_EOL . '<div class="row"style="padding-top:20px; text-align:center;text-transform:uppercase;color:#d6ad60;">' . PHP_EOL . '<h3>' . $row2['NomeApp'] . '</h3>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>' . $row4['Note'] . '</h5>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>' . $row4['Indirizzo'] . ', ' . $Quartiere . '.</h5>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>Affitto Giornaliero: ' . $row4['PrezzoGiorno'] . ' €</h5>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<a style=" max-width: 75px; padding-bottom: 10px;" href="information.php?IdAppartamento=' . $row4['IdAppartamento'] . '" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>' . PHP_EOL . '</div>';
                    echo '</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
                }
            }
        }
    }
}

function InserisciRichiesta($img, $titolo, $prezzogiornaliero, $postiauto, $postiletto, $ncamere, $quartiere, $categoria, $indirizzo, $superficie, $note, $latitudine, $longitudine, $FK_IdUtente)
{
    $conn = Connettiti();
    $query_categoria = "SELECT IdCategoria FROM categorie WHERE (Categoria='$categoria')";
    $result = mysqli_query($conn, $query_categoria);
    $rowCategoria = mysqli_num_rows($result);
    if ($rowCategoria > 0) {
        $row1 = $result->fetch_assoc();
        $FK_IdCategoria = $row1['IdCategoria'];
    }
    $query_quartiere = "SELECT IdQuartiere FROM quartieri WHERE (NomeQuartiere='$quartiere')";
    $result = mysqli_query($conn, $query_quartiere);
    $rowQuartiere = mysqli_num_rows($result);
    if ($rowQuartiere > 0) {
        $row1 = $result->fetch_assoc();
        $FK_IdQuartiere = $row1['IdQuartiere'];
    }
    $query_richiesta = "INSERT INTO richieste (NomeApp, Parcheggio, PostiLetto, NumeroCamere, Indirizzo, Note, Superficie, PrezzoGiorno, Latitudine, Longitudine, FK_IdCategoria, FK_IdUtente, FK_IdQuartiere) VALUES ('$titolo','$postiauto','$postiletto','$ncamere','$indirizzo', '$note', '$superficie', '$prezzogiornaliero', '$latitudine', '$longitudine', '$FK_IdCategoria', '$FK_IdUtente', '$FK_IdQuartiere')";
    $result = mysqli_query($conn, $query_richiesta);
    if (!$result) {
        die("Errore!");
    } else {
        $queryselect = "SELECT IdRichiesta FROM richieste WHERE NomeApp='$titolo'";
        $result5 = $conn->query($queryselect);
        $row5 = $result5->fetch_assoc();
        $IdRichiesta = $row5['IdRichiesta'];
        for ($i = 0; $i < count($img['name']); $i++) {
            $img_name = $img['name'][$i];
            $tmp_name = $img['tmp_name'][$i];

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../img/imgAppartamenti/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO immagini(Immagine, Descrizione, FK_IdAppartamento, FK_IdRichiesta) 
				        VALUES('$img_upload_path', '', null, '$IdRichiesta')";
                mysqli_query($conn, $sql);
            } else {
                die("You can't upload files of this type");
            }
        }
        echo '<h1 style="color: #d6ad60;">Richiesta Inviata</h1>';
    }
    mysqli_close($conn);
}

function InserisciAppartamento($img, $titolo, $prezzogiornaliero, $postiauto, $postiletto, $ncamere, $quartiere, $categoria, $indirizzo, $superficie, $note, $latitudine, $longitudine, $FK_IdUtente)
{
    $conn = Connettiti();
    $query_categoria = "SELECT IdCategoria FROM categorie WHERE (Categoria='$categoria')";
    $result = mysqli_query($conn, $query_categoria);
    $rowCategoria = mysqli_num_rows($result);
    if ($rowCategoria > 0) {
        $row1 = $result->fetch_assoc();
        $FK_IdCategoria = $row1['IdCategoria'];
    }
    $query_quartiere = "SELECT IdQuartiere FROM quartieri WHERE (NomeQuartiere='$quartiere')";
    $result = mysqli_query($conn, $query_quartiere);
    $rowQuartiere = mysqli_num_rows($result);
    if ($rowQuartiere > 0) {
        $row1 = $result->fetch_assoc();
        $FK_IdQuartiere = $row1['IdQuartiere'];
    }
    $prenotato=0;
    $query_richiesta = "INSERT INTO appartamenti (NomeApp, Parcheggio, PostiLetto, NumeroCamere, Indirizzo, Note, Superficie, PrezzoGiorno, dpc, Latitudine, Longitudine, FK_IdCategoria, FK_IdUtenti, FK_IdQuartiere) VALUES ('$titolo','$postiauto','$postiletto','$ncamere','$indirizzo', '$note', '$superficie', '$prezzogiornaliero', '$prenotato','$latitudine', '$longitudine', '$FK_IdCategoria', '$FK_IdUtente', '$FK_IdQuartiere')";
    $result = mysqli_query($conn, $query_richiesta);
    if (!$result) {
        die("Errore!");
    } else {
        $queryselect = "SELECT IdAppartamento FROM appartamenti WHERE NomeApp='$titolo'";
        $result5 = $conn->query($queryselect);
        $row5 = $result5->fetch_assoc();
        $IdAppartamento = $row5['IdAppartamento'];
        for ($i = 0; $i < count($img['name']); $i++) {
            $img_name = $img['name'][$i];
            $tmp_name = $img['tmp_name'][$i];

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../img/imgAppartamenti/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO immagini(Immagine, Descrizione, FK_IdAppartamento, FK_IdRichiesta) 
				        VALUES('$img_upload_path', '', '$IdAppartamento', null)";
                mysqli_query($conn, $sql);
            } else {
                die("You can't upload files of this type");
            }
        }
        echo '<h1 style="color: #d6ad60;">Appartamento aggiunto</h1>';
    }
    mysqli_close($conn);
}

function AccettaRichiesta($IdRichiesta)
{
    $conn = Connettiti();
    $query_richiesta = "SELECT * FROM richieste WHERE IdRichiesta=$IdRichiesta LIMIT 1";
    $result = $conn->query($query_richiesta);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $NomeApp = $row['NomeApp'];
        $postiauto = $row['Parcheggio'];
        $postiletto = $row['PostiLetto'];
        $ncamere = $row['NumeroCamere'];
        $indirizzo = $row['Indirizzo'];
        $note = $row['Note'];
        $superficie = $row['Superficie'];
        $prezzogiornaliero = $row['PrezzoGiorno'];
        $latitudine = $row['Latitudine'];
        $longitudine = $row['Longitudine'];
        $prenotato = 0;
        $FK_IdCategoria = $row['FK_IdCategoria'];
        $FK_IdUtente = $row['FK_IdUtente'];
        $FK_IdQuartiere = $row['FK_IdQuartiere'];
        $queryinsert = "INSERT INTO appartamenti (NomeApp, Parcheggio, PostiLetto, NumeroCamere, Indirizzo, Note, dpc, Superficie, PrezzoGiorno, Latitudine, Longitudine, FK_IdCategoria, FK_IdUtenti, FK_IdQuartiere) VALUES ('$NomeApp','$postiauto','$postiletto','$ncamere','$indirizzo', '$note', '$prenotato', '$superficie', '$prezzogiornaliero', '$latitudine', '$longitudine', '$FK_IdCategoria', '$FK_IdUtente', '$FK_IdQuartiere')";
        $result2 = mysqli_query($conn, $queryinsert);
        if (!$result2) {
            die('Errore query1');
        } else {
            $queryselect = "SELECT IdAppartamento FROM appartamenti WHERE NomeApp='$NomeApp'";
            $result5 = $conn->query($queryselect);
            $row5 = $result5->fetch_assoc();
            $id = $row5['IdAppartamento'];
            $queryupdate = "UPDATE immagini SET FK_IdAppartamento=$id, FK_IdRichiesta=null WHERE FK_IdRichiesta=$IdRichiesta";
            $result4 = mysqli_query($conn, $queryupdate);
            if (!$result4) {
                die('Errore query3');
            } else {
                $querydelete = "DELETE FROM richieste WHERE IdRichiesta=$IdRichiesta";
                $result3 = mysqli_query($conn, $querydelete);
                if (!$result3) {
                    die('Errore query2');
                    
                }else{
                    return $accept = "Richiesta accettata";
                }
            }
        }
    }
    mysqli_close($conn);
}

function RifiutaRichiesta($IdRichiesta)
{
    $conn = Connettiti();
    $querydeleterequest = "DELETE FROM richieste WHERE IdRichiesta=$IdRichiesta";
    $result3 = mysqli_query($conn, $querydeleterequest);
    if (!$result3) {
        die('Errore query2');
    } else {
        $querydeleteimmagini = "DELETE FROM immagini WHERE FK_IdRichiesta=$IdRichiesta";
        $result4 = mysqli_query($conn, $querydeleteimmagini);
        if (!$result4) {
            die('Errore query3');
        } else {
            return $refuse = "Richiesta rifiutata";
        }
    }
    mysqli_close($conn);
}

function EliminaAppartamento($IdAppartamento){
    $conn=Connettiti();
    $querydeleteimmagini = "DELETE FROM immagini WHERE FK_IdAppartamento=$IdAppartamento";
    $result4 = mysqli_query($conn, $querydeleteimmagini);
    if (!$result4) {
        die('Errore query1');
    }else{
        $querydeleteprenotazioni = "DELETE FROM prenotazioni WHERE FK_IdAppartamento=$IdAppartamento";
        $result2 = mysqli_query($conn, $querydeleteprenotazioni);
        if (!$result2) {
            die('Errore query2');
        }else{
            $querydeleteappartamenti = "DELETE FROM appartamenti WHERE IdAppartamento=$IdAppartamento";
            $result3 = mysqli_query($conn, $querydeleteappartamenti);
            if (!$result3) {
                die('Errore query3');
            }else{
                echo '<h1 style="color: #d6ad60;">Appartamento cancellato</h1>';
            }
        }
    }
    mysqli_close($conn);
}