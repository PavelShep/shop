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
        <div class="form-group">
            <label for="new_opis">Nowy opis</label>
            <input type="text" class="form-control" id="new_opis" name="new_opis" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="new_kategoria">Nowa kategoria</label>
            <input type="text" class="form-control" id="new_kategoria" name="new_kategoria" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="new_liczba_sztuk">Nowa liczba sztuk</label>
            <input type="text" class="form-control" id="new_liczba_sztuk" name="new_liczba_sztuk" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="new_kraj">Kraj</label>
            <input type="text" class="form-control" id="new_kraj" name="new_kraj" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="new_kod_pocztowy">Kod Pocztowy</label>
            <input type="text" class="form-control" id="new_kod_pocztowy" name="new_kod_pocztowy" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="new_stan">Stan</label>
            <input type="text" class="form-control" id="new_stan" name="new_stan" placeholder="" required>
        </div>
        <button type="submit" class="btn btn-primary">Aktualizuj</button>
    </form>
</body>
</html>
