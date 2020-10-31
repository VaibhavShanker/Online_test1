<?php
    $siteurl="http://localhost/training/php/sql_task/";
    $sitename="PHP_Mysql_task1";

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="database";

    $conn=new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
}

?>