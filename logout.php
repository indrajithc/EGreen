<?php 
<?php 
session_start();
$user_type = $_SESSION['type'];
unset($_SESSION['type']);
unset($_SESSION['userid']);

header("Location: " . $user_type . "/login.php");

?>