<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
$itemName = $_POST['name'];
$itemPrice = $_POST['price'];

// Обработка загрузки изображения
$imagePath = 'static/img/' . $_FILES['image']['name']; // Путь для сохранения изображения

if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
    try {
        //Create a PDO connection
        $db = PdoConnect::getInstance();

        $sql = "INSERT INTO goods (name, price, image) VALUES ('$itemName', '$itemPrice', '$imagePath')";
        $stmt = $db->PDO->query($sql);

        header('Location: index.php');

    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
} else {
    echo "Błąd ładowania obrazu.";
}

?>
