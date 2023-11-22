<?php
// подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// проверка подключения
if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error);
}

// обработка данных из формы входа
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $query = "SELECT * FROM users WHERE  email=?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Ошибка в запросе: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assos();
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user_id"] = $user["id"];
            echo "Вход выполнен";
        } else {
            echo "Неверный пароль";
        }
    } else {
        echo "Пользователь с такими данными не существует";
    }
}

//закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Вход</title>
</head>
<body>

    <div class="container">
        <h2>Вход</h2>
        <form action="login.php" method="post">
            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>