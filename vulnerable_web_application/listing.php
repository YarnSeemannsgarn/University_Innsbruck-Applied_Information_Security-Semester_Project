<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['userid'])) {
    header("Location: index.php");
    exit;
}

$pdo = new PDO('sqlite:database.sqlite');
    
$statement = $pdo->prepare("SELECT * FROM products");
$result = $statement->execute();
$products = $statement->fetchAll();




?>

 <?
	 include_once("header.php");
 ?>

	    <div class="row listing-row">
		    <div class="col s12 m10 offset-m1 ">  
			    <div class="card-panel">     
                    <table class=" highlight stripped responsive-table listing">
                        <thead>
                            <tr>
                                <th data-field="name">Name</th>
                                <th data-field="description">Description</th>
                                <th data-field="price"> Price</th>
                                <th data-field="edit"> Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product): ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td><?php echo number_format(floatval($product['price']), 2) . "€"; ?></td>
                                <td><a class="waves-effect waves-light btn btn-small green darken-2" href="#">Edit</a> <a class="waves-effect waves-light btn btn-small red darken-2" href="#">Delete</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </br>
                    <div class="row">
	                	<div class="col s12 m10">
		                	 <a class="waves-effect waves-light btn btn-small blue darken-2" href="#">Add</a>
		                </div>
	                </div>
                </div>
            </div>
            
        </div>   
        
 <?
	 include_once("footer.php");
 ?>
             
 
