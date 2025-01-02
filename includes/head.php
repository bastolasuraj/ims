<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $itemName = $_POST['item-name'] ?? '';
    $itemCost = $_POST['item-cost'] ?? '';
    $itemQuantity = $_POST['item-quantity'] ?? '';

    // Validate data
    if ($itemName && $itemCost && $itemQuantity) {
        // Prepare the data to insert
        $inventoryItem = [
            'name' => $itemName,
            'cost' => (int)$itemCost,
            'quantity' => (int)$itemQuantity,
            'date_added' => new MongoDB\BSON\UTCDateTime() // Automatically set the date added
        ];

        // Insert the item into MongoDB
        $collection->insertOne($inventoryItem);

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
		<!--        <button>Login</button>-->
		<!--        <button>Register</button>-->
	</div>
	<button class = "hamburger-menu">&#9776;</button>
</header>