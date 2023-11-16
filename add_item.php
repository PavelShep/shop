<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
$itemName = $_POST['name'];
$itemPrice = $_POST['price'];
$itemOpis = $_POST['opis'];
$itemKategoria = $_POST['kategoria'];
$itemLiczba_sztuk = $_POST['liczba_sztuk'];
$itemKraj = $_POST['kraj'];
$itemKod_pocztowy = $_POST['kod_pocztowy'];
$itemStan = $_POST['stan'];

// Process image loading
$imagePath = 'static/img/' . $_FILES['image']['name']; // Path to save the image

if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
    try {
        //Create a PDO connection
        $db = PdoConnect::getInstance();

        $sql = "INSERT INTO goods (name, price, image, opis, kategoria, liczba_sztuk, kraj, kod_pocztowy, stan) 
            VALUES 
            ('$itemName', 
            '$itemPrice', 
            '$imagePath', 
            '$itemOpis', 
            '$itemKategoria',
            '$itemLiczba_sztuk',
            '$itemKraj',
            '$itemKod_pocztowy',
            '$itemStan')";
            
        $stmt = $db->PDO->query($sql);

        header('Location: index.php');

    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
} else {
    echo "Błąd ładowania obrazu.";
}

?>
