<?php
$username = 'root';
$password = '';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true
);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ars;charset=utf8', $username, $password, $options);
} catch (PDOException $e) {
    echo "Couldn't connect to database ", $e->getMessage();
}