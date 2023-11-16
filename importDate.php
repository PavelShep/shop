<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


try {
    $db = PdoConnect::getInstance();
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

if (isset($_POST["submit"])) {
    if (isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0) {
        $csvFile = $_FILES["csv_file"]["tmp_name"];

        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            $stmt = $db->PDO->prepare("INSERT INTO goods (id, name, price, image, opis, kategoria, liczba_sztuk, kraj, kod_pocztowy, stan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE name = VALUES(name), price = VALUES(price), image = VALUES(image), opis = VALUES(opis), kategoria = VALUES(kategoria), liczba_sztuk = VALUES(liczba_sztuk), kraj = VALUES(kraj), kod_pocztowy = VALUES(kod_pocztowy), stan = VALUES(stan)");
            if (!$stmt) {
                die("Błąd podczas przygotowywania zapytania SQL: " . $db->PDO->errorInfo()[2]);
            }

            $existingIds = []; // List of existing IDs

            // Skip first line (headers) ";" is a separator
            fgetcsv($handle, 1000, ";");

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $id = $data[0];
                $name = $data[1];
                $price = $data[2];
                $image = $data[3];
                $opis = $data[4]; 
                $kategoria = $data[5]; 
                $liczba_sztuk = $data[6]; 
                $kraj = $data[7];
                $kod_pocztowy = $data[8];
                $stan = $data[9];
                $existingIds[] = $id; // Add ID to the list of existing ones

                // Bind the values to the parameters in the SQL query and execute the query
                if (!$stmt->execute([$id, $name, $price, $image, $opis, $kategoria, $liczba_sztuk, $kraj, $kod_pocztowy, $stan])) {
                    die("Błąd wstawiania/aktualizowania danych: " . $stmt->errorInfo()[2]);
                }
            }

            fclose($handle); // Close the CSV file

            // Remove records that are not in the imported CSV
            $existingIdsStr = implode(',', $existingIds);
            $deleteSql = "DELETE FROM goods WHERE id NOT IN ($existingIdsStr)";
            $db->PDO->exec($deleteSql);

            echo "Dane zostały pomyślnie zaimportowane do tabeli towarów.";
            header('Location: index.php');
        } else {
            echo "Błąd podczas otwierania pliku CSV.";
        }
    } else {
        echo "Wybierz plik CSV do zaimportowania.";
    }
}

// Close the prepared query and the database connection
$stmt = null;
$conn = null;
?>
