<?php include 'templates/header.php'; ?>
<br/>
<form action="register.php" id="validate" class="form" method="POST" >
    &emsp; <label> username:            &emsp; <input  type="text"         name="username"                       /></label><br />
    &emsp; <label> password:            &emsp; <input  type="password"     name="password"     autocomplete="off"  /></label><br />
    &emsp; <label> Confirm password:    &emsp; <input  type="password"     name="repassword"   autocomplete="off"  /></label><br />
    &emsp; <label> email:               &emsp; <input  type="email"        name="email"                            /></label><br />

    <input type="submit" name="submit" value="Register" required="required" >
    or <a href="login.php">login</a>
</form>


<br/> <br/>
<!---->
<!--    <form action="register.php" id="validate" class="form" method="POST">-->
<!--        <fieldset>-->
<!--            <div class="formRow">-->
<!--                <label for="username">Email</label>-->
<!--                <div class="loginInput"><input type="text" name="username" id="username" /></div>-->
<!--                <div class="clear"></div>-->
<!--            </div>-->
<!---->
<!--            <div class="formRow">-->
<!--                <label for="password">Password</label>-->
<!--                <div class="loginInput"><input type="password" name="password" id="password" /></div>-->
<!--                <div class="clear"></div>-->
<!--            </div>-->
<!---->
<!--            <div class="loginControl">-->
<!--                <input type="submit" value="Login" name="loginBtn" />-->
<!--                <div class="clear"></div>-->
<!--            </div>-->
<!--        </fieldset>-->
<!--    </form>-->
<!--<br/>-->

<?php include 'connect.php'; ?>

<?php
$username = @$_POST['username'];
$password = @$_POST['password'];
$repassword = @$_POST['repassword'];
$email = @$_POST['email'];
$date = date("y-m-d");
$salt = 'mmm_z0ut_l3kker';                 /* salt wordt gebruikt "mmm_z0ut_l3kker"*/
$pass_en = openssl_digest($salt.$password, 'sha512');


echo"<br />";
if(isset($_POST['submit'])) {
    if($username && $password && $repassword && $email) {                                                                   /* fields are not empty */
        if (strlen($username) >= 5 && strlen($username) <= 25  &&  strlen($password) >= 7 && strlen($username) <= 25) {     /* fields a entered to the rules */
            if ($password == $repassword) {                                                                                 /* Confirm password is correct */
                if ($query = mysql_query("INSERT INTO `php_forum`.`users` (id, username, password, email, datum ) VALUES ('', '" . $username . "', '" . $pass_en . "', '" . $email . "', '" . $date . "'  )")) {
                    echo "you have been registered as $username. Click <a href='login.php'>here</a> to login";
                } else { /* the sql insert is niet gelukt, OOPS*/
                    echo "Sorry something failed &emsp; pls try again";
                }

//            echo "<br/>username - " . $username;
//            echo "<br/>password - " . $password;
//            echo "<br/>repassword - " . $repassword;
//            echo "<br/>email - " . $email;
            }
            else{ echo "passwords do not match"; }
        }
         else { /* the username or password is not strong */
            if (strlen($username) < 5 || strlen($username) > 25) { /* username not good */
                echo "your username must between 5 and 25 characters";
            }
            else if(strlen($password) < 7 || strlen($username) > 25) { /* password not good */
                echo "your password must between 7 and 25 characters";
            }
        }
    } /* A field is empty */
    else { echo "please fill in all the fields"; }
}
?>

<?php include 'templates/footer.php'; ?>