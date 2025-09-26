<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a4508b, #5f0a87);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .container {
            margin-top: 60px;
            max-width: 600px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            background-color: #2c2c54;
        }
        .card-header {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border-radius: 15px 15px 0 0;
            font-weight: bold;
            text-align: center;
            color: #fff;
            font-size: 1.3rem;
        }
        label {
            color: #ddd;
            font-weight: 500;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-custom {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border: none;
            color: #fff;
            transition: 0.3s;
        }
        .btn-custom:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                ➕ Add Student
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Student Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <input type="text" name="course" id="course" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-custom">Save Student</button>
                        <a href="select.php" class="btn btn-secondary">Back</a>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $name   = $_POST['name'];
                    $email  = $_POST['email'];
                    $course = $_POST['course'];

                    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
                    if ($conn->query($sql)) {
                        echo "<div class='alert alert-success mt-3'>Student added successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
