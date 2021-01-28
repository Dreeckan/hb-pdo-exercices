<?php
// Ce fichier n'est pas versionné avec git, il faut le recréer quand on clone le projet
require_once 'config.inc.php';// Pour récupérer les variables $dbName, $dbHost, $dbUser et $dbPass

$dsn = 'mysql:dbname='.$dbName.';host='.$dbHost;

try {
    $connection = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    exit('Connexion échouée : ' . $e->getMessage());
}
