<?php
require 'config.php';

$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}

$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = NULL;

try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
    exit;
}

$sqlFile = 'sql/create_db.sql';
$sqlContent = file_get_contents($sqlFile);

try {
    $pdo->exec($sqlContent);
    echo 'Le fichier SQL a été exécuté avec succès.';
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution du fichier SQL : " . $e->getMessage();
}

$pdo = null;
