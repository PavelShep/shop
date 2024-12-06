<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

try {
    $db = PdoConnect::getInstance();

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->PDO->prepare($sql);
    $stmt->execute([$enteredUsername]);
    $user = $stmt->fetch();

    if ($user && $user['password'] == $enteredPassword) {
        session_start();
        $_SESSION['user'] = $user;
        if ($user['role'] == 'admin') {
            $_SESSION['admin'] = true;
        }
        header('Location: index.php');
    } else {
        header('Location: login_form.php?error=invalid');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
