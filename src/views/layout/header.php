
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academia Control</title>
  <link rel="stylesheet" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<style>
  .content {
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  background-color: #f9f9f9;
  max-width: 400px;
  margin: 0 auto;
}

.content h1 {
  text-align: center;
}

.content form {
  display: flex;
  flex-direction: column;
}

.content label {
  margin-bottom: 5px;
}

.content input[type="text"],
.content textarea,
.content input[type="number"] {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
}

.content button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  margin-top: 20px; /* Adicione um espaçamento acima do botão */
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.content button[type="submit"]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>
  <!-- Header -->
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Academia Control</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="clienteDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Cliente
          </a>
          <div class="dropdown-menu" aria-labelledby="clienteDropdown">
            <a class="dropdown-item" href="/cadastro-cliente">Cadastro</a>
            <a class="dropdown-item" href="/lista-cliente">Listar</a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="planoDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Plano
          </a>
          <div class="dropdown-menu" aria-labelledby="planoDropdown">
            <a class="dropdown-item" href="/cadastro-plano">Cadastro</a>
            <a class="dropdown-item" href="/lista-plano">Listar</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="aulaDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Aula
          </a>
          <div class="dropdown-menu" aria-labelledby="aulaDropdown">
            <a class="dropdown-item" href="/cadastro-aula">Cadastro</a>
            <a class="dropdown-item" href="/lista-aula">Listar</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Abrir submenus ao passar o mouse
  $('.nav-item.dropdown').hover(function () {
    $(this).addClass('show').find('.dropdown-menu').addClass('show');
  }, function () {
    $(this).removeClass('show').find('.dropdown-menu').removeClass('show');
  });
</script>