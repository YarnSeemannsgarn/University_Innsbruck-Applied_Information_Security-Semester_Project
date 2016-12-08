<?php
include_once("init.php");

$where = "";
if (isset($_SESSION['userid']) and isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $statement = $PDO->prepare("DELETE FROM products WHERE id = $id");
        $result = $statement->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
} else if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $where = "WHERE id LIKE '%".$search."%' OR 
              name LIKE '%".$search."%' OR 
              description LIKE '%".$search."%' OR 
              price LIKE '%".$search."%'
              ";
}

$products=array();

try {
    $statement = $PDO->prepare("SELECT * FROM products " . $where);
	$result = $statement->execute();
	$products = $statement->fetchAll();
} catch (PDOException $e){
    echo $e->getMessage();
}
?>

<?php 
include_once("header.php");
?>
<div class="row listing-row">
    <div class="col s12 m10 offset-m1 ">  
        <div class="card-panel">     
            <?php if (!isset($_GET['search'])): ?>
                <h4>Listing of products</h4>
            <?php else: ?>
                <h4>Search results for: <?php echo $_GET['search']; ?></h4>
            <?php endif ?>
            <nav>
                <div class="nav-wrapper search">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" name="search" value="<?php echo $_GET['search']?>">
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
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
                                    <a class="waves-effect waves-light btn btn-small red darken-2" href="?delete=<?php echo $product['id']?>">Delete</a>
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
