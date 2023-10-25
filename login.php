<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

// Получаем данные из формы
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

try {
    //Create a PDO connection
    $db = PdoConnect::getInstance();

    // Прямое встраивание переменной в SQL-запрос (предполагая, что $enteredUsername безопасно санитизировано)
    $sql = "SELECT * FROM admins WHERE username = '$enteredUsername'";
    $stmt = $db->PDO->query($sql);

    // Извлекаем администратора из результата запроса
    $admin = $stmt->fetch();
    if ($admin && ($admin['password'] == $enteredPassword)) {
        // Аутентификация успешна
        session_start();
        $_SESSION['admin'] = $admin;
        header('Location: index.php');
    } else {
        // Неверные учетные данные
        header('Location: login_form.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
