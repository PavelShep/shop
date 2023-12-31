<!DOCTYPE html>
<html>
<head>
    <title>Wszystkie produkty</title>
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
        $sql = "SELECT * FROM goods";
        $stmt = $db->PDO->query($sql);

        echo "<div class='container'>";
        echo "<h3 align='center'>Wszystkie towary</h3>";
        // Wyświetl dane z tabeli
        echo "<table class='table table-bordered'>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Cena (zł)</th>
        </tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
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


