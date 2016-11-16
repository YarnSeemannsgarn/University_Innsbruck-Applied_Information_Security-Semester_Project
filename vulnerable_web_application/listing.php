<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$pdo = new PDO('sqlite:database.sqlite');
    
$statement = $pdo->prepare("SELECT * FROM products");
$result = $statement->execute();
$products = $statement->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
	    <!-- Compiled and minified CSS -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	    <link rel="stylesheet" href="assets/css/style.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="blue-grey lighten-5">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Vulnerable App!</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php if(isset($_SESSION['userid'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="/">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
	    <div class="row listing-row">
		    <div class="col s12 m10 offset-m1 ">  
			    <div class="card-panel">     
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
                                <?php if(isset($_SESSION['userid'])): ?>
                                    <td>
                                        <a class="waves-effect waves-light btn btn-small green darken-2" href="#">Edit</a>
                                        <a class="waves-effect waves-light btn btn-small red darken-2" href="#">Delete</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    </body>
</html>
