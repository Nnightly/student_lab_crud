<?php include 'db_connect.php'; ?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";
if ($conn->query($sql)) {
    header("Location: select.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
