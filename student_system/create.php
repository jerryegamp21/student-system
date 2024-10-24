<?php
include 'dbhelper.php';

$db = new DBHelper();

if (isset($_POST['submit'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $age = $_POST['age'];
  $course = $_POST['course'];

  if ($db->create($first_name, $last_name, $age, $course)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Create Student</h1>
  <form action="create.php" method="POST">
    <label for="first_name">First Name:</label><br>
    <input type="text" name="first_name" required><br><br>
    <label for="last_name">Last Name:</label><br>
    <input type="text" name="last_name" required><br><br>
    <label for="age">Age:</label><br>
    <input type="number" name="age" required><br><br>
    <label for="course">Course:</label><br>
    <input type="text" name="course" required><br><br>
    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>