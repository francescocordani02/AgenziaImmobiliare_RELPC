<?php
if(!defined('myconn')){
    exit('Non puoi accedere a questa pagina');
}
function Connettiti(){
    $hostname="localhost";
    $username="relpc";
    $password="";
    $db_name="relpc";

    $conn=mysqli_connect($hostname,$username,$password,$db_name);
    if(!$conn){
        die("Connection failed");
    }
    return $conn;
}
class connection {
    private $host = 'localhost';
    private $dbName = 'relpc';
    private $user = 'relpc';
    private $pass = '';

    public function connect() {
        try {
            $conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch( PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }
}
?>
?>