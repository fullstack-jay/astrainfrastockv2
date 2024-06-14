<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
etc(); encryption(); session(); connect();

require 'vendor/autoload.php'; // Pastikan PhpSpreadsheet sudah terinstal via Composer

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

if (isset($_FILES['file']['name'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowedType = ['xls', 'xlsx'];

    if (in_array($fileExtension, $allowedType)) {
        $spreadsheet = IOFactory::load($fileTmpName);
        $worksheet = $spreadsheet->getActiveSheet();

        // Membaca semua data sebagai teks untuk mencegah hilangnya nol di depan
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            foreach ($cellIterator as $cell) {
                if ($cell->getColumn() == 'B' || $cell->getColumn() == 'C') { // Asumsikan kolom kode berada di kolom B dan kategori di kolom C
                    $cell->setDataType(DataType::TYPE_STRING);
                }
            }
        }

        $data = $worksheet->toArray(null, true, true, true);

        // Skip header row
        $isHeader = true;
        foreach ($data as $row) {
            // Cek jika baris adalah header, lanjutkan ke baris berikutnya
            if ($isHeader) {
                $isHeader = false;
                continue;
            }

            // Validasi apakah baris memiliki data yang valid (misalnya, kolom 1 dan 2 tidak kosong)
            if (empty($row['B']) || empty($row['C'])) {
                continue;
            }

            // Sesuaikan indeks kolom dengan struktur tabel di database, abaikan kolom "No"
            $kategori = mysqli_real_escape_string($conn, $row['B']);
            $kode = mysqli_real_escape_string($conn, $row['C']);
            $kode_aset = mysqli_real_escape_string($conn, $row['D']);
            $nama_aset = mysqli_real_escape_string($conn, $row['E']);
            $merk = mysqli_real_escape_string($conn, $row['F']);
            $jenis = mysqli_real_escape_string($conn, $row['G']);
            $stok = mysqli_real_escape_string($conn, $row['H']);
            $minimal_stok = mysqli_real_escape_string($conn, $row['I']);
            $sisa_spare = mysqli_real_escape_string($conn, $row['J']);
            $keterangan = mysqli_real_escape_string($conn, $row['K']);

            // Ambil username dari sesi yang sedang aktif
            $namalengkap = $_SESSION['nama'];

            // Cek apakah kode dan kategori sudah ada di database
            $checkQuery = "SELECT COUNT(*) AS count FROM barang WHERE kode='$kode' AND kategori='$kategori'";
            $checkResult = mysqli_query($conn, $checkQuery);
            $checkRow = mysqli_fetch_assoc($checkResult);

            if ($checkRow['count'] > 0) {
                // Jika kode dan kategori sudah ada, update data
                $query = "UPDATE barang SET
                            sku='$kode_aset',
                            nama='$nama_aset',
                            brand='$merk',
                            jenis='$jenis',
                            asetmasuk=asetmasuk+'$stok',
                            sisa='$sisa_spare',
                            stokmin='$minimal_stok',
                            keterangan='$keterangan',
                            nama_lengkap='$namalengkap'
                          WHERE kode='$kode' AND kategori='$kategori'";
            } else {
                // Jika kode dan kategori belum ada, masukkan data baru
                $query = "INSERT INTO barang (kode, kategori, sku, nama, brand, jenis, asetmasuk, sisa, stokmin, keterangan, nama_lengkap) VALUES ('$kode', '$kategori', '$kode_aset', '$nama_aset', '$merk', '$jenis', '$stok', '$sisa_spare', '$minimal_stok', '$keterangan', '$namalengkap')";
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
