<?php
// Koneksi ke database
include "configuration/config_etc.php";
include "configuration/config_include.php";
etc();encryption();session();connect();head();body();timing();

$date = $_POST['date'];

// Query untuk mencari data berdasarkan timestamp
$query = "SELECT * FROM transaksiaset WHERE DATE(timestamp) = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;     
}

// Mengembalikan data sebagai JSON
echo json_encode($data);

?>