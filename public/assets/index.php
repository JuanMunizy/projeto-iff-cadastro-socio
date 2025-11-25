<!doctype html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
  </head>
  <body>
    
    <style>
      h1 {
        font-size: 30px;
        box-shadow: crimson;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-position: center;
        color: darkred;
      }

    body {
      background-color: whitesmoke;
      background-attachment: fixed;
      background-position: center;


    }
    switch {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: black;
    }

      
      
    </style>
   
    <nav class="navbar navbar-expand-lg bg-body-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Cadastro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            <a class="nav-link" href="index.php?page=novo">Novo Usuário</a>
            <a class="nav-link" href="index.php?page=listar">Listar Usuários</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <div class="container">
        <div class="row">
          <div class="col mt-5">
            <?php
            include("config.php");
             switch(@$_REQUEST["page"]){          
          case "novo":
            include("novo-usuario.php");
            break;
          case "lista":
            include("listar-usuarios.php");  
            break;
            case "salvar":
              include("salvar-usuario.php");
              break;
          default:
            echo "<h1>Bem-vindo! Selecione uma opção no menu acima.</h1>";
            break;
        }
        ?>
          </div>

        </div>
      </div>

      
       
      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>