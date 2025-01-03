const hamburger = document.querySelector('.hamburger-menu');
const menu = document.querySelector('.menu');

hamburger.addEventListener('click', () => {
    menu.classList.toggle('active');
});

// JavaScript to fetch item cost dynamically from the server
// Add this script to assets/js/script.js or inventory.php
function fetchItemDetail() {
    const itemName = document.getElementById('item-name').value;
    if (!itemName) return;

    fetch(`fetchItemDetail.php?item_name=${encodeURIComponent(itemName)}`)
        .then(response => response.json())
        .then(data => {
            if (data.cost !== null && data.quantity !== null) {
                document.getElementById('item-cost').value = data.cost;
                document.getElementById('item-quantity').value = data.quantity;
                document.getElementById('item-detail').innerText =
                    `You have ${data.quantity} ${itemName}(s) in stock.`;
            } else {
                document.getElementById('item-detail').innerText =
                    'Item not found. Please add a new item.';
            }
        })
        .catch(error => {
            console.error('Error fetching item details:', error);
            document.getElementById('item-detail').innerText =
                'Error fetching item details.';
        });
}
