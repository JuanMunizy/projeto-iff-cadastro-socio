<?php

require_once 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: listar-usuarios.php");
    exit;
}

$id = $_POST["id"] ?? null;
$nome = $_POST["nome"] ?? null;
$email = $_POST["email"] ?? null;
$telefone = $_POST["telefone"] ?? null;

if (empty($id) || !is_numeric($id)) {
    die("Erro: ID de cliente ausente ou inválido.");
}

try {
    $conn = Database::connect();

    $sql_update = "UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id = ?";
    
    $stmt = $conn->prepare($sql_update);
    
    if ($stmt === false) {
        die("Erro na preparação da query: " . $conn->error);
    }

    $stmt->bind_param("sssi", $nome, $email, $telefone, $id); 
    
    if ($stmt->execute()) {
        header("Location: listar-usuarios.php?status=editado");
        exit;
    } else {
        die("Erro ao atualizar o registro: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) { 
    die("Erro de Processamento: " . $e->getMessage());
}

?>