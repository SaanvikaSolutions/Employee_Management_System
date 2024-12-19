<?php
session_start(); // Start the session

// Destroy all session data
session_unset(); // Unset session variables
session_destroy(); // Destroy the session

// Redirect to the login page
echo "<script>alert('Logged Out Successfully');window.location.href='login.php';</script>";
exit();
?>