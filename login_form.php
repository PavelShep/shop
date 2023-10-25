<!DOCTYPE html>
<html>
<head>
    <title>Logowanie administratora</title>
</head>
<body>
    <h2>Logowanie administratora</h2>
    <form action="login.php" method="post">
        <label for="username">Login: </label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Log in">
    </form>
</body>
</html>