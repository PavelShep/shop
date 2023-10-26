<!DOCTYPE html>
<html>
<head>
    <title>Aktualizacja produktu</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="update_item.php" method="post" class="col-lg-6 offset-lg-3 mt-5">
        <h2>Aktualizacja produktu</h2>

        <div class="form-group">
            <label for="product_id">ID Produktu:</label>
            <input type="text" id="product_id" name="product_id" required>
        </div>

        <div class="form-group">
            <label for="new_name">Nowa nazwa produktu:</label>
            <input type="text" class="form-control" id="new_name" name="new_name" required>
        </div>

        <div class="form-group">
            <label for="new_price">Nowa cena produktu:</label>
            <input type="text" class="form-control" id="new_price" name="new_price" required>
        </div>

        <button type="submit" class="btn btn-primary">Aktualizuj</button>
    </form>
</body>
</html>
