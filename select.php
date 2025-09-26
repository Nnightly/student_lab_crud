<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a4508b, #5f0a87);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            background-color: #2c2c54;
        }
        .card-header {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border-radius: 15px 15px 0 0;
            font-weight: bold;
            text-align: center;
            color: #fff;
        }
        table {
            background-color: #fff;
            color: #333;
        }
        th {
            background: #ff7eb3;
            color: #fff;
            text-align: center;
        }
        td {
            text-align: center;
            vertical-align: middle;
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
                Student Records
            </div>
            <div class="card-body">
                <div class="mb-3 text-center">
                    <a href="insert.php" class="btn btn-custom">➕ Add Student</a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM students");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['course']}</td>
                                    <td>
                                        <a href='update.php?id={$row['id']}' class='btn btn-sm btn-custom'>Edit</a>
                                        <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
