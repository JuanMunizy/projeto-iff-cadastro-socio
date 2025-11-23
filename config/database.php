<?php


class Database {
    private const HOST = "localhost";
    private const USER = "root"; 
    private const PASS = "";    
    private const DB = "clientes"; 
    public static function connect() {
        // Usa mysqli
        $conn = new mysqli(self::HOST, self::USER, self::PASS, self::DB);

        if ($conn->connect_error) {
            die("Falha na Conexão: " . $conn->connect_error);
        }
        return $conn;
    }
}
