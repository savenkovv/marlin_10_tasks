<?php
session_start();
$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=marlin", "admin","");
$sql = "SELECT * FROM task_10 WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($task)) {
  $message = "Запись уже есть!!!";
  $_SESSION['danger'] = $message;  
  header("Location: task_10.php");
  exit;
}
$sql = "INSERT INTO task_10 (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$message = "Запись добавлена";
$_SESSION['success'] = $message;  
header("Location: task_10.php");

?>