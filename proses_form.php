<?php
include 'config/koneksi.php';

if (isset($_POST['input'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $q_input = "INSERT INTO tb_mahasiswa VALUES ('$nim', '$nama', '$alamat', '$jk', '$jurusan', '$email')";

    $sql = mysqli_query($conn, $q_input);

    if (!$sql) {
        echo "<script type='text/javascript'>alert('Data gagal disimpan!');</script>" . mysqli_error($conn);
    }
}

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $q_edit = "UPDATE tb_mahasiswa SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jk', jurusan = '$jurusan', email='$email' WHERE nim = '$nim'";

    $exec = mysqli_query($conn, $q_edit);
    if (!$exec) {
        echo "<script type='text/javascript'>alert('Data gagal diedit!');</script>" . mysqli_error($conn);
    }
}

if (isset($_POST['hapus'])) {
    $nim = $_POST['nim'];
    $q_hapus = "DELETE FROM tb_mahasiswa WHERE nim = '$nim'";
    $ex_hapus = mysqli_query($conn, $q_hapus);
    if (!$ex_hapus) {
        echo "<script type='text/javascript'>alert('Data gagal dihapus!');</script>" . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="cardcol-12 m-auto mt-5 w-75 shadow p-3 bg-body rounded" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Tabel Mahasiswa</h5>
                <table class="mt-3 table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $q_select = "SELECT * FROM tb_mahasiswa";
                        $result = mysqli_query($conn, $q_select);

                        foreach ($result as $data) {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $data['nim'] ?>
                                </th>
                                <td>
                                    <?php echo $data['nama'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" name="input" data-bs-toggle="modal"
                                        data-bs-target="#detailModal<?php echo $data['nim'] ?>">Details</button>
                                    <button type="button" class="btn btn-warning" name="input" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?php echo $data['nim'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger" name="input" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal<?php echo $data['nim'] ?>">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="detailModal<?php echo $data['nim'] ?>" tabindex="-1"
                                aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="detailModalLabel">Detail Mahasiswa</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">NIM</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    value="<?php echo $data['nim'] ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    value="<?php echo $data['nama'] ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Alamat</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    value="<?php echo $data['alamat'] ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    value="<?php echo $data['jenis_kelamin'] ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Jurusan</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    value="<?php echo $data['jurusan'] ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Email</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    value="<?php echo $data['email'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editModal<?php echo $data['nim'] ?>" tabindex="-1"
                                aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Mahasiswa</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form onsubmit="return validateForm()" method="post" action="">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nim" class="form-label">NIM</label>
                                                    <input type="text" class="form-control" id="nim" name="nim"
                                                        value="<?php echo $data['nim'] ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        aria-describedby="emailHelp" name="nama"
                                                        value="<?php echo $data['nama'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat"
                                                        aria-describedby="emailHelp" name="alamat"
                                                        value="<?php echo $data['alamat'] ?>">
                                                </div>
                                                Jenis Kelamin:
                                                <div class="mt-3 form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="jenis_laki" value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') {
                                                            echo 'checked';
                                                        } ?>>
                                                    <label class="form-check-label" for="jenis_laki">
                                                        Laki - Laki
                                                    </label>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="jenis_perempuan" value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') {
                                                            echo 'checked';
                                                        } ?>>
                                                    <label class="form-check-label" for="jenis_perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                                <label for="jurusan" class="form-label">Jurusan</label>
                                                <select class="mb-3 form-select" id="jurusan" name="jurusan">
                                                    <option selected hidden>
                                                        <?php echo $data['jurusan'] ?>
                                                    </option>
                                                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                                    <option value="Teknik Industri">Teknik Industri</option>
                                                    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                                </select>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="" class="form-control" id="email"
                                                        aria-describedby="emailHelp" name="email"
                                                        value="<?php echo $data['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapusModal<?php echo $data['nim'] ?>" tabindex="-1"
                                aria-labelledby="hapusModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="hapusModalLabel">PERHATIAN!!!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                                <h3>Yakin ingin hapus data
                                                    <?php echo $data['nim'] ?>?
                                                </h3>
                                                <input type="hidden" value="<?php echo $data['nim'] ?>" name="nim">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="form.php" class="card-link mt-3 btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="config/validateForm.js"></script>
</body>

</html>
