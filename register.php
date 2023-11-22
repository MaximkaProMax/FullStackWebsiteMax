<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="training";

$conn = new mysqli($servername, $username, $password, $dbname) ;
    if ($conn->connect_error) {
        die("connect failed: " . $conn->connect_error);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $ POST["name"];
    $email = $ POST["email"];
    $password = password_hash($_POST["password"], PASSWORD DEFAULT) ;

$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($query) === TRUE) {

    echo "Вы зарегестрированы";
    } else {
    echo “Oww6Ka: “ . $conn->error;
    }
}