<?php

include_once("init.php");

// Login - redirect if already logged in
if(isset($_SESSION['userid'])) {
    header("Location: listing.php");
    exit;
} else if (isset($_GET['login'])) {
    try {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $statement = $PDO->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        // Check password
        if ($user !== false && $password == $user['pw']) {
            $_SESSION['userid'] = $user['id'];

            // Admin
            if ($user['id'] == 1)
                $_SESSION['admin'] = true;
            header('Location: listing.php');
            exit;
        } else {
	        header('Location: ?message=E-Mail oder Passwort war ungültig');
        }
    } catch (PDOException $e){
    	echo $e->getMessage();
	}
}
?>

<?php
include_once("header.php");
?>
<div class="card hoverable valign center-left z-depth-4 login">
    <form action="?login=1" method="post">
        <div class="card-image">
            <img src="assets/img/P1050413.JPG">
            <span class="card-title">"Secure" Web App</span>
        </div>
        <div class="card-content">
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
                            <span class="red"><?= (isset($_GET["message"]) ? htmlentities($_GET["message"]) : "")?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once("footer.php");
?>

