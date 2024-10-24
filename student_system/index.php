<?php
include 'dbhelper.php';

$db = new DBHelper();

// Handle form submission for creating a new student
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    if ($db->create($first_name, $last_name, $age, $course)) {
        echo "New record created successfully";
    } else {
        echo "Error creating record";
    }
}

// Read students from the database
$result = $db->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Student System</h1>

    <!-- Form for creating a new student -->
    <h2>Add New Student</h2>
    <form action="index.php" method="POST">
        <label for="first_name">First Name:</label><br>
        <input type="text" name="first_name" required><br><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>
        <label for="age">Age:</label><br>
        <input type="number" name="age" required><br><br>
        <label for="course">Course:</label><br>
        <input type="text" name="course" required><br><br>
        <button type="submit" name="submit">Add Student</button>
    </form>

    <!-- Display existing students -->
    <h2>Existing Students</h2>
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
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
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
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>