<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // криптиране

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Регистрацията е успешна. <a href='login.php'>Влез тук</a>";
    } else {
        echo "Грешка: " . $stmt->error;
    }

    $stmt->close();
}
?>

<h2>Регистрация</h2>
<form method="post">
    Потребителско име: <input type="text" name="username" required><br>
    Парола: <input type="password" name="password" required><br>
    <input type="submit" value="Регистрация">
</form>
