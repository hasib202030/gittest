
<?php session_start(); ?>

<?php
//======session start=============
$_SESSION['username'] = null;
// $_SESSION['firstname'] = null;
// $_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");

//========session end============

?>