<?php
include_once("init.php");


$search = $_GET['keyword'];



$products[0] = array(
    "name" => "SQL Injection",
    "description" => "Steel show all fields of listing",
    "value" => "asdfs",
    "attack" => "sdas"
); 


?>

 <?
	 include_once("header.php");
 ?>

	    <div class="row listing-row">
		    <div class="col s12 m10 offset-m1 ">  
			    <div class="card-panel">     
				    <h4>Search results for: <?=$search?></h4>
                    <table class=" highlight stripped responsive-table listing">
                        <thead>
                            <tr>
                                <th data-field="name">Name</th>
                                <th data-field="description">Description</th>
                                <th data-field="value"> Value</th>
                                <th data-field="attack"> Attack!</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product): ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td><?php echo $product['value'];?></td>
                                <td><a class="waves-effect waves-light btn btn-small red darken-2" href="<?=$product['value']?>">Attack!</a</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                   </div>
            </div>
            
        </div>   
        
 <?
	 include_once("footer.php");
 ?>
             
 
