<?php 

    require 'koneksi.php';

    $id = $_GET["id"];

    $query = read("SELECT * FROM tb_datadiri WHERE id = $id") [0];

    if (isset($_POST["submit"])) {
        if (update($_POST) > 0) {
            echo "
                <script>
                    alert('berhasil di update');
                    document.location.href = 'tampilan.php';
                </script>
            ";
        } else {
            echo "
            <script>
                alert('gagal di update');
            </script>
            ";
        }
    }


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update Data</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <form name="form" method="POST" action="" onsubmit="return validateForm();">
                    <!-- action attribute now points to "proses.php" to handle form submission -->
                    <input type="hidden" name="id" value="<?=$query['id']?>">
                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2">Form Biodata</legend>


                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?=$query['nama_mhs']?>">
                        </div>

                        <div class="mb-3">
                            <label for="lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="lahir" class="form-control" id="lahir" value="<?=$query['tgl_lahir']?>">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="4"><?=$query['alamat']?></textarea>
                        </div>


                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value=""></option>
                                <option value="Hindu" <?php if ($query['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                <option value="Islam" <?php if ($query['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                                <option value="Kristen Katolik" <?php if ($query['agama'] == 'Kristen Katolik') echo 'selected'; ?>>Kristen Katolik</option>
                                <option value="Kristen Protestan" <?php if ($query['agama'] == 'Kristen Protestan') echo 'selected'; ?>>Kristen Protestan</option>
                                <option value="Budha" <?php if ($query['agama'] == 'Budha') echo 'selected'; ?>>Budha</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas</label>
                            <input type="text" name="univ" class="form-control" id="univ" value="<?=$query['universitas']?>">
                        </div>

                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <select name="fakultas" id="fakultas" class="form-control">
                                <option value=""></option>
                                <option value="teknik" <?php if ($query['fakultas'] == 'teknik') echo 'selected'; ?>>Teknik</option>
                                <option value="mipa" <?php if ($query['fakultas'] == 'mipa') echo 'selected'; ?>>Mipa</option>
                                <option value="kedokteran" <?php if ($query['fakultas'] == 'kedokteran') echo 'selected'; ?>>Kedokteran</option>
                                <option value="ekonomi" <?php if ($query['fakultas'] == 'ekonomi') echo 'selected'; ?>>Ekonomi Bisnis</option>
                                <option value="pariwisata" <?php if ($query['fakultas'] == 'pariwisata') echo 'selected'; ?>>Pariwisata</option>
                                <option value="peternakan" <?php if ($query['fakultas'] == 'peternakan') echo 'selected'; ?>>Peternakan</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="prodi" class="form-label">Program Studi</label>
                            <select name="prodi" id="prodi" class="form-control">
                                <option value=""></option>
                                <option value="TI" <?php if ($query['prodi'] == 'TI') echo 'selected'; ?>>Teknologi Informasi</option>
                                <option value="elektro" <?php if ($query['prodi'] == 'elektro') echo 'selected'; ?>>Elektro</option>
                                <option value="sipil" <?php if ($query['prodi'] == 'sipil') echo 'selected'; ?>>Teknik Sipil</option>
                                <option value="arsitektur" <?php if ($query['prodi'] == 'arsitektur') echo 'selected'; ?>>Teknik Arsitektur</option>
                                <option value="lingkungan" <?php if ($query['prodi'] == 'lingkungan') echo 'selected'; ?>>Teknik Lingkungan</option>
                                <option value="mesin" <?php if ($query['prodi'] == 'mesin') echo 'selected'; ?>>Teknik Mesin</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim" value="<?=$query['nim']?>">
                        </div>
                        <a class="btn btn-outline-success" href="tampilan.php" role="button">back</a>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var nama = document.getElementById("nama").value;
            var tahunLahir = document.getElementById("lahir").value;
            var alamat = document.getElementById("alamat").value;
            var agama = document.getElementById("agama").value;
            var universitas = document.getElementById("univ").value;
            var fakultas = document.getElementById("fakultas").value;
            var prodi = document.getElementById("prodi").value;
            var nim = document.getElementById("nim").value;

            var namaRegex = /^[a-zA-Z\s]+$/;
            if (!nama.match(namaRegex)) {
                alert("Nama hanya boleh berisi huruf dan spasi.");
                return false;
            }

            if (tahunLahir === "") {
                alert("Tahun lahir kosong.");
                return false;
            }

            if (alamat.trim() === "") {
                alert("Alamat harus diisi.");
                return false;
            }

            if (agama === "") {
                alert("Pilih Agama.");
                return false;
            }

            if (universitas.trim() === "") {
                alert("Universitas harus diisi.");
                return false;
            }

            if (fakultas === "") {
                alert("Pilih Fakultas.");
                return false;
            }

            if (prodi === "") {
                alert("Pilih Program Studi.");
                return false;
            }

            if (nim.length !== 10 || isNaN(nim)) {
                alert("NIM harus terdiri dari 10 digit angka.");
                return false;
            }

            alert("Data anda berhasil disimpan.");
            return true;
        }
    </script>

</body>
</html>
