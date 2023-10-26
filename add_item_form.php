<!DOCTYPE html>
<html>
<head>
    <title>Dodanie nowego towaru</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="add_item.php" method="post" enctype="multipart/form-data" class="col-lg-6 offset-lg-3 mt-5">
        <h2>Dodawanie nowego towaru</h2>
        <div class="form-group">
            <label for="name">Nazwa towara</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="..." required>
        </div>
        <div class="form-group">
            <label for="price">Cena (zł)</label>
            <input type="price" class="form-control" id="price" name="price" placeholder="..." required>
        </div>
        <div class="form-group">
            <label for="image">Zdjęcie</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodać</button>
    </form>
</body>
</html>
