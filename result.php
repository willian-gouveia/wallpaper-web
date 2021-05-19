<?php
header("Content-Type: application/json");
include 'config.php';

$query = "SELECT * FROM tbl_rdm";

$result = mysqli_query($koneksi, $query) or die($koneksi->error);
$rows = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

        $data = [
            'status' => true,
            'developer' => 'Muhammad Mayuidn',
            'result' => $rows
        ];
    }
    echo json_encode($data);
}
