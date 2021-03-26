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
    $query="INSERT INTO utenti (Nome, Cognome, DoB, Telefono, Email, Indirizzo, Username, Password, IsAdmin) VALUES ('$nome','$cognome','$dob','$telefono','$email', '$indirizzo', '$username', '$passwordhash', '$isadmin')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Errore query");    
    }else{
        $_SESSION['username'] = $username;
        $_SESSION['NomeCognome'] = $nome." ".$cognome;
        echo "<div class='form1'><h3>Ti sei registrato con successo.</h3><br/>Cliccare qui per <a href='../private/test.php'>andare alla homepage.</a></div>";
    }   
}

function login($username, $password){
    global $conn;
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT Nome, Cognome, Username, Password FROM utenti WHERE (Username='$username')";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    $Riga = $result->fetch_assoc();
    if($rows==1){
        if(password_verify($password, $Riga['Password'])){
            $_SESSION['username'] = $Riga['username'];
            $_SESSION['NomeCognome'] = $Riga['nome']." ".$Riga['cognome'];
            if($Riga['isadmin'] == 1){
                 
            }else{
                header('Location: ../private/test.php'); 
            }
        }
    }else{
        echo "<div class='form1'><h3>Username o password errati</h3><br/>Cliccare qui per <a href='login.php'>Riprovare</a></div>";
    }
}

?>