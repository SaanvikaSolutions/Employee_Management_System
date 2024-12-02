<?php
$version = phpversion();
print($version);
$name = 'Vinitha';
echo 'Hello, $name!';
define("Name","Vinitha");
echo Name;
echo "<br></br>";
const Age="23";
echo Age;
include 'config.php'; // If this file is missing, a warning is shown, but the script continues.

echo "Hello";
require 'config.php'; // If this file is missing, a warning is shown, but the script continues.

echo "Hi Vinitha";



?>
