<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

// Получаем данные из формы регистрации
$username = trim($_POST['username']);
//echo trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$role = 'user'; // По умолчанию обычный пользователь

try {
    // Подключаемся к базе данных
    $db = PdoConnect::getInstance();

    // Проверяем, существует ли пользователь с таким именем
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->PDO->prepare($sql);
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        // Пользователь уже существует
        header('Location: register_form.php?error=exists');
        exit;
    }

    // Вставляем нового пользователя в базу данных
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $db->PDO->prepare($sql);
    $stmt->execute([$username, $email, $password, $role]);

    // Успешная регистрация
    header('Location: login_form.php?success=registered');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
