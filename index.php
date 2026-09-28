<?php
include "db.php";

if (isset($_POST['submit'])) {

    $index_no = $_POST['index_no'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];

    $sql = "INSERT INTO student (index_no, name, email)
            VALUES ('$index_no', '$name', '$email')";

    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="styleeee.css">
</head>
<body>

<div class="container">

<h1 class="title">Student Records</h1>
 <div class="form-center">
        <form method="post">
            <label>Student Index No</label>
            <input type="text" name="index_no" required>

            <label>Student Name</label>
            <input type="text" name="name" required>

            <label>Student Email</label>
            <input type="email" name="email" required>

            <input type="submit" name="submit" value="Insert">
        </form>
    </div>

   <h1 class="title">Student Records</h1>
  
    <table border="1" cellpadding="8">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM student");

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['index_no']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
