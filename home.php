<?php include 'templates/header.php'; ?>

<?php

if(@$_SESSION["username"]) {
    echo "<center> <h1> Home </h1>";
?>
    <a href="post.php"><button>Start new Topic </button></a> <br/> <br/>
    <table>
        <tr>
            <td width='50px' style='text-align: center'> id </td>
            <td width='400px' style='text-align: center'> name </td>
            <td width='200px' style='text-align: center'> creator </td>
            <td width='100px' style='text-align: center'> date </td>
            <td width='100px' style='text-align: center'> views </td>
        </tr>

<?php


    include 'config.php';
    $db_connect = new PDO("$db_type:host=$db_host; dbname=$db_name;", $db_user, $db_pass);
    $resultaat = $db_connect->prepare("SELECT * FROM topics");
    $resultaat->execute();

//    $rij = $resultaat->fetchAll();
    while ($res = $resultaat->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
        echo "<td style='text-align: center'>"                                                              . $res['t_id'] .        "       </td>";     /* TODO: style it up OR delete/rename it */
        echo "<td style='text-align: center'> <a href='#t_name'>"                                           . $res['t_name'] .      "</a>   </td>";
        echo "<td style='text-align: center'> <a href='profile.php?username=".$res['t_creator']."'>"        . $res['t_creator'] .   "</a>   </td>";
        echo "<td style='text-align: center'> <a href='#t_date'>"                                           . $res['t_date'] .      "</a>   </td>";
        echo "<td style='text-align: center'>"                                                              . $res['t_views'] .     "       </td>";
        echo '</tr>';
    }


    if(@$_GET['action'] == 'logout') {
        session_destroy();
        header("Location: login.php");
    }
        echo "</table>";
    echo "</center>";
}
else {
    echo "You must be logged in.";
}
?>

<?php include 'templates/footer.php'; ?>