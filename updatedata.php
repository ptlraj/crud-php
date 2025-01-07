<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "conn.php";
    $getstudent = $conn->prepare("select * from students where id=$id");
    $getstudent->execute();
    $student = $getstudent->fetchALL();
    $name = $student[0]['name'];
    $branch = $student[0]['branch'];
    $city = $student[0]['city'];
    $year = $student[0]['year'];
}
?>

<form action="" method="post">
    <input type="text" name="name" value=<?php echo $name ?> />
    <br />
    <br />
    <input type="text" name="branch" value=<?php echo $branch ?> />
    <br />
    <br />
    <input type="text" name="city" value=<?php echo $city ?> />
    <br />
    <br />
    <input type="text" name="year" value=<?php echo $year ?> />
    <br />
    <br />
    <button name="update" value=<?php echo $id ?>>Update Student</button>
</form>
<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $city = $_POST['city'];
    $year = $_POST['year'];
    $students = $conn->prepare("update students 
    set name='$name',branch='$branch',city='$city',year='$year' 
    where id =$id");
    if ($students->execute()) {
        // echo "data updated";
        header('location: update.php');
    } else {
        echo "update fail";
    }
}
?>