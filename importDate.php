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
            $stmt = $db->PDO->prepare("INSERT INTO goods (id, name, price, image) VALUES (?, ?, ?, ?)");
            if (!$stmt) {
                die("Błąd podczas przygotowywania zapytania SQL: " . $db->PDO->errorInfo()[2]);
            }

            // Пропустить первую строку (заголовки) ";" - это разделитель
            fgetcsv($handle, 1000, ";");

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $id = $data[0];
                $name = $data[1];
                $price = $data[2];
                $image = $data[3];

                // Привязываем значения к параметрам в SQL-запросе и выполняем запрос
                if (!$stmt->execute([$id, $name, $price, $image])) {
                    die("Błąd wstawiania danych: " . $stmt->errorInfo()[2]);
                }
            }

            fclose($handle); // Закрываем CSV файл
            echo "Dane zostały pomyślnie zaimportowane do tabeli towarów.";
            //header('Location: index.php');
        } else {
            echo "Ошибка при открытии CSV файла.";
        }
    } else {
        echo "Пожалуйста, выберите CSV файл для импорта.";
    }
}

// Закрываем подготовленный запрос и соединение с базой данных
$stmt = null;
$conn = null;
?>
