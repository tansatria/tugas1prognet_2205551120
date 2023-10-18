<?php
require 'koneksi.php';

// Mendapatkan nilai-nilai dari formulir
$nama = $_POST['nama'];
$tahunLahir = $_POST['lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$universitas = $_POST['univ'];
$fakultas = $_POST['fakultas'];
$prodi = $_POST['prodi'];
$nim = $_POST['nim'];

// Membuat pernyataan SQL untuk menyimpan data
$sql = "INSERT INTO tb_datadiri(nama_mhs, tgl_lahir, alamat, agama, universitas, fakultas, prodi, nim) 
        VALUES ('$nama', '$tahunLahir', '$alamat', '$agama', '$universitas', '$fakultas', '$prodi', '$nim')";

if ($conn->query($sql) === TRUE) {
    echo "
        <script>

            document.location.href='tampilan.php';
        </script>
    ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
