<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
&& !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	$requestData = $_POST;
	
	$errors = array();

	if (!$requestData['id'])
		$errors[] = 'Nie otrzymano identyfikatora produktu';

	if (!$requestData['fio'])
		$errors[] = 'Pole „Twoje imię” jest wymagane';

	if (!$requestData['phone'] && !$requestData['email'])
		$errors[] = 'Musisz wypełnić przynajmniej jedno pole „Telefon” lub „E-mail”';

	$response = array();

	if ($errors) {
		$response['errors'] = $errors;
	} else {
		$PDO = PdoConnect::getInstance();
		
		$sql = "INSERT INTO `orders` SET `fio` = :fio, `phone` = :phone, `email` = :email, `comment` = :comment, `product_id` = :id";

		$set = $PDO->PDO->prepare($sql);
		$response['res'] = $set->execute($requestData);

		// Mailer can be added here

		// ...
	}

	echo json_encode($response);
}