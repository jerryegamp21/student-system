<?php
include 'dbhelper.php';

$db = new DBHelper();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if ($db->delete($id)) {
    echo "Record deleted successfully";
    header("Location: read.php");
  } else {
    echo "Error deleting record";
  }
}
?>