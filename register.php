<?php

$servername = "localhost";
$username = "root";
$password = "3";
$dbname = "training";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "Вы зарегестрированы";
    } else {
        echo "Ошибка: " . $conn->error;
    }
}

?>

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Peructpauma</title>
    </head>
<body>

<div class="container">
    <h2>Peructpauma</h2>

<form action="register.php" method="post">
    <label for="name">Uma:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Nouta:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Maponb:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">3apeructpupoBatbca</button>
</form>
</div>

</body>
</html>