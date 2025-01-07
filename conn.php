<?php
$hostname = "localhost";
$username = "root";
$password = NULL;
$dbname = "college";

$conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
