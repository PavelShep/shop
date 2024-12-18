<?php

function getRecommendedProducts($userEmail = null) {
    try {
        $db = PdoConnect::getInstance();

        // Сценарий 1: Пользователь без аккаунта
        if ($userEmail === null) {
            $sql = "
                SELECT g.id, g.name, g.image, g.price, COUNT(o.product_id) AS popularity
                FROM goods g
                JOIN orders o ON g.id = o.product_id
                WHERE o.id >= (SELECT MAX(id) - 30 FROM orders)
                GROUP BY g.id
                ORDER BY popularity DESC
                LIMIT 5
            ";
            $stmt = $db->PDO->query($sql);
            return $stmt->fetchAll();
        }

        // Сценарий 2: Пользователь с аккаунтом
        // 1. Находим часто покупаемую категорию
        $sqlCategory = "
            SELECT g.kategoria, COUNT(o.product_id) AS frequency
            FROM goods g
            JOIN orders o ON g.id = o.product_id
            WHERE o.email = :email
            GROUP BY g.kategoria
            ORDER BY frequency DESC
            LIMIT 1
        ";
        $stmtCategory = $db->PDO->prepare($sqlCategory);
        $stmtCategory->execute(['email' => $userEmail]);
        $favoriteCategory = $stmtCategory->fetchColumn();

		//echo $favoriteCategory;

        if ($favoriteCategory) {
            // 2. Рекомендуем товары из этой категории
            $sqlProducts = "
                SELECT * 
                FROM goods
                WHERE kategoria = :favoriteCategory
                LIMIT 5
            ";
            $stmtProducts = $db->PDO->prepare($sqlProducts);
            $stmtProducts->execute(['favoriteCategory' => $favoriteCategory]);
            $recommendedProducts = $stmtProducts->fetchAll();

            // 3. Дополняем товарами из смежных категорий
            $sqlRelated = "
                SELECT * 
                FROM goods
                WHERE kategoria != :favoriteCategory
                LIMIT 5
            ";
            $stmtRelated = $db->PDO->prepare($sqlRelated);
            $stmtRelated->execute(['favoriteCategory' => $favoriteCategory]);
            $relatedProducts = $stmtRelated->fetchAll();

            return array_merge($recommendedProducts, $relatedProducts);
        }

        // Если категорий нет, возвращаем популярные товары как fallback
        return getRecommendedProducts();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

session_start();
$isAuthenticated = isset($_SESSION['user']);
//echo ($_SESSION['user']['email'] ?? null);
$isAdmin = isset($_SESSION['admin']);
$userEmail = $_SESSION['user']['email'] ?? null;
$recommendedProducts = getRecommendedProducts($userEmail);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sklep internetowy z artykułami noworocznymi i bożonarodzeniowymi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="static/css/slick.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link href="static/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="vein"></div>
	<div class="main container">
		<header>
			<div class="mobile-menu-open-button js_mobile_menu_open_button"><i class="fas fa-bars"></i></div>
			<nav class="js_wide_menu">
				<i class="fas fa-times close-mobile-menu js_close_mobile_menu"></i>
				<div class="wrapper-inside">
					<div class="visible-elements">
						<span>Główna</span>
						<span>Nowy Rok</span>
						<span>Boże Narodzenie</span>
						<span>Promocje</span>
						<?php if ($isAuthenticated): ?>
							<?php if ($isAdmin): ?>
								<!-- Админ-меню -->
								<span><a href="orders.php" style="color: #fff; text-decoration: none;">Zamówienia</a></span>
								<span><a href="add_item_form.php" style="color: #fff; text-decoration: none;">Dodać towar</a></span>
								<span><a href="delete_item_form.php" style="color: #fff; text-decoration: none;">Usunąć towar</a></span>
								<span><a href="update_item_form.php" style="color: #fff; text-decoration: none;">Aktualizować dane towaru</a></span>
								<span><a href="show_items.php" style="color: #fff; text-decoration: none;">Pokaż wszystkie towary</a></span>
								<span><a href="exportData.php" style="color: #fff; text-decoration: none;">Export CSV</a></span>
								<span><a href="importData_form.php" style="color: #fff; text-decoration: none;">Import CSV</a></span>
								<span><a href="exportDataAllegro.php" style="color: #fff; text-decoration: none;">Export CSV Allegro</a></span>
								<span><a href="logout.php">Log out</a></span>
							<?php else: ?>
								<!-- Меню для обычного пользователя -->
								<span><a href="basket.php">Mój koszyk</a></span>
								<span><a href="logout.php">Log out</a></span>
							<?php endif; ?>
						<?php else: ?>
							<span><a href="login_form.php">Log in</a></span>
							<span><a href="register_form.php">Sign up</a></span>
						<?php endif; ?>
					</div>
				</div>
			</nav>
			<div class="slider-block">
				<div class="nav-left"><i class="fas fa-chevron-left"></i></div>
				<div class="slider">
					<div style="background: url('static/img/slide-1.jpg') no-repeat; background-size: auto 100%; background-position: center; background-position-y: 0;">
						<span class="text-box">Zabawki noworoczne z 30% rabatem</span>
					</div>
					<div style="background: url('static/img/slide-2.jpg') no-repeat; background-size: auto 100%; background-position: center; background-position-y: 0;">
						<span class="text-box">Duży wybór wianków bożonarodzeniowych</span>
					</div>
					<div style="background: url('static/img/slide-3.jpg') no-repeat; background-size: auto 100%; background-position: center; background-position-y: 0;">
						<span class="text-box">Podaruj swojemu dziecku wakacje, zaproś Świętego Mikołaja!</span>
					</div>
				</div>
				<div class="nav-right"><i class="fas fa-chevron-right"></i></div>
			</div>
		</header>
		<section class="product-box">
			<h2>Recommended</h2>
			<div class="row">
				<?php foreach ($recommendedProducts as $product): ?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-parent" data-id="<?=$product['id']?>">
						<div class="product">
							<div class="product-pic" style="background: url('<?=$product['image']?>') no-repeat; background-size: auto 100%; background-position: center"></div>
							<span class="product-name"><?=$product['name']?></span>
							<span class="product_price"><?=$product['price']?> zł</span>
							<button class="js_buy">Kupić</button>
							<button class="show_product" data-product-id="<?=$product['id']?>">Więcej</button>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</section>
		<footer>
			2024 © Szczęśliwego Nowego Roku!
		</footer>
	</div>
	<div class="overlay js_overlay"></div>
	<div class="popup">
		<h3>Zamówienie</h3><i class="fas fa-times close-popup js_close-popup"></i>
		<div class='js_error'></div>
		<input type="hidden" name="product-id">
		<input type="text" name="fio" placeholder="Twoje imię">
		<input type="text" name="phone" placeholder="Telefon">
		<textarea placeholder="Komentarz" name="comment"></textarea>
		<button class="js_send">Wysłać</button>
	</div>

	<script src="static/js/jquery-3.4.1.min.js"></script>
	<script src="static/js/slick.js"></script>
	<script src="static/js/script.js"></script>
</body>
</html>