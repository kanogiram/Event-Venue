<?php
// BEGIN Member 2: Delfina Kukaj

session_start();
session_destroy();

session_start();
$_SESSION['logout_msg'] = "You have been logged out successfully.";

header("Location: index.php");
exit();

// END Member 2: Delfina Kukaj
?>
