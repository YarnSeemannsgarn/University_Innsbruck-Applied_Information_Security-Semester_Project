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
        <title>Vulnerable App</title>
    </head>

    <body class="blue-grey lighten-5">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Vulnerable App</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    
                    
                    <li class="search-box">
                        <form action="search.php" method="get">
	                        <div class="input-field">
				                <input id="search" type="search" name="keyword" value="<?=$_GET['keyword']?>" required>
				                <label for="search"><i class="material-icons">search</i></label>
				                <i class="material-icons">close</i>
				            </div>
				        </form>
                    </li>
                    <li><a href="attacks.php">Attacks</a></li>
                    <li><a href="listing.php">Listing</a></li>
                    <?php if(isset($_SESSION['userid'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="index.php">Login</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
