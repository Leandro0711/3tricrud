<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Ajuste estes 4 dados para os do SEU MySQL local (XAMPP/WAMP).
    // Por padrão o XAMPP usa usuário "root" e senha em branco ("").
    $servidor = "localhost";
    $banco    = "escola";
    $user     = "root";
    $pass     = "fitodb";

    try {
        $conn = new PDO(
            "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
            $user,
            $pass
        );

        $conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );

        // Garante que a conexão sempre fale utf8mb4 com o banco,
        // evitando acentos corrompidos (ex.: "Período" -> "PerÃ­odo").
        $conn->exec("SET NAMES 'utf8mb4'");

    } catch (PDOException $erro) {

        die(
            "Não foi possível conectar ao banco de dados.<br>" .
            "Verifique se o MySQL está ligado e se o banco 'escola' foi criado " .
            "(veja banco_escola.sql).<br>Detalhe técnico: " . $erro->getMessage()
        );

    }
