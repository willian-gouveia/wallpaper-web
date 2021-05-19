<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getId = mysqli_query($koneksi, "SELECT * FROM tbl_rdm WHERE id ='$id'");
    $row = mysqli_fetch_assoc($getId);

    $namaFile = $row['nama'];


    if ($getId) {
        $dirPath = dirname(__FILE__) . "/assets/uploads/" . $namaFile;

        if (file_exists($dirPath)) {
            unlink($dirPath);
            $getIdDB = $row['id'];
            $delete = "DELETE FROM tbl_rdm WHERE id ='$getIdDB'";
            $result = mysqli_query($koneksi, $delete);
            echo "<script>
                    alert('Gambar berhasil dihapus!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                alert('Gambar gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}
