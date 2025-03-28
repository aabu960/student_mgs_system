<?php 

// STEP1
$connection = new mysqli('localhost','root', '','student_db');

//STEP2
if ($connection->connect_error) {
    die("connection failed: " .$connection->connect_error);

}

//STEP 3
$name = $_POST['name'];
$email = $_POST['email'];
$programe= $_POST['programe'];



//STEP4
$sql = "INSERT INTO student_data (name,email,programe) VALUES ('$name','$email', '$programe')";

if ($connection->query($sql) === TRUE) {
    echo "Data inserted successfully!";

}else{
    echo"Error: " . $sql . $connection->error;
}

$connection->close();

?>
