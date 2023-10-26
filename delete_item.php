<?php
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });
    // Pobierz identyfikator pozycji z formularza
    $itemId = $_POST['item_id'];

    try {
        //Create a PDO connection
        $db = PdoConnect::getInstance();

        // Zapytanie SQL do usunięcia pozycji
        $sql = "DELETE FROM goods WHERE id = '$itemId'";
        $stmt = $db->PDO->query($sql);

        header('Location: index.php');

    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
?>
