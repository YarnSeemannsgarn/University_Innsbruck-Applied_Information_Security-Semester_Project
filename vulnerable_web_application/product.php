<?php
include_once("init.php");

$pdo = new PDO('sqlite:database.sqlite');
    
 $id = $_GET['id'];
    
$statement = $pdo->prepare("SELECT * FROM products WHERE id='".$id."'");
$result = $statement->execute();
$products = $statement->fetchAll();



$product = $products[0];


?>

 <?
	 include_once("header.php");
 ?>

	    <div class="row listing-row">
		    <div class="col s12 m10 offset-m1 ">  
			    <div class="card-panel">     
				    <h4>Product info</h4>
					
					 <?php 
					    if(count($products)==0) { 
						    echo  "No results men!"; 
						}
						else{
				    ?>
					
                    <table class=" highlight stripped responsive-table listing">
                       
                            <tr>
                                <td>Name</td>
                                <td><?php echo $product['name']; ?></td>         
                            </tr>
                            
                             <tr>
                                <td>Description</td>
                                <td><?php echo $product['description']; ?></td>         
                            </tr>
                            
                             <tr>
                                <td>Price</td>
                                <td><?php echo number_format(floatval($product['price']), 2) . "€"; ?></td>         
                            </tr>
                            
                             <tr>
                                <td>Action</td>
                                <td><a class="waves-effect waves-light btn btn-small green darken-2" href="#">Edit</a> <a class="waves-effect waves-light btn btn-small red darken-2" href="#">Delete</a></td>        
                            </tr>
                        
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
             
 
