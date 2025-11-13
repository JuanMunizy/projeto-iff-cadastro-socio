<!doctype html>
<html lang="PT-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flash Fibra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <p>BEM VINDO AO ATENDIMENTO, FACA O CADASTRO PRA TER UM SUPORTE O MAIS RAPIDO POSSIVEL</p>

  <style>
    h1 {
      font-size: 30px;
      box-shadow: crimson;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      background-position: center;
      color: darkred;
    }

    body {
      background-color: black;
      background-attachment: fixed;
      background-position: center;


    }

    p {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      align-items: last baseline;
      font-size: medium;
      color: red;
    }
  </style>

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Cadastro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" , href="/">Inicio</a>
          <a class="nav-link" href="novo">Novo Usuário</a>
          <a class="nav-link" href="listar">Listar Usuários</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-3">
    <div class="container">
      <div class="row">
        <div class="col mt-5">
          <?php
          DEFINE('ROOT_PATH', dirname(__DIR__, 1));

          include ROOT_PATH . "/config/config.php";
          include ROOT_PATH . "/controller/clienteController.php";

          $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

          if ($requestUri !== '/') {
              $requestUri = rtrim($requestUri, '/');
          }
          
          switch ($requestUri) {
            case "/":
              ClienteController::index();
              break;
            case "/novo":
              ClienteController::novoUsuario();
              break;
            case "/listar":
              ClienteController::listar();
              break;
            case "/salvar":
              ClienteController::salvar();
              break;
            default:
              include ROOT_PATH . "/view/404-error.php";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="container-fluid">
      <img src="./assets/Gemini_Generated_Image_eriadleriadleria.png" alt="A melhor fibra optica do Rio de Janeiro!!!!"
        class="img-fluid" height="50px" width="400px">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>