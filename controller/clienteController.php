<?php

final class ClienteController
{

    public static function index()
    {
        echo "<h1>Bem-vindo! Selecione uma opção no menu acima.</h1>";
    }

    public static function novoUsuario()
    {
        include ROOT_PATH . "/view/novo-usuario.php";
    }

    public static function listar()
    {
        $conn = Database::connect();
        $sql = "SELECT * FROM clientes";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        include ROOT_PATH . "/view/listar-usuarios.php";

        $conn->close();
    }

    public static function salvar()
    {
        include ROOT_PATH . "/view/salvar-usuario.php";
    }

    public static function editar()
    {
        if (!isset($_REQUEST['id'])) {
            header('Location: /listar');
            exit;
        }
        $id = $_REQUEST['id'];

        $conn = Database::connect();
        $sql = "SELECT * FROM clientes WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $res = $stmt->get_result();
        $cliente_data = $res->fetch_object();

        $stmt->close();
        $conn->close();

        include ROOT_PATH . "/view/editar-usuario.php";
    }

    public static function excluir()
    {
        if (!isset($_REQUEST['id'])) {
            header('Location: /listar');
            exit;
        }

        $id = $_REQUEST['id'];

        $conn = Database::connect();
        $sql = "DELETE FROM clientes WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $res = $stmt->execute();

        session_start();
        if ($res) {
            $_SESSION['msg_status'] = 'success';
            $_SESSION['msg_text'] = 'Usuário excluído com sucesso!';
        } else {
            $_SESSION['msg_status'] = 'error';
            $_SESSION['msg_text'] = 'Erro ao excluir usuário.';
        }

        $stmt->close();
        $conn->close();
        header('Location: /listar');
        exit;
    }

    public static function salvarEdicao()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            header("Location: /listar");
            exit;
        }

        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $telefone = $_POST['telefone'] ?? null;

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
                $stmt->close();
                $conn->close();

                header("Location: /listar");
                exit;
            } else {
                $stmt->close();
                $conn->close();
                die("Erro ao atualizar o registro: " . $stmt->error);
            }
        } catch (Exception $e) {
            die("Erro de Processamento: " . $e->getMessage());
        }
    }
}
