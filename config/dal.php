<?php
if(!defined('mydal')){
    exit('Non puoi accedere a questa pagina');
}
define('myconn', TRUE);
include "Connection.php";
$conn=Connettiti();

function Registrazione($nome, $cognome, $username, $email, $password, $indirizzo, $dob, $telefono){
    global $conn;
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    $email = mysqli_real_escape_string($conn,$email);
    $nome = mysqli_real_escape_string($conn,$nome);
    $cognome = mysqli_real_escape_string($conn,$cognome);
    $indirizzo = mysqli_real_escape_string($conn,$indirizzo);
    $dob = mysqli_real_escape_string($conn,$dob);
    $telefono = mysqli_real_escape_string($conn,$telefono);
    $passwordhash = password_hash($password, PASSWORD_BCRYPT);
    $isadmin=0;
    $querycontrollousername="SELECT Username FROM utenti WHERE (Username='$username')";
    $resultcontrollousername=mysqli_query($conn, $querycontrollousername);
    $rowscontrollousername=mysqli_num_rows($resultcontrollousername);
    $querycontrolloemail="SELECT Email FROM utenti WHERE (Email='$email')";
    $resultcontrolloemail=mysqli_query($conn, $querycontrolloemail);
    $rowscontrolloemail=mysqli_num_rows($resultcontrolloemail);
    if($rowscontrollousername>0){
        echo "<div class='form1'><h3>Username già esistente.</h3><br/>Cliccare qui per <a href='registrazione.php'>riprovare.</a></div>";
    }else if($rowscontrolloemail>0){
        echo "<div class='form1'><h3>Email già esistente.</h3><br/>Cliccare qui per <a href='registrazione.php'>riprovare.</a></div>";
    }else{
        $query="INSERT INTO utenti (Nome, Cognome, DoB, Telefono, Email, Indirizzo, Username, Password, IsAdmin) VALUES ('$nome','$cognome','$dob','$telefono','$email', '$indirizzo', '$username', '$passwordhash', '$isadmin')";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("Errore query");    
        }else{
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['NomeCognome'] = $nome." ".$cognome;
            $_SESSION['isAdmin'] = 0;
            echo "<div class='form1'><h3>Ti sei registrato con successo.</h3><br/>Cliccare qui per <a href='../private/test.php'>andare alla homepage.</a></div>";
        }   
    }
}

function login($username, $password){
    global $conn;
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT Nome, Cognome, Username, Password, IsAdmin FROM utenti WHERE (Username='$username')";
    $result = mysqli_query($conn,$query) or die("Errore query");
    $rows = mysqli_num_rows($result);
    $Riga = $result->fetch_assoc();
    if($rows==1){
        if(password_verify($password, $Riga['Password'])){
            session_start();
            $_SESSION['Username'] = $Riga['Username'];
            $_SESSION['NomeCognome'] = $Riga['Nome']." ".$Riga['Cognome'];
            $_SESSION['isAdmin'] = $Riga['IsAdmin'];
            if($Riga['IsAdmin'] == 1){
                
            }else{
                header('Location: ../private/test.php'); 
            }
        }else{
            echo "<div class='form1'><h3>Username o password errati</h3><br/>Cliccare qui per <a href='login.php'>Riprovare</a></div>";
        }
    }else{
        echo "<div class='form1'><h3>Username o password errati</h3><br/>Cliccare qui per <a href='login.php'>Riprovare</a></div>";
    }
}
