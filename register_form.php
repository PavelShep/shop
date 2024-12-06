<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
        }

        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Rejestracja</h1>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'exists'): ?>
            <p class="error-message">Użytkownik o takiej nazwie już istnieje!</p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <label for="username">Nickname użytkownika:</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>

            <label for="password">Hasło:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Zarejestruj się</button>
        </form>
        <a href="login_form.php">Masz już konto? Zaloguj się</a>
    </div>
</body>
</html>
