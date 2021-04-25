<?php
    $currentpage=$_SESSION['current_page'];
?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href=<?php if($currentpage=="index"){echo "css/style.css";}else{echo "../css/style.css";}?>>
<link rel="stylesheet" href=<?php if($currentpage=="index"){echo "css/styleBootstrap.css";}else{echo "../css/styleBootstrap.css";}?>>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script  type = "text/javascript"  src ="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script  type = "text/javascript" src ="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script  type = "text/javascript"  src ="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel = "stylesheet" type = "text/css"  href ="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src=<?php if($currentpage!="index"){echo "../js/googlemap.js";} ?>></script>
<script type="text/javascript" src=<?php if($currentpage!="index"){echo "../js/index.js";} ?>></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<title>RELPC</title>