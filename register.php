<?php 
session_start();

// STEP1
$connection = new mysqli('localhost','root', '','student_db');

//STEP2
if ($connection->connect_error) {
    die("connection failed: " .$connection->connect_error);

}

//STEP 3

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = 'student';




// STEP 4
if (empty($name) || empty($email) || empty($_POST['password'])) {
    die("All fields are required.");
}

//STEP 5
$sql = $connection->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $name, $email, $password, $role);

    if ($sql->execute()) {
        echo "Signup successful! <a href='login.php'>Login Here</a>";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $connection->close();
}

?>


<form method="POST">
<label for="name"> Name:</label>
    <input type="text" name="name" placeholder="Full Name" required><br>
    <label for="name"> Email:</label>
    <input type="email" name="email" placeholder="Email" required><br>
    <label for="name"> Password:</label>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Signup</button>
</form>