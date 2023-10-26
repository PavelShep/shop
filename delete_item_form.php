<!DOCTYPE html>
<html>
<head>
    <title>Usuń pozycję</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="delete_item.php" method="post" class="col-lg-6 offset-lg-3 mt-5">
        <h2>Usuń pozycję</h2>
        <div class="form-group">
            <label for="item_id">Identyfikator pozycji:</label>
            <input type="text" class="form-control" id="item_id" name="item_id" required><br>
        </div>
        <button type="submit" class="btn btn-primary">Usuń</button>
    </form>
</body>
</html>
