<?php
include('includes/db.php'); // Подключаем файл для работы с БД

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Ошибка! Некорректный email";
    exit;
}
if (empty($name) || empty($email) || empty($message)){
    echo "Не заполнено поле";
    exit;
}

try {
    // Создаем SQL-запрос для вставки данных в таблицу
    $sql = "INSERT INTO Messages (name, email, message) VALUES (:name, :email, :message)";

    // Подготавливаем запрос
    $stmt = $pdo->prepare($sql);

    // Привязываем параметры
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    // Выполняем запрос
    $stmt->execute();

    // Если запрос выполнен успешно, перенаправляем на страницу с сообщениями
    header('Location: messages.php');
    exit; // Прекращаем выполнение скрипта, чтобы не было дальнейшего вывода

} catch (PDOException $e) {
    // Если произошла ошибка при подключении или выполнении запроса
    echo "Ошибка при отправке данных: " . $e->getMessage();
}
?>
