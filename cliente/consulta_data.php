<?php
require_once '../conf.php';

$PH3A = new PH3A;

if (isset($_POST['consultar'])) {
  $documento_acessado = $_POST['documento'];
  $token = $PH3A->Logar();
  $dados = $PH3A->Consultar_Data($documento_acessado, $token);
  echo '<pre>';
  print_r($dados);
  echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
  <title>Consultar Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/bootstrap-icons.min.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">



</head>

<body>

  <?php include 'navbar.php' ?>

  <div class="container marketing">

    <?php
    if (isset($retorno)) {
      echo $retorno;
    }
    ?>

    <hr class="main-color">
    <div style="text-align:center;">
      <p class="h3 main-color-hard">Consulta Data</p>
      <p class="lead">Obter informações CPF/CNPJ</p>
    </div>
    <hr class="main-color-hard">

    <form action="" method="POST">
      <p class="text-center">Se você tem dados como cidade, nome, número, pode consultar com essas informações <a href="consulta_avancado">aqui</a>!</p>
      <div class="input-group">
        <div class="input-group-text">CPF/CNPJ</div>
        <input type="text" class="form-control" id="documento" <?php if (isset($_GET['documento'])) {
                                                                  echo 'value="' . $_GET['documento'] . '"';
                                                                } ?> placeholder="Dígitos" name="documento" oninput="formatarDocumento()" required minlength="14" maxlength="18">
        <div class="input-group-text"><i class="bi bi-search"></i></div>
      </div>
      <hr class="main-color">
      <button class="w-100 btn btn-success" name="consultar" value="<?php echo $chave_gerada; ?>" id="consultar">Consultar</button>
    </form>
    <hr class="main-color-hard">

  </div>



  <?php include 'rodape.php' ?>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/formatadores.js"></script>
  <script>
    function ModButton() {
      var button = document.getElementById('consultar');
      button.disabled = true;
      button.innerHTML = 'Carregando... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
      return true;
    }
  </script>
  <script>
    function formatarDocumento() {
      let input = document.getElementById('documento');
      let valor = input.value;
      valor = valor.replace(/\D/g, '');
      if (valor.length === 11) {
        // Formata como CPF: XXX.XXX.XXX-XX
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      } else if (valor.length === 14) {
        // Formata como CNPJ: XX.XXX.XXX/XXXX-XX
        valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
      }
      input.value = valor;
    }
  </script>

  <?php
  if (isset($dados)) {
    echo '
<div class="modal fade" id="modalResposta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Resultado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<script>
new bootstrap.Modal(document.getElementById("modalResposta")).show();
</script>
    ';
  }
  ?>


</body>

</html>