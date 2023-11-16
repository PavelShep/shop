<?php 

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

//Create a PDO connection
$db = PdoConnect::getInstance();

// Define your SQL query to retrieve data from the database
$sql = "SELECT * FROM goods"; 

try {
    $stmt = $db->PDO->prepare($sql);
    $stmt->execute();

    // Set up a file for writing CSV data (you can also output to the browser)
    $csvFile = 'exported_data.csv';
    $file = fopen($csvFile, 'w');

    // Write a header row to the CSV
    $header = array('id', 'name', 'price', 'image', 'opis', 'kategoria', 'liczba_sztuk', 'kraj', 'kod_pocztowy', 'stan'); 
    fputcsv($file, $header);

    // Fetch and write data rows to the CSV
    while ($row = $stmt->fetch()) {
        fputcsv($file, $row);
    }

    fclose($file);

    // Output a success message or download the file
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $csvFile . '"');
    readfile($csvFile);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

