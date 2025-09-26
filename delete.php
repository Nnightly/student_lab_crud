<?php include 'db_connect.php'; ?>
<?php
$id = $_GET['id'];

// Fetch student details for confirmation
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$student = $result->fetch_assoc();

if (isset($_POST['confirm'])) {
    $sql = "DELETE FROM students WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('Student deleted successfully!'); window.location='select.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "'); window.location='select.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a4508b, #5f0a87);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .container {
            margin-top: 100px;
            max-width: 500px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            background-color: #2c2c54;
            text-align: center;
            padding: 20px;
        }
        .card-header {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border-radius: 15px 15px 0 0;
            font-weight: bold;
            color: #fff;
            font-size: 1.3rem;
            padding: 15px;
        }
        .btn-delete {
            background: linear-gradient(135deg, #ff4e50, #f9d423);
            border: none;
            color: #fff;
        }
        .btn-delete:hover {
            opacity: 0.9;
        }
        .btn-cancel {
            background-color: #6c757d;
            border: none;
            color: #fff;
        }
        .btn-cancel:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">⚠️ Confirm Delete</div>
            <div class="card-body">
                <?php if ($student): ?>
                    <p>Are you sure you want to delete this student?</p>
                    <p><strong><?php echo $student['name']; ?></strong><br>
                    <?php echo $student['email']; ?><br>
                    <?php echo $student['course']; ?></p>
                    <form method="POST">
                        <button type="submit" name="confirm" class="btn btn-delete">Yes, Delete</button>
                        <a href="select.php" class="btn btn-cancel">Cancel</a>
                    </form>
                <?php else: ?>
                    <p class="text-danger">Student not found!</p>
                    <a href="select.php" class="btn btn-cancel">Back</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
