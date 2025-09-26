<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>

<h2>Update Student</h2>
<form method="POST">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Course</label>
        <input type="text" name="course" value="<?php echo $row['course']; ?>" class="form-control" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-3'>Student updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}
?>

</body>
</html>
