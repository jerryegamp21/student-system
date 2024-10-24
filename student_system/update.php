<?php
include 'dbhelper.php';

$db = new DBHelper();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $db->read();
  $student = null;

  while ($row = $result->fetch_assoc()) {
    if ($row['id'] == $id) {
      $student = $row;
      break;
    }
  }
}

if (isset($_POST['submit'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $age = $_POST['age'];
  $course = $_POST['course'];

  if ($db->update($id, $first_name, $last_name, $age, $course)) {
    echo "Record updated successfully";
    header("Location: read.php");
  } else {
    echo "Error updating record";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Update Student</h1>
  <form action="update.php?id=<?php echo $id; ?>" method="POST">
    <label for="first_name">First Name:</label><br>
    <input type="text" name="first_name" value="<?php echo $student['first_name']; ?>" required><br><br>
    <label for="last_name">Last Name:</label><br>
    <input type="text" name="last_name" value="<?php echo $student['last_name']; ?>" required><br><br>
    <label for="age">Age:</label><br>
    <input type="number" name="age" value="<?php echo $student['age']; ?>" required><br><br>
    <label for="course">Course:</label><br>
    <input type="text" name="course" value="<?php echo $student['course']; ?>" required><br><br>
    <button type="submit" name="submit">Update</button>
  </form>
</body>
</html>