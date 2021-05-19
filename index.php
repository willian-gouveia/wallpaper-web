<?php
include('config.php');

$sql = 'SELECT * FROM tbl_rdm ORDER BY id DESC';

$query = mysqli_query($koneksi, $sql) or die($koneksi->error);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDM Wallpaper</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-primary shadow-sm">
        <div class="container">
            <span class="navbar-brand mb-0 h1">RDM Wallpaper</span>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <h1>Pilih Gambar</h1>
                    <input class="form-control mb-2" accept="image/*" name="file[]" type="file" id="formFile" multiple>
                    <button type="submit" class="btn btn-primary" name="uploadBtn">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <?php while ($row = mysqli_fetch_array($query)) { ?>
                <div class="col-md-4 text-center mb-2">

                    <div class="card" style="width: 18rem;">

                        <img src="assets/uploads/<?= $row['nama']; ?>" class="card-img-top" height="300" alt="">

                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama']; ?></h5>
                            <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                            <a href="https://ghodelweb.000webhostapp.com/assets/uploads/<?= $row['nama']; ?>" target="_blank">See</a>
                        </div>

                    </div>

                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="js/scripts.js"></script>
</body>

</html>