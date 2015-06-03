<?php include 'templates/header.php'; ?>

<?php
include 'connect.php';

session_start();

if(@$_SESSION["username"]) {

    include 'navbar.php';

    echo "<center> <h1> Account </h1>";
    ?>


    <a href="account.php?action=ChangePassword"> Change Password </a>


    <?php
    echo "</center>";

    if(@$_GET['action'] == 'logout') {
        session_destroy();
        header("Location: login.php");
    }
    else if (@$_GET['action'] == 'ChangePassword') {
        ?>
        <center>
            <form action="account.php?action=ChangePassword" id="validate" class="form" method="POST" >
                &emsp; <label> old password:     &emsp; &emsp; <input  type="password"     name="old_password"      autocomplete="off"  /> </label> <br/>
                &emsp; <label> new password:     &emsp; &emsp; <input  type="password"     name="new_password"      autocomplete="off"  /> </label> <br/>
                &emsp; <label> Confirm password:        &emsp; <input  type="password"     name="re_password"       autocomplete="off"  /> </label> <br/>

                <input type="submit" name="change_password" value="change" required="required" >
                or <a href="account.php">cancel</a>
            </form> <br/>
        </center>
    <?php
        if (isset($_POST['change_password'])) {
            echo "nee mag niet";
        }
    }
}
else {
    echo "You must be logged in.";
}
?>

<?php include 'templates/footer.php'; ?>