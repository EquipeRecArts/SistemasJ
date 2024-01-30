<?php
require_once '../conf.php';



?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <title>Início</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>

<body>

    <?php include 'navbar.php' ?>
    
    
<div style="max-width:95%">
    <div class="d-none d-lg-block">
  <div class="row marcador align-items-center">
    <div class="col mx-auto text-center">
      <img class="img-responsive" src="../img/logo.png" style="max-height: 300px">
    </div>
  </div>
</div>

<div class="d-lg-none">
  <div class="row marcador align-items-center">
    <div class="col mx-auto text-center">
      <img class="img-responsive" src="../img/logo.png" style="max-width: 80vw;">
    </div>
  </div>
</div>
</div>

    <?php include 'rodape.php' ?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/formatadores.js"></script>

</body>

</html>