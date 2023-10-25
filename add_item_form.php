<!DOCTYPE html>
<html>
<head>
    <title>Dodanie nowego elementu</title>
</head>
<body>
    <h2>Dodanie nowego elementu</h2>
    <form action="add_item.php" method="post" enctype="multipart/form-data">
        <label for="name">Nazwa:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="price">Cena:</label>
        <input type="text "id="price" name="price"></input><br>
        <label for="image">Zdjęcie:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        <input type="submit" value="Dodać">
    </form>
</body>
</html>
