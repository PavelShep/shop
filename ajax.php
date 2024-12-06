<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    // Не забудьте начать сессию, если она еще не запущена.
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
    $requestData = $_POST;
    $errors = [];

    if (!$requestData['id'])
        $errors[] = 'Nie otrzymano identyfikatora produktu';

    if (!$requestData['fio'])
        $errors[] = 'Pole „Twoje imię” jest wymagane';

    if (!isset($_SESSION['user']['email']) || empty($_SESSION['user']['email']))
        $errors[] = 'Nie znaleziono adresu e-mail użytkownika w sesji';

    $response = [];

    if ($errors) {
        $response['errors'] = $errors;
    } else {
        $PDO = PdoConnect::getInstance();

        // Используем email из сессии
        $requestData['email'] = $_SESSION['user']['email'];

        $sql = "
            INSERT INTO `orders` 
            SET `fio` = :fio, 
                `phone` = :phone, 
                `email` = :email, 
                `comment` = :comment, 
                `product_id` = :id";

        $set = $PDO->PDO->prepare($sql);
        $response['res'] = $set->execute([
            'fio' => $requestData['fio'],
            'phone' => $requestData['phone'],
            'email' => $requestData['email'], // Из сессии
            'comment' => $requestData['comment'],
            'id' => $requestData['id']
        ]);

        // Здесь можно добавить логику отправки почты
    }

    echo json_encode($response);
}

?>