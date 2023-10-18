<?php 

    require 'koneksi.php';

    $id = $_GET["id"];

    $query = read("SELECT * FROM tb_datadiri WHERE id = $id");
    // var_dump($query);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Detail data</title>
  </head>
  <body>

    <?php foreach ($query as $data) {?>

       <div class = "container">
        <div class = "row">
            <div class = "col">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Universitas</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">NIM</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><?=$data["nama_mhs"]?></th>
                        <td><?=$data["tgl_lahir"]?></td>
                        <td><?=$data["alamat"]?></td>
                        <td><?=$data["agama"]?></td>
                        <td><?=$data["universitas"]?></td>
                        <td><?=$data["fakultas"]?></td>
                        <td><?=$data["prodi"]?></td>
                        <td>@<?=$data["nim"]?></td>
                        </tr>

                    </tbody>
                </table>
                <a class="btn btn-outline-success" href="tampilan.php" role="button">back</a>
            </div>
        </div>
       </div>

    <?php }?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

