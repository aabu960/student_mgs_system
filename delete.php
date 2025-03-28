<?php


// STEP1
$connection = new mysqli('localhost','root', '','student_db');

//STEP2
if ($connection->connect_error) {
    die("connection failed: " .$connection->connect_error);

}

$id=$_GET['id'];

$sql = "DELETE FROM student_data WHERE id=$id";

if ($connection->query($sql) === TRUE) {
    echo "Record deleted successfully!";
    header("Location: display.php");
    exit();
} else {
    echo "Error deleting record: " . $connection->error;
}

$conn->close();

?>