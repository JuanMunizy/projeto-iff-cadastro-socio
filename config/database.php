<?php
// Arquivo: crudjuan/config/config.php

class Database {
    private const HOST = "localhost";
    private const USER = "root"; // Altere para seu usuário
    private const PASS = "";     // Altere para sua senha
    private const DB = "clientes"; // Altere para o nome do banco

    public static function connect() {
        // Usa mysqli
        $conn = new mysqli(self::HOST, self::USER, self::PASS, self::DB);

        if ($conn->connect_error) {
            die("Falha na Conexão: " . $conn->connect_error);
        }
        return $conn;
    }
}
