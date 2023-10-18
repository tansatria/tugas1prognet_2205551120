<?php

$db = 'db_2205551120';
$server = 'prognet.localnet';
$username = '2205551120';
$password = '2205551120';

$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die('Koneksi gagal!' . mysqli_connect_error());
}

//function membaca data di databse
function read($query) {

    global $conn; 

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function update($update) {
    global $conn;

    $id = $update["id"];
    $nama_mhs = mysqli_real_escape_string($conn, $update["nama"]);
    $tgl_lahir = mysqli_real_escape_string($conn, $update["lahir"]);
    $alamat = mysqli_real_escape_string($conn, $update["alamat"]);
    $agama = mysqli_real_escape_string($conn, $update["agama"]);
    $universitas = mysqli_real_escape_string($conn, $update["univ"]);
    $fakultas = mysqli_real_escape_string($conn, $update["fakultas"]);
    $prodi = mysqli_real_escape_string($conn, $update["prodi"]);
    $nim = mysqli_real_escape_string($conn, $update["nim"]);

    $query = "UPDATE tb_datadiri SET
        nama_mhs = '$nama_mhs',
        tgl_lahir = '$tgl_lahir',
        alamat = '$alamat',
        agama = '$agama',
        universitas = '$universitas',
        fakultas = '$fakultas',
        prodi = '$prodi',
        nim = '$nim'
        WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteUser($id) {
    global $conn;

    $query = "DELETE FROM tb_datadiri WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
        return -1; // Mengembalikan nilai negatif untuk menunjukkan adanya kesalahan
    }
}


?>
