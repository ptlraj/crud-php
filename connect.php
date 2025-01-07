<?php
// $hostname = "localhost";
// $username = "root";
// $password = NULL;
// $dbname = "college";

// $conn = new mysqli($hostname, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }

// $sql = "CREATE DATABASE college";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

use LDAP\Result;

$hostname = "localhost";
$username = "root";
$password = NULL;
$dbname = "college";

// $conn = new mysqli($hostname, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("connection failed" . $conn->connect_error);
// } else {
//     echo "connected successfully";
// }

$conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $err) {
    echo "Connection failed: " . $err->getMessage();
}
$Result = $conn->query("show tables");
echo "<br/>";
while ($row = $Result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['Tables_in_college'] . "<br/>";
}
