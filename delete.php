<?php

    require 'koneksi.php';

    $id = $_GET["id"];

    if (deleteUser($id) > 0) {
        echo "
            <script>
                alert('User Successfuly Deleted !!!');
                document.location.href='tampilan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed !!!');
            </script>
        ";
    }

?>
