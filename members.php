<?php include 'templates/header.php'; ?>

<?php
include 'connect.php';
session_start();

if(@$_SESSION["username"]) {
    ?>

    <center>  <a href="index.php"> Home page </a> | <a href="account.php"> My account </a> | <a href="members.php"> Members </a> | <a href="index.php?action=logout"> Logout </a>  </center>

    <?php
    echo "<center> <h1> members </h1>";
    $db_type = 'mysql';
    $db_host = 'localhost';
    $db_user = 'root';  /* TODO: een nieuwe user moet gemaakt worden*/
    $db_pass = '';
    $db_name = 'php_forum';

    $db_connect = new PDO("$db_type:host=$db_host; dbname=$db_name;", $db_user, $db_pass);

//    $query = "SELECT * FROM users WHERE username = :username AND  password = :password";
//    $resultaat = $db_connect->prepare($query);
//    $resultaat->execute(array(
//            ':username' => $username,
//            ':password' => openssl_digest($salt.$password, 'sha512'))
//    );\

    $memberSQL = $db_connect -> prepare("SELECT `id`,`username` FROM `users`");
    $memberSQL -> execute();
    $row = $memberSQL -> fetchAll();


    foreach ($row as $value) { ?>
        <tr>
            <td><?php echo $value["id"] ?></td>
            <td><?php echo $value["username"] ?></td>
            <br/>
        </tr>
    <?php }




//    $check = mysql_query("SELECT * FROM users");    /* check username */
//    $rows = mysql_num_rows($check);
//
//
//    while($rows - mysql_fetch_assoc($check)) {
//        $id = $rows['id'];
//        echo "<a href='profile.php?id=$id'>" . $rows['username'] . "</a> <br/>";
//    }
    echo "</center>";

    if(@$_GET['action'] == 'logout') {
        session_destroy();
        header("Location: login.php");
    }
}
else {
    echo "You must be logged in.";
}
?>

<?php include 'templates/footer.php'; ?>