<!DOCTYPE html>
<html>
<head>
    <title>Import CSV</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="importDate.php" method="post" enctype="multipart/form-data" class="col-lg-6 offset-lg-3 mt-5">
        <div class="form-group">
            <label for="csv_file">Wybierz CSV</label>
            <input type="file" class="form-control-file" name="csv_file" accept=".csv" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Import</button>
    </form>
</body>
</html>