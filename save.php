<?php
$pdo = new PDO("mysql:host=localhost;dbname=marlin", "admin","");
$text = $_POST['text'];
$statement = $pdo->prepare("INSERT INTO task_9 (text) VALUES (:text) ");
$statement->execute(['text' => $text]);
header("Location: task_9.php");

?>