<?php
// config/connexion.php

function getConnection() {
    $host = 'localhost'; // hôte de la base de données
    $db = 'oders_management'; // nom de la base de données
    $user = 'root'; // utilisateur de la base de données
    $pass = ''; // mot de passe de la base de données
    $charset = 'utf8'; // encodage

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

?>
