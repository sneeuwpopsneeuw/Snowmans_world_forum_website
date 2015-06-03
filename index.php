<?php include 'templates/header.php'; ?>

<?php
    include 'connect.php';
    session_start();

    if(@$_SESSION["username"]) {
        include 'navbar.php';
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