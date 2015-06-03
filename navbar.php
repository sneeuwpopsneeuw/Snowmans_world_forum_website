<?php
    if(@$_SESSION['username']) {
?>
<center>
    <a href="home.php"> Home page </a> |
    <a href="account.php"> My account </a> |
    <a href="profile.php"> Profile </a> |
    <a href="members.php"> Members </a> |
    <a href="index.php?action=logout"> Logout </a>
</center>
<?php
    }
?>