<?php include 'templates/header.php'; ?>

<?php
if(@$_SESSION["username"]) {
    echo "<center> <h1> Profile  </h1>";

    /* TODO: start using functions here */
    /* TODO: show only existing users */
    if (@$_GET['username']) {                                                               /* IF ?username=... is used */
        echo "welkom op de pagina (vagina) van ".$_GET['username']."@gmail.orgy";
    }
    elseif (isset($_SESSION["username"])) {                                                /* ELSE IF session exist use that instead*/
        echo "welkom op de pagina (vagina) van ".@$_SESSION["username"]."@gmail.orgy";
    }
    else {                                                                                   /* ELSE you are logged in but you did not go to a profile */
        header("Location: members.php");
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