<?php
include_once("init.php");

if (!isset($_SESSION['admin'])) {
    echo "Not allowed, you need to have admin rights!";
    exit;
}

try {
    $statement = $PDO->prepare("SELECT * FROM users");
    $result = $statement->execute();
    $users = $statement->fetchAll();
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
            <h4>Users</h4>  
            <table class=" highlight stripped responsive-table listing">
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>E-Mail</th>
                        <th>Password</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['pw'];?></td>
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
