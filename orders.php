<!DOCTYPE html>
<html>
<head>
    <title>Wszystkie zamówienia</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });

    try {
        //Create a PDO connection
        $db = PdoConnect::getInstance();

        // Przygotuj zapytanie SQL do wyświetlenia wszystkich rekordów z tabeli goods
        $sql = "SELECT * FROM orders";
        $stmt = $db->PDO->query($sql);

        echo "<div class='container'>";
        echo "<h3 align='center'>Zawartość tabeli 'orders'</h3>";
        // Wyświetl dane z tabeli
        echo "<table class='table table-bordered'>
        <tr>
            <th>ID</th>
            <th>Nazwisko i Imie</th>
            <th>Telefon</th>
            <th>E-mail</th>
            <th>Komentarz</th>
            <th>ID towaru</th>
        </tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['fio'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['comment'] . "</td>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
    ?>
</body>
</html>


