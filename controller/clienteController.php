<?php

final class ClienteController {
    public static function index() {
        echo "<h1>Bem-vindo! Selecione uma opção no menu acima.</h1>";
    }
    
    public static function novoUsuario() {
        include ROOT_PATH . "/view/novo-usuario.php";
    }
    
    public static function listar() {
        include ROOT_PATH . "/view/listar-usuarios.php";
    }
    
    public static function salvar() {
        include ROOT_PATH . "/view/salvar-usuario.php";
    }
}