<?php
include_once("init.php");

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id='".$id."'";
$statement = $PDO->prepare($query);
$result = $statement->execute();
$products = $statement->fetchAll();
$product = $products[0];
?>

<?php
include_once("header.php");
?>

<div class="row listing-row">
    <div class="col s12 m10 offset-m1 ">  
        <div class="card-panel">     
            <h4>Product info</h4>
            <?php if(count($products)==0): ?>
                No results men!"; 
            <?php else: ?>
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
                    <?php if(isset($_SESSION['userid'])): ?>
                    <tr>
                        <td>Action</td>
                        <td>
                            <a class="waves-effect waves-light btn btn-small green darken-2" href="#">Edit</a>
                            <a class="waves-effect waves-light btn btn-small red darken-2" href="#">Delete</a>
                        </td>        
                    </tr>
                    <?php endif ?>
                </table>
            <?php endif ?>
        </div>
    </div>
</div>   

<?php
include_once("footer.php");
?>
