<?php
require 'connect_db.php';

session_start();
ob_start();

if (isset($_SESSION['login']) && $_SESSION['role'] == "Admin") { //jika sudah login
} else if (isset($_SESSION['login']) && $_SESSION['role'] == "Dosen") {
    header("Location: login.php");
} else {
    die("Anda belum login! Anda tidak berhak masuk ke halaman ini.Silahkan login <a href='login.php'>di sini</a>");

}
$nim = $_GET['nim'];
$sql = "SELECT * FROM mahasiswa where nim = '$nim'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $sql = "UPDATE mahasiswa set nama = '$_POST[nama]', kelas = '$_POST[kelas]' where nim='$nim'";
    mysqli_query($conn,$sql);
    header("Location: mahasiswa.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin, Edit Mahasiswa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Tambah Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Nama Mahasiswa</label>
                                <input type="text" value="<?= $row['nama'] ?>" name="nama" autofocus="" required="" />
                            </div>
                        </div>
                    </div>


                    

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Kelas Mahasiswa</label><br>
                                <select class="form-select" aria-label="Default select example" name="kelas"
                                    required="required">
                                    <option selected>--Pilih Kelas--</option>
                                    <option value="5A">5A</option>
                                    <option value="5B">5B</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                        <button type="submit" name ='submit' >Simpan</button>
                    </div>
                    </section>
                </form>

            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>