<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tampilan Data</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <!-- Tabel untuk menampilkan data -->
                <table class="table text-center">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Nama</th>
                            <th scope="col">Universitas</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <?php
                        require 'koneksi.php';
                        
                        $sql = "SELECT * FROM tb_datadiri";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["nama_mhs"] . "</td>";
                                echo "<td>" . $row["universitas"] . "</td>";
                                echo "<td>" . $row["fakultas"] . "</td>";
                                echo "<td>" . $row["prodi"] . "</td>";
                                echo "<td>" . $row["nim"] . "</td>";
                                echo "<td>";
                                echo "<a href='detail2.php?id=" . $row["id"] . "' class='btn btn-info btn-sm'>Detail</a> ";
                                echo "<a href='update.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                                echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                                
                            }

                        
                        } else {
                            echo "Tidak ada data yang ditemukan.";
                        }

                        // Tutup koneksi
                        $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
