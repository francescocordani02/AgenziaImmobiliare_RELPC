<?php
    session_start();
    echo "<p> Username: " . $_SESSION['Username'] . "<br>" . "Nome e cognome: " . $_SESSION['NomeCognome'] . "</p>";
?>