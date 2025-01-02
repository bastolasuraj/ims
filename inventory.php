<?php
	include 'includes/head.php';
?>

	<!-- Main Content -->
	<div class = "container">
		<main>
			<section id = "inventory-management">
				<form action = "#" class="row g-3">
					<h2> Update the Purchase Inventory</h2>
					<div class = "col-auto">
						<input class = "form-control" list = "db-items" id = "item-name" placeholder = "Type to search Item...">
						<datalist id = "db-items">
							<option value = "Pen">
							<option value = "Notebook">
							<option value = "Laptop">
							<option value = "Monitors">
						</datalist>
					</div>
					<div class = "col-auto">
						<input type = "number" class = "form-control" id = "item-cost" placeholder="Item Cost">
					</div>
					<div class = "col-auto">
						<input type = "number" class = "form-control" id = "item-quantity" placeholder="Quantity of the Item">
					</div>
					<div class="col-auto">
						<button id="item-add" type="submit" class="btn btn-primary mb-3">Add Item</button>

					</div>
				</form>
			</section>
			<section id = "inventory-list">
				<div class = "inventory-list center">
					<h2>5 Most Recent Purchase Updates</h2>
					<table class = "table table-striped table-hover">
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
						<tr>
							<td>1</td>
							<td>Pen</td>
							<td>500</td>
							<td>20</td>
							<td><i class = "fa-solid fa-pen-to-square"></i><i class = "fa-solid fa-trash"></i></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Pen</td>
							<td>500</td>
							<td>20</td>
							<td><i class = "fa-solid fa-pen-to-square"></i><i class = "fa-solid fa-trash"></i></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Pen</td>
							<td>500</td>
							<td>20</td>
							<td><i class = "fa-solid fa-pen-to-square"></i><i class = "fa-solid fa-trash"></i></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Pen</td>
							<td>500</td>
							<td>20</td>
							<td><i class = "fa-solid fa-pen-to-square"></i><i class = "fa-solid fa-trash"></i></td>
						</tr>
						<tr>
							<td>5</td>
							<td>Pen</td>
							<td>500</td>
							<td>20</td>
							<td><i class = "fa-solid fa-pen-to-square"></i><i class = "fa-solid fa-trash"></i></td>
						</tr>
						</tbody>
					</table>
				</div>
			</section>
		</main>
	</div>

<?php
	include 'includes/foot.php';
?>