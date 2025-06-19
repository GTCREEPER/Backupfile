<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Добре дошъл!</h2>
<p>Успешно влезе в системата.</p>
<a href="logout.php">Изход</a>
