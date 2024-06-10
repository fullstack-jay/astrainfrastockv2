<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
etc(); encryption(); session(); connect();

require 'vendor/autoload.php'; // Pastikan PhpSpreadsheet sudah terinstal via Composer

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_FILES['file']['name'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowedType = ['xls', 'xlsx'];

    if (in_array($fileExtension, $allowedType)) {
        $spreadsheet = IOFactory::load($fileTmpName);
        $data = $spreadsheet->getActiveSheet()->toArray();

        // Skip header row
        $isHeader = true;
        foreach ($data as $row) {
            // Cek jika baris adalah header, lanjutkan ke baris berikutnya
            if ($isHeader) {
                $isHeader = false;
                continue;
            }

            // Validasi apakah baris memiliki data yang valid (misalnya, kolom 1 dan 2 tidak kosong)
            if (empty($row[1]) || empty($row[2])) {
                continue;
            }

            // Sesuaikan indeks kolom dengan struktur tabel di database, abaikan kolom "No"
            $kategori = mysqli_real_escape_string($conn, $row[1]);
            $kode_aset = mysqli_real_escape_string($conn, $row[2]);
            $nama_aset = mysqli_real_escape_string($conn, $row[3]);
            $merk = mysqli_real_escape_string($conn, $row[4]);
            $jenis = mysqli_real_escape_string($conn, $row[5]);
            $stok = mysqli_real_escape_string($conn, $row[6]);
            $minimal_stok = mysqli_real_escape_string($conn, $row[7]);
            $sisa_spare = mysqli_real_escape_string($conn, $row[8]);
            $keterangan = mysqli_real_escape_string($conn, $row[9]);

            // Cek apakah SKU dan kategori sudah ada di database
            $checkQuery = "SELECT COUNT(*) AS count FROM barang WHERE sku='$kode_aset' AND kategori='$kategori'";
            $checkResult = mysqli_query($conn, $checkQuery);
            $checkRow = mysqli_fetch_assoc($checkResult);

            if ($checkRow['count'] > 0) {
                // Jika SKU dan kategori sudah ada, update data
                $query = "UPDATE barang SET
                            nama='$nama_aset',
                            brand='$merk',
                            jenis='$jenis',
                            sisa='$sisa_spare',
                            stokmin='$minimal_stok',
                            keterangan='$keterangan'
                          WHERE sku='$kode_aset' AND kategori='$kategori'";
            } else {
                // Jika SKU dan kategori belum ada, masukkan data baru
                $query = "INSERT INTO barang (kategori, sku, nama, brand, jenis, sisa, stokmin, keterangan) VALUES ('$kategori', '$kode_aset', '$nama_aset', '$merk', '$jenis', '$sisa_spare', '$minimal_stok', '$keterangan')";
            }

            mysqli_query($conn, $query);
        }
        // Redirect ke halaman tabel setelah import berhasil
        header("Location: barang_ws.php");
        exit();
    } else {
        echo "Hanya file Excel yang diizinkan.";
    }
} else {
    echo "File tidak ditemukan.";
}
?>
