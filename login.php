<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->store_result();
    
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Грешна парола.";
        }
    } else {
        echo "Потребителят не съществува.";
    }

    $stmt->close();
}
?>

<h2>Вход</h2>
<form method="post">
    Потребителско име: <input type="text" name="username" required><br>
    Парола: <input type="password" name="password" required><br>
    <input type="submit" value="Вход">
</form>
