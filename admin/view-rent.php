<?php
    $_SESSION['current_page']="view-rent";
    include ("../template/template.php");
    define('mydal', TRUE);
    include '../config/dal.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>View Rent</title>
</head>
<body>
    <div class="content">
    <table class="table" style="width: 75%; margin: 30px auto; ">
        <thead class="table-dark">
        <tr>
            <th scope="col">Nome immobile</th>
            <th scope="col">Nome Locatario</th>
            <th scope="col">Data inizio</th>
            <th scope="col">Data fine</th>
            <th scope="col">Costo totale €</th>
        </tr>
        </thead>
          <tbody>
            
          </tbody>
        </table>
    </div>
</body>
<?php include ("../template/footer.php");?>
</html>