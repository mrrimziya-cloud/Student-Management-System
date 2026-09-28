<?php
include "db.php";

$id = $_GET['id'];

$res = mysqli_query($conn,"SELECT * FROM student WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if(isset($_POST['update']))
{
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $index_no = $_POST['index'];

    mysqli_query($conn,
    "UPDATE student SET
     name='$name', email='$email', index_no='$index_no'
     WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="styleeee.css">
</head>
<body>

<form method="post">
    <h2>Edit Student</h2>

    Index
    <input type="text" name="index" value="<?php echo $row['index_no']; ?>">

    Name
    <input type="text" name="name" value="<?php echo $row['name']; ?>">

    Email
    <input type="email" name="email" value="<?php echo $row['email']; ?>">

    <input type="submit" name="update" value="Update">
</form>
