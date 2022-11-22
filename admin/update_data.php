<?php
require "connect_db.php";

$email1 = $_GET['email'];

$sql1 = "UPDATE user SET name='$name',
password='$password',
role='$role',
date_modified = sysdate()
WHERE email = '$email1'";

if (mysqli_query($conn, $sql1)) {
    if (isset($_SESSION['login']) && $_SESSION['role'] == "Admin") {
        header('Location: tables_user.php');
        ob_end_flush();
    } else if (isset($_SESSION['login']) && $_SESSION['role'] == "Dosen") {
        header('Location: \WebProgramming/uas---aplikasi-presensi-AbangMuhammadFajar/Dosen.php');
        ob_end_flush();
    }

} else {
    echo "gagal mengedit data: " . mysqli_error($conn);
}

mysqli_close($conn);