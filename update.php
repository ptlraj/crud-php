<link rel="stylesheet" href="crud.css">

<form class="search" method="post">
    <input type="text" name="search" placeholder="Enter name for search">

    <button>Search Student</button>
    <button><a href="insert.php">Add Student</a></button>
</form>

<?php
include "conn.php";


if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $student = $conn->prepare("delete from college.students where id='$id'");
    if ($student->execute()) {
        echo "record deleted";
    } else {
        echo "record not deleted";
    }
}


if (isset($_POST['search'])) {
    $name = $_POST['search'];
    $getstudent = $conn->prepare("select * from college.students where name like '$name%'");
    $getstudent->execute();
    $student = $getstudent->fetchALL();
} else {
    $getstudent = $conn->prepare("select * from college.students");
    $getstudent->execute();
    $student = $getstudent->fetchALL();
}




echo "<table border='1'>";
foreach ($student as $std) {
    echo "<tr>";
    echo "<td>" . $std['id'] . "</td>";
    echo "<td>" . $std['name'] . "</td>";
    echo "<td>" . $std['branch'] . "</td>";
    echo "<td>" . $std['city'] . "</td>";
    echo "<td>" . $std['year'] . "</td>";
    echo "<td><form action='' method='post'><button name=delete value=" . $std['id'] . ">delete  </button></form></td>";
    echo "<td><a href='updatedata.php?id=" . $std['id'] . "'>Edit</a></td>";
    echo "</tr>";
}
echo "</table>";

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $student = $conn->prepare("delete from college.students where id='$id'");
    if ($student->execute()) {
        echo "record deleted";
    } else {
        echo "record not deleted";
    }
}
