<?php
require('connect_db.php');

  $nama   = $_POST['nama'];
  $nim     = $_POST['nim'];
  $kelas         = $_POST['kelas'];
  // $gambar_produk = $_FILES['gambar_produk']['name'];
  $created       = date("created");
  $modified      = $created;
                  
  $query = "INSERT INTO mahasiswa (nama, nim, kelas) VALUES ('$nama', '$nim', '$kelas')";
                  $result = mysqli_query($conn, $query);
                  
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='mahasiswa.php';</script>";
                  }

  