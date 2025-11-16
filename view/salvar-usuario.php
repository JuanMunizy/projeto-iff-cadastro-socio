<?php

if (isset($_GET["acao"])) {
    
    switch ($_GET["acao"]) {
        
        case 'cadastrar':
            
            $nome        = $_POST["nome"] ?? '';
            $email       = $_POST["email"] ?? '';
            $senha_plana = $_POST["senha"] ?? '';
            $aniversario = $_POST["aniversario"] ?? '';
            $telefone    = $_POST["telefone"] ?? '';

            $senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

            $sql = "INSERT INTO clientes (nome, telefone, data_de_nascimento, email, senha) 
                    VALUES (?, ?, ?, ?, ?)";
            $db = Database::connect();
            $stmt = $db->prepare($sql);
            
            if ($stmt === false) {
                print "<script>alert('Erro na preparação do SQL. Motivo: " . $con->error . "');</script>";
                print "<script>location.href='index.php?page=listar';</script>";
                exit;
            }
            
            $stmt->bind_param("sssss", $nome, $telefone, $aniversario, $email, $senha_hash);
            
            if ($stmt->execute()) {
                print "<script>alert('Usuário cadastrado com sucesso!');</script>";
            } else {
                print "<script>alert('Erro ao cadastrar: " . $stmt->error . "');</script>";
            }
            
            $stmt->close();
            print "<script>location.href='/';</script>";
            
            break;

        case 'editar':
            
            break; 

        case 'excluir':
            
            break;
    }
}