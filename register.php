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

<?php include 'connect.php'; ?>

<?php
$username = @$_POST['username'];
$password = @$_POST['password'];                /* TODO: directe sha512 nodig */
$repassword = @$_POST['repassword'];
$email = @$_POST['email'];                      /* TODO: email moet vervangen worden voor de username */
$date = date("y-m-d");
$salt = 'mmm_z0ut_l3kker';                      /* salt wordt gebruikt "mmm_z0ut_l3kker"*/
$pass_en = openssl_digest($salt.$password, 'sha512');

// DB information
include 'config.php';

echo"<br />";
if(isset($_POST['submit'])) {
    if($username && $password && $repassword && $email) {                                                                   /* IF fields are not empty */
        if (strlen($username) >= 5 && strlen($username) <= 25  &&  strlen($password) >= 7 && strlen($username) <= 25) {     /* IF fields a entered to the rules */
            if ($password == $repassword) {                                                                                 /* IF Confirm password is correct */
                try {                                                                                                       /* TRY connection */
                    $db_connect = new PDO("$db_type:host=$db_host; dbname=$db_name;", $db_user, $db_pass);
//                    $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = "INSERT INTO users (id, username, password, email, datum ) VALUES ('', :username, :password, :email, :datum)";
//                    OLD MYSQL VERSION mysql_query("INSERT INTO `php_forum`.`users` (id, username, password, email, datum ) VALUES ('', '" . $username . "', '" . $pass_en . "', '" . $email . "', '" . $date . "'  )"))
                    $resultaat = $db_connect->prepare($query);
                    $resultaat->execute(array(
                            ':username' => $username,
                            ':password' => $pass_en,
                            ':email' => $email,
                            ':datum' => $date
                        )
                    );
                    echo "you have been registered as $username. Click <a href='login.php'>here</a *> to login";
                } catch (PDOException $error) {                                                                             /* IF try makes a error get error and output it */
                    echo 'Connection failed: ' . $error->getMessage();      /* TODO: better error handling */
                }
            }
            else{ echo "passwords do not match"; }
        }
         else { /* the username or password is not strong */
            if (strlen($username) < 5 || strlen($username) > 25) {      /* username not good */
                echo "your username must between 5 and 25 characters";
            }
            elseif(strlen($password) < 7 || strlen($username) > 25) {  /* password not good */
                echo "your password must between 7 and 25 characters";
            }
        }
    } /* A field is empty */
    else { echo "please fill in all the fields correctly"; }
}
?>

<?php include 'templates/footer.php'; ?>