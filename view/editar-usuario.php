<?php
require_once 'C:\xampp\htdocs\crudjuan\config\config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de usuário inválido.");
}

$id_usuario = $_GET['id'];
$usuario = null;

try {
    $conn = Database::connect();
    

    $sql_select = "SELECT id, nome, email, telefone  FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql_select);

    

    $stmt->bind_param("i", $id_usuario); 
    $stmt->execute();   
    
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
    } else {
        die("Usuário não encontrado.");
    }
    
    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    die("Erro de Banco de Dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Editar Usuário</title>
    </head>
<body>
   <div class="container mt-5">
    <h1 class="mb-4">Editar Usuário: <?php echo htmlspecialchars($usuario['nome']); ?></h1>
    
    <form action="/editar/salvar" method="POST">
    
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
    
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control"
                value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
        </div>
    
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        </div>
    
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control"
                value="<?php echo htmlspecialchars($usuario['telefone']); ?>">
        </div>
        
        </form>
</div>>

            <button type="submit" class="btn btn-success">💾 Salvar Edição</button>
            <a href="listar-usuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>