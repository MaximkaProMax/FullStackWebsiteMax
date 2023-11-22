<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error);
}

// обработка данных из формы добавления задания
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $deadline = $_POST["deadline"];
    $description = $_POST["description"];

    // вставка данных в таблицу заданий
    $query = "INSERT INTO assigments (title, deadline, description) VALUES ('$title', '$deadline', '$description')";

    if ($conn->query($query) === TRUE) {
        echo "Задание успешно добавлено";
    } else {
        echo "Ошибка добавления задания: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Добавление заданий</title>
</head>
<body>

    <div class="container">
        <h2>Добавление заданий</h2>
        <form action="dashboard.php" method="post">
            <label for="title">Название:</label>
            <input type="text" id="title" name="title" required>

            <label for="deadline">Дедлайн:</label>
            <input type="date" id="deadline" name="deadline" required>

            <label for="description">Описание задания:</label>
            <textarea id="descriptiom" name="description" rows="4" required></textarea>

            <button type="submit">Добавить задание</button>
        </form>
    </div>
</body>
</html>