<?php include 'header.php';?>

<?php
// destroy the sessions
session_destroy ();

echo "<script>alert('Logout Sucessfully')</script>";
header ( "REFRESH:0; url=index.php" );
?>

<?php include 'footer.php';?>