<?php
include 'config.php';

if (isset($_POST['uploadBtn'])) {

    $jumlahFile = count($_FILES['file']['name']);

    for ($i = 0; $i < $jumlahFile; $i++) {
        $namaFile = $_FILES['file']['name'][$i];
        $ukuranFile = $_FILES['file']['size'][$i];
        $error = $_FILES['file']['error'][$i];
        $tmpName = $_FILES['file']['tmp_name'][$i];
        $tgl = date("Y-m-d");

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
            return false;
        }


        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 8000000) {
            echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/uploads/' . $namaFileBaru);

        $query = "INSERT INTO tbl_rdm VALUES ('','$namaFileBaru', '$tgl', '$ukuranFile')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                    alert('Gambar Berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Gambar gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        }
    }
}
