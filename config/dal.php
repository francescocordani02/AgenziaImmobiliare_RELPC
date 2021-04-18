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
    $query = "SELECT * FROM appartamenti";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $tabella .= "<tr><td>" . $row["Parcheggio"] . "</td><td>" . $row["PostiLetto"] . "</td><td>" . $row["NumeroCamere"] . "</td><td>" . $row["Indirizzo"] . "</td><td>" . $row["Note"] . "</td><td>" . $row["PrezzoGiorno"] . "</td><td>" . $row["dpc"] . "</td><td>" . $row["Superficie"] . "</td><td><a href='../index.php?IdAppartamento=" . $row["IdAppartamento"] . "'>Vedi</a></td></tr>";
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
    $query = $conn->query("SELECT Nome FROM quartieri ORDER BY Nome ASC");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option>' . $row["Nome"] . '</option>';
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
    $query = $conn->query("SELECT Immagine FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE IdAppartamento=$IdAppartamento");
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

function Zona($IdAppartamento)
{
    $conn = Connettiti();
    $query = $conn->query("SELECT Indirizzo, Nome, Valutazione FROM appartamenti INNER JOIN quartieri ON FK_IdQuartiere=IdQuartiere WHERE IdAppartamento=$IdAppartamento");
    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $indirizzo = $row['Indirizzo'];
        echo ' <h5 class="card-text"style="color:white;padding-top:10px;">' . $indirizzo . ', ' . $row['Nome'] . '.</h5>';
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
        $tabella .= "<tr><td>" . $row["Nome"] . " " . $row["Cognome"] . "</td><td>" . $row["Username"] . "</td><td>" . date("d/m/Y", strtotime($row['DoB'])) . "</td><td>" . $row["Telefono"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Indirizzo"] . "</td><td>" . $admin . "</td><td><a href='../index.php?IdUtente=" . $row["IdUtente"] . "'>Mostra</a></td></tr>";
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
    $conn=Connettiti();
    $query= $conn->query("SELECT Immagine FROM immagini INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE IdAppartamento=$IdAppartamento LIMIT 1");
    if($query->num_rows>0){
        $row=$query->fetch_assoc();
        return $row['Immagine'];
    }
    else
        return null;
}

function Appartamenti_Cercati($Quartiere,$Categoria,$PostiLetto,$PostiAuto,$AffittoMin,$AffittoMax,$SuperficieMin,$SuperficieMax,$DataInizio,$DataFine){
    $conn=Connettiti();
    echo '<div class="col-sm m-4"style="color:white;">';
    $query_quartiere = $conn->query("SELECT IdQuartiere FROM quartieri WHERE Nome='".$Quartiere."'");
    if($query_quartiere->num_rows>0){
        $row=$query_quartiere->fetch_assoc();
        $FK_IdQuartiere= $row['IdQuartiere'];
    }
    $query_categoria = $conn->query("SELECT IdCategoria FROM categorie WHERE Categoria='".$Categoria."'");
    if($query_categoria->num_rows>0){
        $row1=$query_categoria->fetch_assoc();
        $FK_IdCategoria=$row1['IdCategoria'];
    }
    $query_appartamenti =$conn->query("SELECT * FROM appartamenti WHERE PrezzoGiorno BETWEEN $AffittoMin AND $AffittoMax AND FK_IdQuartiere=$FK_IdQuartiere AND FK_IdCategoria=$FK_IdCategoria AND PostiLetto=$PostiLetto AND Parcheggio=$PostiAuto AND dpc=0 AND Superficie BETWEEN $SuperficieMin AND $SuperficieMax");
    if($query_appartamenti->num_rows>0){
        while ($row2 = $query_appartamenti->fetch_assoc()) {
            $IdAppartamento = $row2['IdAppartamento'];
            $note= substr($row2['Note'],0,80);
            echo '<div class="container-fluid"style="border-style:solid; border-width:4px;border-color:#d6ad60;margin-top:30px;">' . PHP_EOL . '<div class="row">';
            echo '<div class="col-6"><img src="'.ImmagineAppartamentoRicerca($IdAppartamento).'" class="img-fluid" alt="img"style="padding-top:17px;padding-bottom:17px;height:318px;"></div>';
            echo '<div class="col-6">' . PHP_EOL . '<div class="container">' . PHP_EOL . '<div class="row"style="padding-top:20px; text-align:center;text-transform:uppercase;color:#d6ad60;">' . PHP_EOL . '<h3>'.$row2['NomeApp'].'</h3>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>'.$note. '....</h5>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>'.$row2['Indirizzo']. ', '.$Quartiere.'.</h5>' . PHP_EOL . '</div>';
            echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>Affitto Giornaliero: '.$row2['PrezzoGiorno'].' €</h5>' . PHP_EOL . '</div>';
            echo '<div class="row align-items-center">' . PHP_EOL . '<div class="col" style="text-align:center;margin-top:20px;">'. PHP_EOL . '<a href="information.php?IdAppartamento=' .$IdAppartamento. '" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>' . PHP_EOL . '</div>'. PHP_EOL . '</div>' . PHP_EOL .'</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
        }
    }
    else{
        echo 'la ricerca non ha prodotto risultati';
    }
    $DataInizio = date("Y-m-d",strtotime($DataInizio));
    $DataFine = date("Y-m-d",strtotime($DataFine));
    $query_date = $conn->query("SELECT DISTINCT FK_IdAppartamento FROM prenotazioni INNER JOIN appartamenti ON FK_IdAppartamento=IdAppartamento WHERE DataInizio <> '".$DataInizio."' AND DataFine <> '".$DataFine."' AND DataInizio NOT BETWEEN '".$DataInizio."' AND '".$DataFine."' AND DataFine NOT BETWEEN '".$DataInizio."' AND '".$DataFine."' AND NOT (DataInizio < '".$DataInizio."' AND DataFine > '".$DataFine."') AND PrezzoGiorno BETWEEN $AffittoMin AND $AffittoMax AND FK_IdQuartiere=$FK_IdQuartiere AND FK_IdCategoria=$FK_IdCategoria AND PostiLetto=$PostiLetto AND Parcheggio=$PostiAuto AND Superficie BETWEEN $SuperficieMin AND $SuperficieMax");
    if($query_date->num_rows>0){
        while($row3=$query_date->fetch_assoc()){
            $FK_IdAppartamento=$row3['FK_IdAppartamento'];
            $query_appartamenti_date = $conn->query("SELECT * FROM appartamenti WHERE IdAppartamento = $FK_IdAppartamento");
            if($query_appartamenti_date->num_rows>0){
                while($row4=$query_appartamenti_date->fetch_assoc()){
                    $note= substr($row4['Note'],0,80);
                    $IdAppartamento=$row4['IdAppartamento'];
                    echo '<div class="container-fluid"style="border-style:solid; border-width:4px;border-color:#d6ad60;margin-top:30px;">' . PHP_EOL . '<div class="row">';
                    echo '<div class="col-6"><img src="'.ImmagineAppartamentoRicerca($IdAppartamento).'" class="img-fluid" alt="img"style="padding-top:17px;padding-bottom:17px;height:318px;"></div>';
                    echo '<div class="col-6">' . PHP_EOL . '<div class="container">' . PHP_EOL . '<div class="row"style="padding-top:20px; text-align:center;text-transform:uppercase;color:#d6ad60;">' . PHP_EOL . '<h3>'.$row4['NomeApp'].'</h3>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>'.$note. '....</h5>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>'.$row4['Indirizzo']. ', '.$Quartiere.'.</h5>' . PHP_EOL . '</div>';
                    echo '<div class="row"style="text-align:center;padding-top:20px;">' . PHP_EOL . '<h5>Affitto Giornaliero: '.$row4['PrezzoGiorno'].' €</h5>' . PHP_EOL . '</div>';
                    echo '<div class="row align-items-center">' . PHP_EOL . '<div class="col" style="text-align:center;margin-top:20px;">'. PHP_EOL . '<a href="information.php?IdAppartamento=' .$IdAppartamento. '" class="btn btn-warning"style="color:#d6ad60;border: radius 5px;border-color:#d6ad60;background-color:#171717">Affitta</a>' . PHP_EOL . '</div>'. PHP_EOL . '</div>' . PHP_EOL .'</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>' . PHP_EOL . '</div>';
                }
            }
        }
    }

}

    










// function Popola()
// {
//     $conn = Connettiti();
//     $rows=file('../config/CSV.csv');
//     foreach($rows as $row){
//         $columns = explode( ',', $row );
//         $username = mysqli_real_escape_string($conn, $columns[6]);
//         $password = mysqli_real_escape_string($conn, $columns[7]);
//         $email = mysqli_real_escape_string($conn, $columns[4]);
//         $nome = mysqli_real_escape_string($conn, $columns[0]);
//         $cognome = mysqli_real_escape_string($conn, $columns[1]);
//         $indirizzo = mysqli_real_escape_string($conn, $columns[5]);
//         $dob = mysqli_real_escape_string($conn, $columns[2]);
//         $telefono = mysqli_real_escape_string($conn, $columns[3]);
//         $passwordhash = password_hash($password, PASSWORD_BCRYPT);
//         $isadmin = 0;
//         echo json_encode($columns);
//         $query = "INSERT INTO utenti (Nome, Cognome, DoB, Telefono, Email, Indirizzo, Username, Password, IsAdmin) VALUES ('$nome','$cognome','$dob','$telefono','$email', '$indirizzo', '$username', '$passwordhash', '$isadmin')";
//         $result = mysqli_query($conn, $query);
//         if (!$result) {
//             die("Errore query");
//         }
//     }
//     mysqli_close($conn);
// }
