<?php
require __DIR__ . '/includes/db.php'; // Include the MongoDB connection
include 'includes/head.php';

// Fetch data from MongoDB
$collection = $client->imsDB->imsCollection; // Replace 'myDatabase' with your actual database name
$items = $collection->find([], ['limit' => 5, 'sort' => ['date_added' => -1]]); // Fetch 5 most recent items
?>

<!-- Main Content -->
<div class="container">
    <main>
        <section id="inventory-management">
            <form action="#" method="POST" class="row g-3">
                <h2> Update the Purchase Inventory</h2>
                <div class="col-auto">
                    <input class="form-control" list="db-items" id="item-name" name="item-name" placeholder="Type to search Item...">
                    <datalist id="db-items">
                        <!-- List of items will be populated dynamically from MongoDB -->
                        <?php
                        // Dynamically populate item names from MongoDB
                        $itemsInDb = $collection->distinct("name");
                        foreach ($itemsInDb as $itemName) {
                            echo "<option value=\"$itemName\">";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" id="item-cost" name="item-cost" placeholder="Item Cost">
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" id="item-quantity" name="item-quantity" placeholder="Quantity of the Item">
                </div>
                <div class="col-auto">
                    <button id="item-add" type="submit" class="btn btn-primary mb-3">Add Item</button>
                </div>
            </form>
        </section>
        <section id="inventory-list">
            <div class="inventory-list center">
                <h2>5 Most Recent Purchase Updates</h2>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Sn.</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sn = 1;
                    foreach ($items as $item) {
                        echo "<tr>";
                        echo "<td>{$sn}</td>";
                        echo "<td>{$item['name']}</td>";
                        echo "<td>{$item['quantity']}</td>";
                        echo "<td>{$item['cost']}</td>";
                        echo "<td><i class='fa-solid fa-pen-to-square'></i><i class='fa-solid fa-trash'></i></td>";
                        echo "</tr>";
                        $sn++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<?php
include 'includes/foot.php';
?>
