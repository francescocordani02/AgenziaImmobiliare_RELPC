<?php
//if(!defined('myconn')){
    //exit('Non puoi accedere a questa pagina');
//}
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
?>