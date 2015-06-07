<?php include 'templates/header.php'; ?>

<?php
include 'connect.php';
session_start();

if(@$_SESSION["username"]) {
    include 'navbar.php';

    echo "<center> <h1> News </h1>";
    ?>
    <h4> we take your security seriously </h4>
    <p> for example:</p>
    <ul>
        <li> we have strong password rules </li>
        <li> we use strong encryption methods to store your password</li>
        <li> we store your password so that we can't even see it </li>
        <li> we try to hack our own system to make sure a hacker does not make a chance </li>
    </ul>
    <?php
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