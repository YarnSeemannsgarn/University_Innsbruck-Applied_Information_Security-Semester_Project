<?php
include_once("init.php");


$search = $_GET['keyword'];

$pdo = new PDO('sqlite:database.sqlite');
  
 
$query = "SELECT * FROM products WHERE id LIKE '%".$search."%' 
														OR  name LIKE '%".$search."%' 
														OR  description LIKE '%".$search."%' 
														OR  price LIKE '%".$search."%'
														";


$query = "SELECT * FROM products WHERE id LIKE '%".$search."%'";

echo "<pre>".$query."</pre>";

try {	
		$statement = $pdo->prepare($query); 
		$result = $statement->execute();
		$products = $statement->fetchAll();
    } catch (PDOException $e){
        echo ('DB Error');
    }








?>
 <?
	 include_once("header.php");
 ?>
<pre><?=$query?></pre>

	    <div class="row listing-row">
		    <div class="col s12 m10 offset-m1 ">  
			    <div class="card-panel">     
				    <h4>Search results for: <?=$search?></h4>
				    <?php 
					    if(count($products)==0) { 
						    echo  "No results men!"; 
						}
						else{
						
				    ?>
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
                                <td><a class="waves-effect waves-light btn btn-small grey darken-2"  href="javascript:document.location = 'product.php?id=<?=$product["id"]?>';" style="cursor: pointer;">Info</a> </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
	                    }
                    ?>
                </div>
            </div>
            
        </div>   
        
 <?
	 include_once("footer.php");
 ?>
             
 
