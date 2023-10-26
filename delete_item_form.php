<!DOCTYPE html>
<html>
<head>
    <title>Usuń pozycję</title>
</head>
<body>
    <h2>Usuń pozycję</h2>
    <form action="delete_item.php" method="post">
        <label for="item_id">Identyfikator pozycji:</label>
        <input type="text" id="item_id" name="item_id" required><br>
        <input type="submit" value="Usuń">
    </form>
</body>
</html>
