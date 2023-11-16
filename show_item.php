<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information</title>
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

} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
    exit();
}

// Check if the product_id parameter is passed in the request
if (isset($_GET['product_id'])) {
    // Get the product ID from the request parameter
    $productId = $_GET['product_id'];

    // Database query to retrieve product information
    $sql = "SELECT * FROM goods WHERE id = '$productId'";
    $stmt = $db->PDO->prepare($sql);

    try {
        $stmt->execute();
        $productInfo = $stmt->fetch();

        // Display product information
        echo '
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="' . $productInfo['image'] . '" alt="Product Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2>'. $productInfo['name'] . '</h2>
                    <p class="lead">' . $productInfo['opis'] . '</p>
                    <p class="font-weight-bold">Cena: ' . $productInfo['price'] . 'zł</p>
                </div>
            </div>
        </div>';

    } catch (PDOException $e) {
        echo 'Query execution error: ' . $e->getMessage();
    }
} else {
    // If product_id parameter is missing, display an error message
    echo 'Error: Product ID not provided.';
}
?>

</body>
</html>
