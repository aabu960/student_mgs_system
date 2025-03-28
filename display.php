<?php


// STEP1
$connection = new mysqli('localhost','root', '','student_db');

//STEP2
if ($connection->connect_error) {
    die("connection failed: " .$connection->connect_error);

}

//STEP3

$sql = "SELECT id,  name, email, programe FROM student_data";

$result = $connection->query($sql) ;

echo "<h2> Student Management System " ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<table border="1" >

<tr> 
<th>Name</th>
<th>Email</th>
<th>programe</th>
<th>Action</th>
</tr>

<?php
if ($result->num_rows >0) {

    while ($row = $result->fetch_assoc()) {
      echo "<tr>
    
      <td>" . $row["name"] . "</td>
      <td>" . $row["email"] . "</td>
      <td>" . $row["programe"] . "</td>

       <td>
          <a href='edit.php?id= " . $row["id"] . "'>Edit</a> | 
          <a href='delete.php?id= " . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>
      </td>

    </tr>";
}
}

?>

</table>  
</body>
</html>
