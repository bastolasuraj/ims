<?php
require __DIR__ . '/includes/db.php'; // Include MongoDB connection

if (isset($_GET['item_name'])) {
    $itemName = $_GET['item_name'];

    // Fetch the item from MongoDB by name
    $collection = $client->imsDB->imsCollection; // Replace with your actual database and collection
    $item = $collection->findOne(['name' => $itemName]);

    if ($item) {
        // Return the item cost and quantity as a single JSON object
        echo json_encode(['cost' => $item['cost'], 'quantity' => $item['quantity']]);
    } else {
        // Return null values if the item doesn't exist
        echo json_encode(['cost' => null, 'quantity' => null]);
    }
} else {
    // Return an error if item_name is not set
    echo json_encode(['error' => 'Item name not provided']);
}
?>
