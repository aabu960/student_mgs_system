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

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);



    //STEP 4
    $sql = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();


    //STEP 5 

if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            echo "Login successful! Redirecting...";
            header("Location: dashboard.php");
            exit();


} else {
    echo "Invalid credentials!";
}
} else {
echo "User not found!";
}

$sql->close();
$connection->close();

}
?>


<form method="POST">
<label for="name"> Email:</label>
    <input type="email" name="email" placeholder="Email" required><br>
    <label for="name"> Password:</label>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
