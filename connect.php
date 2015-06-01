<?php
$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to the server"); /* make the connection to PhpMyAdmin*/
mysql_select_db("php_forum") or die("Couldn't connect to the database");                    /* get the database */
?>