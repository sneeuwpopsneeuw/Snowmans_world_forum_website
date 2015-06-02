<?php include 'templates/header.php'; ?>

<?php
include 'connect.php';
session_start();

if(@$_SESSION["username"]) {
    ?>

    <center>  <a href="index.php"> Home page </a> | <a href="account.php"> My account </a> | <a href="members.php"> Members </a> | <a href="index.php?action=logout"> Logout </a>  </center>

    <?php
    echo "<center> <h1> Account </h1>";



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