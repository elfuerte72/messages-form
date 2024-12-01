<?php
include('includes/db.php'); // Подключаем файл для работы с БД

try {
    // Запрос на выборку всех сообщений из таблицы
    $sql = "SELECT * FROM Messages ORDER BY id DESC"; // Если есть id, сортируем по убыванию
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Получаем все сообщения
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Ошибка при получении сообщений: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все сообщения</title>
    <link rel="stylesheet" href="style.css"> <!-- Подключаем стиль, если нужно -->
</head>
<body>

    <h1>Все отправленные сообщения</h1>

    <?php if (count($messages) > 0): ?>
        <ul>
            <?php foreach ($messages as $message): ?>
                <li>
                    <strong>Имя:</strong> <?= htmlspecialchars($message['name']); ?><br>
                    <strong>Email:</strong> <?= htmlspecialchars($message['email']); ?><br>
                    <strong>Сообщение:</strong> <?= nl2br(htmlspecialchars($message['message'])); ?><br>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Нет сообщений.</p>
    <?php endif; ?>

</body>
</html>
