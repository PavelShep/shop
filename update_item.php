<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz dane z formularza
    $productId = $_POST['product_id'];
    $newName = $_POST['new_name'];
    $newPrice = $_POST['new_price'];
    $newOpis = $_POST['new_opis'];
    $newKategoria = $_POST['new_kategoria'];
    $newLiczba_sztuk = $_POST['new_liczba_sztuk'];
    $newKraj = $_POST['new_kraj'];
    $newKod_pocztowy = $_POST['new_kod_pocztowy'];
    $newStan = $_POST['new_stan'];

    try {
        //Create a PDO connection
        $db = PdoConnect::getInstance();

        // Przygotuj zapytanie SQL do aktualizacji informacji o produkcie
        $sql = "UPDATE goods SET 
        name = '$newName', 
        price = '$newPrice', 
        opis='$newOpis', 
        kategoria='$newKategoria', 
        liczba_sztuk='$newLiczba_sztuk', 
        kraj='$newKraj', 
        kod_pocztowy='$newKod_pocztowy', 
        stan='$newStan' 
        WHERE id = '$productId'";
        $stmt = $db->PDO->query($sql);

        header('Location: index.php');

    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}
?>
