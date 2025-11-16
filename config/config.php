<?php

final class Database {
	private const HOST = 'localhost';
	private const USER = 'root';
	private const PASS = '';
	private const BASE = 'clientes'; 

	public static function connect(): mysqli {
		$conn = new mysqli(
			self::HOST,
			self::USER,
			self::PASS,
			self::BASE
		);
		echo "CONECTADO AO BANCO DE DADOS";

		if (mysqli_connect_errno()) {
    			echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    			exit();
		}
		return $conn;
	}
}