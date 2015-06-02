<?php include 'templates/header.php'; ?>

<form action="login.php" method="post">
    &emsp; <label> username:            &emsp; <input  type="text"         name="username"                       /></label><br />
    &emsp; <label> password:            &emsp; <input  type="password"     name="password"     autocomplete="off"  /></label><br />
    &emsp; <input type="submit" name="submit" value="login" required="required" > or <a href="register.php">register</a>
</form>

<?php
include 'connect.php'; /* connect to the database */

session_start(); /* start the login session */

$username = @$_POST['username'];    /* TODO: login moet veranderd worden voor een EMAIL */
$password = @$_POST['password'];
$salt = 'mmm_z0ut_l3kker';                 /* salt wordt gebruikt "mmm_z0ut_l3kker"*/

$db_type = 'mysql';
$db_host = 'localhost';
$db_user = 'root';  /* TODO: een nieuwe user moet gemaakt worden*/
$db_pass = '';
$db_name = 'php_forum';

if(isset($_POST['submit'])) {   /* On click submit */
    if($username && $password) { /* something is entered in the fields */
        try {
            $db_connect = new PDO("$db_type:host=$db_host; dbname=$db_name;", $db_user, $db_pass);
            $query = "SELECT * FROM users WHERE username = :username AND  password = :password";
            $resultaat = $db_connect->prepare($query);
            $resultaat->execute(array(
                    ':username' => $username,
                    ':password' => openssl_digest($salt.$password, 'sha512'))
            );

            if ($resultaat->rowCount() > 0) { /* if() -> login gelukt */
                $rij = $resultaat->fetch();

                @$_SESSION["username"] = $username;
                header("Location: index.php");
                die(0);

            } else {
                echo "Please fill in all the fields correctly &emsp; ";
            }

        } catch (PDOException $error) {
            echo "Please fill in all the fields correctly";
            echo $error->getMessage();
            die();
        }
    } else { /* A field is empty */
        echo "Please fill in all the fields correctly";
    }
}



//if(isset($_POST['submit'])) {   /* On click submit */
//    if($username && $password) { /* something is entered in the fields */
//        $check = mysql_query("SELECT * FROM users WHERE username='".$username."' ");    /* TODO: !! PDO !! is benodiged */
//        $rows = mysql_num_rows($check);
//
//        if (mysql_num_rows($check) != 0 ) {
//            while($row = mysql_fetch_assoc($check)) {
//                $db_username = $row['username'];    /* database username */
//                $db_password = $row['password'];    /* database hashed password */
//            }
//            if ($username == $db_username && openssl_digest($salt.$password, 'sha512') == $db_password) { /* hash the field password and compair it with the db_hash */
//                @$_SESSION["username"] = $username;
////                header("Location: index.php");
//            } else { /* the password is wrong */
//                echo "Please fill in all the fields correctly";
//            }
//        } else { /* the username is wrong */
//            die("Please fill in all the fields correctly");
//        }
//    } else { /* A field is empty */
//        echo "Please fill in all the fields correctly";
//    }
//}
//

?>


<?php include 'templates/footer.php'; ?>