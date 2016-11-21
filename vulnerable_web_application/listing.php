<?php
include_once("init.php");

$pdo = new PDO('sqlite:database.sqlite');

$statement = $pdo->prepare("SELECT * FROM products");
$result = $statement->execute();
$products = $statement->fetchAll();
?>

<?php 
include_once("header.php");
?>
<div class="row listing-row">
	<div class="col s12 m10 offset-m1 ">  
		<div class="card-panel">     
			<h4>Listing of products</h4>

            <table class=" highlight stripped responsive-table listing">
                <thead>
                    <tr>
                        <th data-field="name">Name</th>
                        <th data-field="description">Description</th>
                        <th data-field="price">Price</th>
                        <?php if(isset($_SESSION['userid'])): ?>
                            <th data-field="action">Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td><?php echo number_format(floatval($product['price']), 2) . "€"; ?></td>
                            <td>
                                <a class="waves-effect waves-light btn btn-small grey darken-2"  href="javascript:document.location = 'product.php?id=<?=$product["id"]?>';" style="cursor: pointer;">Info</a>
                                <?php if(isset($_SESSION['userid'])): ?>
                                    <a class="waves-effect waves-light btn btn-small green darken-2" href="#">Edit</a>
                                    <a class="waves-effect waves-light btn btn-small red darken-2" href="#">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <div class="row">
	            <div class="col s12 m10">
                    <?php if(isset($_SESSION['userid'])): ?>
		                <a class="waves-effect waves-light btn btn-small blue darken-2" href="#">Add</a>
                    <?php endif; ?>
		        </div>
	        </div>
        </div>
    </div>
</div>   

<?php 
include_once("footer.php");
?>


