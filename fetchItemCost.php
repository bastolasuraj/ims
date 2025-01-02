<?php
require __DIR__ . '/includes/db.php'; // Include MongoDB connection

if (isset($_GET['item_name'])) {
    $itemName = $_GET['item_name'];

    // Fetch the item from MongoDB by name
    $collection = $client->imsDB->$collectionName; // Replace with your actual database and collection
    $item = $collection->findOne(['name' => $itemName]);

    if ($item) {
        // Return the item cost as JSON
        echo json_encode(['cost' => $item['cost']]);
    } else {
        // Return an empty response if the item doesn't exist
        echo json_encode(['cost' => null]);
    }
} else {
    // Return an error if item_name is not set
    echo json_encode(['error' => 'Item name not provided']);
}
?>
