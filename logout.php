<?php
session_start();

// Удаляем все данные из сессии
$_SESSION = [];

// Уничтожаем сессию
session_destroy();

// Перенаправляем на главную страницу
header('Location: index.php');
exit;
?>
