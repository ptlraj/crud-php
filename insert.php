<!DOCTYPE html>
<html lang="en">

<head>
    <title>insert</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="enter name">
        <br>
        <br>
        <input type="text" name="branch" placeholder="enter branch">
        <br>
        <br>
        <input type="text" name="city" placeholder="enter city">
        <br>
        <br>
        <input type="text" name="year" placeholder="enter year">
        <br>
        <br>
        <button>Add Student</button>

    </form>

</body>

</html>

<?php
include "conn.php";

if (isset($_POST['name'], $_POST['branch'], $_POST['city'], $_POST['year'])) {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $city = $_POST['city'];
    $year = $_POST['year'];

    // Correct SQL query
    $getstudent = $conn->prepare("INSERT INTO `students` (`name`, `branch`, `city`, `year`) VALUES ('$name', '$branch', '$city', '$year')");

    // Execute the query
    $result = $getstudent->execute();


    if ($result) {
        header('location: update.php');
    } else {
        echo "Error adding student";
    }
} else {
    echo "All fields are required.";
}
?>