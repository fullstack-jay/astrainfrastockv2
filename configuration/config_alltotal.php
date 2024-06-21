<?php
include 'config_connect.php';
date_default_timezone_set("Asia/Jakarta");
$harisekarang=date('d');
$bulansekarang=date('m');
$tahunsekarang=date('Y');

// Total Data1

$sqlx2="SELECT COUNT(userna_me) as data FROM user";
$hasilx2=mysqli_query($conn,$sqlx2);
$row=mysqli_fetch_assoc($hasilx2);
$datax1=$row['data'];


// Total Data4

$sqlx2="SELECT COUNT(kode) as data FROM barang";
$hasilx2=mysqli_query($conn,$sqlx2);
$row=mysqli_fetch_assoc($hasilx2);
$datax4=$row['data'];

  // Data Stok
  $sqlx2="SELECT SUM(sisa) AS data FROM barang";
  $hasilx2=mysqli_query($conn,$sqlx2);
  $row=mysqli_fetch_assoc($hasilx2);
  $data15=$row['data'];

 // Data Stok dengan filter kategori yang diawali dengan IT
$prefixit = 'IT';
$sqlx2 = "SELECT SUM(sisa) AS data FROM barang WHERE kategori LIKE '$prefixit%'";
$hasilx2 = mysqli_query($conn, $sqlx2);
$row = mysqli_fetch_assoc($hasilx2);
$datait = $row['data'];

// Data Stok dengan filter kategori yang diawali dengan WS
$prefixws = 'WS';
$sqlx2 = "SELECT SUM(sisa) AS data FROM barang WHERE kategori LIKE '$prefixws%'";
$hasilx2 = mysqli_query($conn, $sqlx2);
$row = mysqli_fetch_assoc($hasilx2);
$dataws = $row['data'];

// Data Stok dengan filter kategori yang diawali dengan ME
$prefixme = 'ME';
$sqlx2 = "SELECT SUM(sisa) AS data FROM barang WHERE kategori LIKE '$prefixme%'";
$hasilx2 = mysqli_query($conn, $sqlx2);
$row = mysqli_fetch_assoc($hasilx2);
$datame = $row['data'];


?>
