<?php
$name = "localhost";
$root = "root";
$password = "";
$dbname = "chawrona";
$connection = mysqli_connect($name, $root, $password, $dbname);

if(!$connection) die("nieudane".mysqli_connect_error());
?>