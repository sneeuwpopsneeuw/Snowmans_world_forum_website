<?php include 'templates/header.php'; ?>

<?php
    include 'connect.php';
    session_start();

    if(@$_SESSION["username"]) {
    ?>

    <center>  <a href="index.php"> Home page </a> | <a href="account.php"> My account </a> | <a href="members.php"> Members </a> | <a href="index.php?action=logout"> Logout </a>  </center>

    <?php
        if(@$_GET['action'] == 'logout') {
            session_destroy();
            header("Location: login.php");
        }
    }
    else {
        echo "You must be logged in.";
    }
?>


<div class="blended_grid">
    <div class="topBanner">
        topBanner
    </div>
    <div class="middleBanner">
        middleBanner
    </div>
    <div class="leftBanner">
        leftBanner
    </div>
    <div class="centerBanner">
        centerBanner
    </div>
    <div class="rightBanner">
        rightBanner
    </div>
    <div class="bottomBanner">
        bottomBanner
    </div>
</div>

<?php include 'templates/footer.php'; ?>