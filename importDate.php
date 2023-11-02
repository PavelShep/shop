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
            $stmt = $db->PDO->prepare("INSERT INTO goods (id, name, price, image) VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE name = VALUES(name), price = VALUES(price), image = VALUES(image)");
            if (!$stmt) {
                die("Błąd podczas przygotowywania zapytania SQL: " . $db->PDO->errorInfo()[2]);
            }

            $existingIds = []; // Список существующих ID

            // Пропустить первую строку (заголовки) ";" - это разделитель
            fgetcsv($handle, 1000, ";");

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $id = $data[0];
                $name = $data[1];
                $price = $data[2];
                $image = $data[3];
                $existingIds[] = $id; // Добавить ID в список существующих

                // Привязываем значения к параметрам в SQL-запросе и выполняем запрос
                if (!$stmt->execute([$id, $name, $price, $image])) {
                    die("Błąd wstawiania/aktualizowania danych: " . $stmt->errorInfo()[2]);
                }
            }

            fclose($handle); // Закрываем CSV файл

            // Удаляем записи, которых нет в импортированном CSV
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

// Закрываем подготовленный запрос и соединение с базой данных
$stmt = null;
$conn = null;
?>
