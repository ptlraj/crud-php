<?php
include "conn.php";
$getstudents = $conn->prepare("select * from college.students");
$getstudents->execute();
$students = $getstudents->fetchAll();

echo "<table border='1'>";
echo "<thead>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Branch</th>";
echo "<th>City</th>";
echo "<th>Year</th>";
echo "</thead>";


foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student['id'] . "</td>";
    echo "<td>" . $student['name'] . "</td>";
    echo "<td>" . $student['branch'] . "</td>";
    echo "<td>" . $student['city'] . "</td>";
    echo "<td>" . $student['year'] . "</td>";
    echo "</tr>";
}
echo "</table>";
