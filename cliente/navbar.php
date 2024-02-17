<?php
if (isset($_POST['deslogar'])) {
  header('location: ../index?deslogar');
  exit();
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid" id="nav">
    <a class="navbar-brand" href="index">LOCALIZADO.app</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consulta
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="consulta_data">Busca simples</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="consulta_avancado">Busca avançada</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="consulta_protesto">Busca protesto</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="consulta_processo">Busca processo</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="historico">Histórico de consultas</a></li>
            </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Créditos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="creditos_comprar">Comprar créditos</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="creditos_consultar">Consultar saldo</a></li>
            </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="perfil">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faturamento">Faturamento</a>
      </li>
        
        
      </ul>
      <form class="d-flex" method="POST">
        <button class="btn btn-outline-success" id="deslogar" name="deslogar" type="submit">Deslogar</button>
      </form>
    </div>
  </div>
</nav>


<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid" id="nav" style="display: flex;justify-content: center;align-items: center;">
    <a class="navbar-brand text-center" href="creditos_comprar" style="font-size: 14px;">Saldo: XXX créditos</a>
    </div>
        </nav>

<div id="nav_padding"></div>