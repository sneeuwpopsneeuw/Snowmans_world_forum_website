<?php include 'templates/header.php'; ?>

<?php
include 'connect.php';
session_start();

if(@$_SESSION["username"]) {
    include 'navbar.php';

    echo "<center> <h1> Topic </h1>";
    ?>
    <form action="post.php" method="post">
        <label> Topic name:     <br /> <input  type="text" name="Topic_name" style="width: 500px;"/></label><br />
        <label> Content:        <br /> <textarea name="Topic_Content" style="resize: none; width: 500px; height: 300px;"></textarea> <br />
            <!-- do not put a space between ></textarea> it will break the field is filed in check -->
        <input type="submit" name="post" value="post" required="required" > or <a href="home.php">cancel</a>
    </form>
    <?php
    echo "</center>";

    // Topic information
    $t_name = @$_POST['Topic_name'];
    $t_content = @$_POST['Topic_Content'];

    // DB information
    include 'config.php';

    if (isset($_POST['post'])) {
        if($t_name && $t_content) {                                                             /* IF all fields are filed in */
            if (strlen($t_name) >= 10 && strlen($t_name) <= 150) {                              /* IF name is between 10 and 150 characters */
                try {
                    $db_connect = new PDO("$db_type:host=$db_host; dbname=$db_name;", $db_user, $db_pass);
                    $query = "INSERT INTO topics (t_id, t_name, t_creator, t_content, t_date ) VALUES ('', :t_name, :t_creator, :t_content, :t_date)";
                    $resultaat = $db_connect->prepare($query);
                    $resultaat->execute(array(
                            ':t_name' => $t_name,
                            ':t_creator' => @$_SESSION["username"],
                            ':t_content' => $t_content,
                            ':t_date' => date("y-m-d")
                        )
                    );
                    echo "your post has success fully been added";
                    header("Location: home.php");
                }
                catch (PDOException $error) {                                                   /* IF try makes a error get error and output it */
                    echo 'Connection failed: ' . $error->getMessage();      /* TODO: better error handling */
                }
            } else { echo "Topic name must be between 10 and 150 characters long"; }            /* ELSE name must be 10 and 150 characters */
        } else { echo "please fill in all the fields correctly"; }                              /* ELSE a field is not filed in */
    }

    if(@$_GET['action'] == 'logout') {                                                          /* LOGOUT */
        session_destroy();
        header("Location: login.php");
        die(0);
    }
}
else {                                                                                          /* Give a error message when you are not logged in */
    echo "You must be logged in.";
}
?>

<?php include 'templates/footer.php'; ?>