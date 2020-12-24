<?php
// server vars
$server = "localhost";
$user = "root";
$password = "";
$database = "insta";

// connect to the server
$con = mysqli_connect ( $server, $user, $password, $database ) or die ( "Sorry can't connect to the server" );

// select the database
//mysql_select_db ( $database ) or die ( "Sorry can't find this database" );

// to remove all notice messages
error_reporting ( 'E-All ~E-Notice' );

session_start ();
?>