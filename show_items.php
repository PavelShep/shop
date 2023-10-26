<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

try {
    //Create a PDO connection
    $db = PdoConnect::getInstance();

    // Przygotuj zapytanie SQL do wyświetlenia wszystkich rekordów z tabeli goods
    $sql = "SELECT * FROM goods";
    $stmt = $db->PDO->query($sql);

    // Wyświetl dane z tabeli
    echo "<h2>Zawartość tabeli 'goods'</h2>";
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Cena</th>
    </tr>";

    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}
?>
