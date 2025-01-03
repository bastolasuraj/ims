<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $productName = $_POST['product-name'] ?? '';
    $productCost = $_POST['product-cost'] ?? '';
    $productQuantity = $_POST['product-quantity'] ?? '';

    // Validate data
    if ($productName && $productCost && $productQuantity) {
        // Prepare the data to insert
        $inventoryProduct = [
            'name' => $productName,
            'cost' => (int)$productCost,
            'quantity' => (int)$productQuantity,
            'date_added' => new MongoDB\BSON\UTCDateTime() // Automatically set the date added
        ];

        // Insert the product into MongoDB
        $collection->insertOne($inventoryProduct);

        // Redirect to refresh the page (optional)
        header('Location: inventory.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>Inventory Management of SB Logical Solutions</title>
	<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet"
	      integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
	<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
	        integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
	        crossorigin = "anonymous"></script>
	<link rel = "stylesheet" href = "assets/css/styles.css">
	<script src = "https://kit.fontawesome.com/ace3865455.js" crossorigin = "anonymous"></script>
	<script src = "assets/js/script.js"></script>
</head>
<body>
<!-- Header Section -->
<header>
	<div class = "logo">MyWebsite</div>
	<nav>
		<ul class = "menu">
			<li><a href = "index.php">Home</a></li>
			<!--            <li>-->
			<!--                <a href="#">Inventory</a>-->
			<!--                <ul class="submenu">-->
			<!--                    <li><a href="#">Web Development</a></li>-->
			<!--                    <li><a href="#">App Development</a></li>-->
			<!--                </ul>-->
			<!--            </li>-->
			<!--            <li>-->
			<!--                <a href="#">About</a>-->
			<!--                <ul class="submenu">-->
			<!--                    <li><a href="#">Team</a></li>-->
			<!--                    <li><a href="#">Careers</a></li>-->
			<!--                </ul>-->
			<!--            </li>-->
			<li><a href = "inventory.php">Inventory</a></li>
			<li><a href = "sales.php">Sales</a></li>
		</ul>
	</nav>
	<div class = "auth-buttons">
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<a class="btn btn-danger" href="logout.php">Logout</a>';
        }
        ?>
		<!--        <button>Login</button>-->
		<!--        <button>Register</button>-->
	</div>
	<button class = "hamburger-menu">&#9776;</button>
</header>