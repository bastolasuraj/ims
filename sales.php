<?php
$collectionName = 'imsCollection'; // Set the collection name
include 'includes/db.php'; // Include the MongoDB connection
include 'includes/head.php';
// Fetch data from MongoDB
$collection = $client->imsDB->$collectionName; // Replace 'imsDB' and 'imsCollection' with your actual DB/Collection names
$products = $collection->find([], ['limit' => 5, 'sort' => ['date_added' => -1]]); // Fetch 5 most recent products

// Handle form submission (Add or Update Product)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['product-name'];
    $productCost = $_POST['product-cost'];
    $productQuantity = $_POST['product-quantity'];

// Check if the product already exists in the database
    $existingProduct = $collection->findOne(['name' => $productName]);

    if ($existingProduct) {
// If the product exists, update the quantity and cost (if necessary)
        $collection->updateOne(
            ['name' => $productName],
            ['$inc' => ['quantity' => $productQuantity]] // Increase quantity
        );
    } else {
// If the product doesn't exist, insert a new product
        $collection->insertOne([
            'name' => $productName,
            'cost' => $productCost,
            'quantity' => $productQuantity,
            'date_added' => new MongoDB\BSON\UTCDateTime()
        ]);
    }
}
?>

<!-- Main Content -->
<div class="container">
    <main>
        <section id="inventory-management">
            <form action="#" class="row g-3">
                <h2> Update the Sales Inventory</h2>
                <div class="col-auto">
                    <input class="form-control" list="db-products" id="product-name" name="product-name"
                           placeholder="Type to search Product..." oninput="fetchProductDetail()">
                    <datalist id="db-products">
                        <!-- List of products will be populated dynamically from MongoDB -->
                        <?php
                        // Dynamically populate product names from MongoDB
                        $productsInDb = $collection->distinct("name");
                        foreach ($productsInDb as $productName) {
                            echo "<option value=\"$productName\">";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" id="product-cost" placeholder="Product Cost">
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" id="product-quantity" placeholder="Quantity of the Product">
                </div>
                <div class="col-auto">
                    <button id="product-add" type="submit" class="btn btn-primary mb-3">Add Product</button>

                </div>
            </form>
        </section>
        <section id="inventory-list">
            <div class="inventory-list center">
                <h2>5 Most Recent Sales</h2>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Sn.</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>cost</th>
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
<script>
    // JavaScript to fetch product cost dynamically from the server
    function fetchItemDetail() {
        var productName = document.getElementById("product-name").value;

        // Only make request if the item name is not empty
        if (itemName) {
            // Use fetch to make an AJAX request
            // fetch('fetchItemDetail.php?item_name=' + encodeURIComponent(itemName))
                .then(response => response.json())
                .then(data => {
                    if (data.cost) {
                        document.getElementById("item-cost").value = data.cost;
                    } else {
                        document.getElementById("item-cost").value = '';
                    }
                })
                .catch(error => console.error('Error fetching item cost:', error));
        }
    }
</script>

