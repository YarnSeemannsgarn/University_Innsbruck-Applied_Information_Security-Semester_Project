<?php

include_once("init.php");

// Redirect if logged in
if(isset($_SESSION['userid'])) {
    header("Location: listing.php");
    exit;
} else if (isset($_GET['login'])) {
    try {
        $pdo = new PDO('sqlite:database.sqlite');

        $email = $_POST['email'];
        $password = $_POST['pass'];

        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        // Check password
        if ($user !== false && $password == $user['pw']) {
            $_SESSION['userid'] = $user['id'];
            header('Location: listing.php');
            exit;
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }
    } catch (PDOException $e){
        die ('DB Error');
    }
}
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
        <?php
       
        ?>
        <div class="card hoverable valign center-left z-depth-4 login">
            <form action="?login=1" method="post">
                <div class="card-image">
                    <img src="assets/img/IMG_3331.jpg">
                    <span class="card-title">Vulnerable Web App<br/><small>prohibited area</small></span>
                </div>
                <div class="card-content">
                    <p>I am a very simple app. Don't push hard, maybe I can burn up.</p>
		            
		            <div class="row">
					    <div class="col s12">
					        <div class="row">
					            
					            <div class="input-field col s12">
					                <input id="email" name="email" type="email" class="validate">
					                <label for="email" data-error="Hey! You should learn how to type your email." data-success="right">Email</label>
					            </div>
					        </div>
					        
					        <div class="row">
					            <div class="input-field col s12">
					                <input id="pass" name="pass" type="password" class="validate">
					                <label for="pass" data-error="Oh man, you don`t remmember your pass? Ask on stackoverflow." data-success="right">Password</label>
					            </div>
					        </div>

                            <button class="btn waves-effect waves-light" type="submit" name="action">Login
                                <i class="material-icons right">send</i>
                            </button>
                            
                            <div class="row">
					            <div class="input-field col s12">
					                <span class="red"><?= (isset($errorMessage) ? $errorMessage : "")?></span>
					            </div>
					        </div>
	                        
	                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <!-- Compiled and minified JavaScript -->
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    </body>
</html>
