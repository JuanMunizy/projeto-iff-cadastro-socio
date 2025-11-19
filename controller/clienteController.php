<?php

final class ClienteController {
    
    public static function index() {
        echo "<h1>Bem-vindo! Selecione uma opção no menu acima.</h1>";
    }
    
    public static function novoUsuario() {
        include ROOT_PATH . "/view/novo-usuario.php";
    }
    
    public static function listar() {
        $connn = Database::connect();
        $sql = "SELECT * FROM clientes";
        $res = $connn->query($sql);
        $qtd = $res->num_rows;

        include ROOT_PATH . "/view/listar-usuarios.php";

        $connn->close();
    }
    
    public static function salvar() {
        include ROOT_PATH . "/view/salvar-usuario.php";
    }
    
    public static function editar() {
        if (!isset($_REQUEST['id'])) {
            header('Location: /listar');
            exit;
        }
        $id = $_REQUEST['id'];

        $connn = Database::connect();
        $sql = "SELECT * FROM clientes WHERE id = $id";
        $res = $connn->query($sql);
        
        $cliente_data = $res->fetch_object();
        $connn->close();

       include ROOT_PATH . "/view/editar-usuario.php";
    }
    
    public static function excluir() {
        if (!isset($_REQUEST['id'])) {
            header('Location: /listar');
            exit;
        }

        $id = $_REQUEST['id'];
        
        $connn = Database::connect(); 
        $sql = "DELETE FROM clientes WHERE id = $id";
        $res = $connn->query($sql);
        
        session_start();
        if ($res) {
            $_SESSION['msg_status'] = 'success';
            $_SESSION['msg_text'] = 'Usuário excluído com sucesso!';
        } else {
            $_SESSION['msg_status'] = 'error';
            $_SESSION['msg_text'] = 'Erro ao excluir usuário.';
        }
        
        $connn->close();
        header('Location: /listar');
        exit;
    }
}
?>