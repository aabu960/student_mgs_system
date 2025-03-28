<?php


// STEP1
$connection = new mysqli('localhost','root', '','student_db');

//STEP2
if ($connection->connect_error) {
    die("connection failed: " .$connection->connect_error);

}
//STEP3
$id=$_GET['id'];

$sql = "SELECT * FROM student_data WHERE id=$id";

$result = $connection ->query($sql);

$row = $result ->fetch_assoc();

//STEP 4
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name =$_POST['name'];
    $email =$_POST['email'];
    $programe=$_POST['programe'];
    
    $sql = "UPDATE student_data SET name='$name ', email='$email', programe='$programe' WHERE id=$id";


if($connection->query($sql)===TRUE){
    echo"SUCCESSFULLY UPDATED thank you";
    header("Location: display.php");

    exit();

}
}
$connection->close()



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>UPDATE student record</h2>
    <form method="post">

    <label for="name"> Name:</label>
<input type="text" name="name" value = "<?php echo htmlspecialchars($row['name']); ?>" ><br /> <br /> 

<label for="name"> Email:</label>
<input type="email" name="email" value = "<?php echo htmlspecialchars($row['email']); ?>"  ><br /> <br />

<label for="name"> Programe:</label>
<input type="text" name="programe"  value = "<?php echo htmlspecialchars($row['programe']); ?>" ><br /> <br />

<button type="submit"> Update</button>

    </form>
</body>
</html>