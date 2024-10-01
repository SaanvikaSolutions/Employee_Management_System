<?php
$conn = mysqli_connect('localhost','root','','ems');
if(!$conn){
    die("Connection failed: " .mysqli_error($conn));
}
?>