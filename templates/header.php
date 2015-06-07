<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
    <title>SnowmansWorld</title>
    <meta name="description" content="Forum Website">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>



<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SnowmansWorld</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
<!------------------------------------------------------------------------------------------------------------------1-->
            <?php
            session_start();
            if(@$_SESSION['username']) {
                ?>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php"> Home page </a></li>
                    <li><a href="account.php"> My account </a></li>
                    <li><a href="profile.php"> Profile </a></li>
                    <li><a href="members.php"> Members </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?action=logout"> Logout </a></li>
                </ul>
<!------------------------------------------------------------------------------------------------------------------1-->
            <?php
            } else {
            ?>
<!------------------------------------------------------------------------------------------------------------------2-->
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">login</a></li>
            </ul>
            <?php
            }
            ?>
<!------------------------------------------------------------------------------------------------------------------2-->
        </div> <!--navbar-header -->
    </div>
</nav>
<div style="height: 50px;"></div>


