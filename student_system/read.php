<?php
include 'dbhelper.php';

$db = new DBHelper();

$result = $db->read();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read Students</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Read Students</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Course</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['age']; ?></td>
          <td><?php echo $row['course']; ?></td>
          <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>