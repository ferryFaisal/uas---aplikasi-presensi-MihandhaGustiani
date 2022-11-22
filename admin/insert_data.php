<?php
require "connect_db.php";

$pwd = sha1($password);
$create = date('d-m-Y');
$modified = $date_created;




$sql = "INSERT INTO user (email, name, password, role, date_created, date_modified)
VALUES ('$email', '$name', '$pwd','$role','date_created','$modified')";


if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header('Location: login.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>