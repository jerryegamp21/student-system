<?php
class DBHelper {
  private $conn;

  function __construct() {
    include 'config.php';
    $this->conn = $conn;
  }

  function create($first_name, $last_name, $age, $course) {
    $sql = "INSERT INTO students (first_name, last_name, age, course) VALUES ('$first_name', '$last_name', '$age', '$course')";
    if ($this->conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }
  }

  function read() {
    $sql = "SELECT * FROM students";
    $result = $this->conn->query($sql);
    return $result;
  }

  function update($id, $first_name, $last_name, $age, $course) {
    $sql = "UPDATE students SET first_name='$first_name', last_name='$last_name', age='$age', course='$course' WHERE id='$id'";
    if ($this->conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }
  }

  function delete($id) {
    $sql = "DELETE FROM students WHERE id='$id'";
    if ($this->conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }
  }
}
?>