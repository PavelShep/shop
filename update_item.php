<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz dane z formularza
    $productId = $_POST['product_id'];
    $newName = $_POST['new_name'];
    $newPrice = $_POST['new_price'];

    try {
        //Create a PDO connection
        $db = PdoConnect::getInstance();

        // Przygotuj zapytanie SQL do aktualizacji informacji o produkcie
        $sql = "UPDATE goods SET name = '$newName', price = '$newPrice' WHERE id = '$productId'";
        $stmt = $db->PDO->query($sql);

        header('Location: index.php');

    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}
?>
