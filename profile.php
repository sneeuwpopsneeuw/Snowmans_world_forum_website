<?php include 'templates/header.php'; ?>

<?php
include 'connect.php';
session_start();

if(@$_SESSION["username"]) {
    include 'navbar.php';

    echo "<center> <h1> Profile  </h1>";

    if (@$_GET['username']) {
        echo "welkom op de pagina (vagina) van ".$_GET['username']."@gmail.orgy";
    } else {
        header("Location: members.php"); /* TODO: je moet naar je ijgen profiel door gewezen worden */
        die(0);
    }

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