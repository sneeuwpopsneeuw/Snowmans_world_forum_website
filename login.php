<?php include 'templates/header.php'; ?>

<form action="login.php" method="post">
    &emsp; <label> username:            &emsp; <input  type="text"         name="username"                       /></label><br />
    &emsp; <label> password:            &emsp; <input  type="password"     name="password"     autocomplete="off"  /></label><br />
    &emsp; <input type="submit" name="submit" value="login" required="required" > or <a href="register.php">register</a>
</form>

<?php
include 'connect.php'; /* connect to the database */

session_start(); /* start the login session */

$username = @$_POST['username'];
$password = @$_POST['password'];
$salt = 'mmm_z0ut_l3kker';                 /* salt wordt gebruikt "mmm_z0ut_l3kker"*/

if(isset($_POST['submit'])) {   /* On click submit */
    if($username && $password) { /* something is entered in the fields */
        $check = mysql_query("SELECT * FROM users WHERE username='".$username."' ");    /* check username */
        $rows = mysql_num_rows($check);

        if (mysql_num_rows($check) != 0 ) {
            while($row = mysql_fetch_assoc($check)) {
                $db_username = $row['username'];    /* database username */
                $db_password = $row['password'];    /* database hashed password */
            }
            if ($username == $db_username && openssl_digest($salt.$password, 'sha512') == $db_password) { /* hash the field password and compair it with the db_hash */
                @$_SESSION["username"] = $username;
                header("Location: index.php");
            } else { /* the password is wrong */
                echo "Please fill in all the fields correctly";
            }
        } else { /* the username is wrong */
            die("Please fill in all the fields correctly");
        }
    } else { /* A field is empty */
        echo "Please fill in all the fields correctly";
    }
}
?>


<?php include 'templates/footer.php'; ?>