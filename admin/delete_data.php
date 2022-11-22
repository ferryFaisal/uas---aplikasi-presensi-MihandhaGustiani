<?php
require 'connect_db.php';

$email = $_GET['email'];

$sql = "DELETE FROM user WHERE email = '$email'";
if (mysqli_query($conn, $sql)) {
    if (isset($_SESSION['login']) && $_SESSION['role'] == "Admin") {
        header('Location: tables_user.php');
        ob_end_flush();
    } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='tables_user.php';</script>";
    }
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);