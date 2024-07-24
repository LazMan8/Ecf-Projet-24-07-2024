<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


try {
    $options = [
        // utiliser des exceptions pour gérer les erreurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // utiliser uniquement des tableau associatifs
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // laisser mysql gérer les requêtes préparées
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    $pdo = new PDO('mysql:host=' . $_ENV['DBHOST'] . ';dbname=' . $_ENV['DBNAME'] . ';charset=utf8mb4', $_ENV['DBUSER'], $_ENV['DBPASS'], $options);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    echo ($exception);
    exit('<br><b>Erreur de connexion à la base de données</b>');
}
