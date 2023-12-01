<?php
$host = 'localhost:3308';
$dbname = 'useredit'; 
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fout bij databaseverbinding: " . $e->getMessage());
}

?>
