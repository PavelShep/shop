<!DOCTYPE html>
<html>
<head>
    <title>Aktualizacja produktu</title>
</head>
<body>
    <h2>Aktualizacja produktu</h2>
    <form action="update_item.php" method="post">
        <label for="product_id">ID Produktu:</label>
        <input type="text" id="product_id" name="product_id" required><br>
        <label for="new_name">Nowa nazwa produktu:</label>
        <input type="text" id="new_name" name="new_name" required><br>
        <label for="new_price">Nowa cena produktu:</label>
        <input type="text" id="new_price" name="new_price" required><br>
        <input type="submit" value="Aktualizuj">
    </form>
</body>
</html>
