<?php 
$host = 'localhost';
$dbname = 'messages';
$username = 'root';
$password = 'root';

try {
    // Создаем объект подключения (PDO)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Устанавливаем режим обработки ошибок в исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Если произошла ошибка при подключении
    echo "Ошибка подключения: " . $e->getMessage();
}



?>