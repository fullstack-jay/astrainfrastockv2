<?php
require 'vendor/autoload.php';
include "configuration/config_include.php";
connect();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Kategori');
$sheet->setCellValue('C1', 'Kode Aset');
$sheet->setCellValue('D1', 'Nama Aset');
$sheet->setCellValue('E1', 'Merek');
$sheet->setCellValue('F1', 'Jenis');
$sheet->setCellValue('G1', 'Sisa Spare');
$sheet->setCellValue('H1', 'Minimal Stok');
$sheet->setCellValue('I1', 'Keterangan');

$sql = "SELECT * FROM barang WHERE kategori LIKE 'ME%' ORDER BY no";
$result = mysqli_query($conn, $sql);
$rowNumber = 2;
$no_urut = 0;
while ($fill = mysqli_fetch_assoc($result)) {
    $no_urut++;
    $sheet->setCellValue('A' . $rowNumber, $no_urut);
    $sheet->setCellValue('B' . $rowNumber, htmlspecialchars($fill['kategori']));
    $sheet->setCellValue('C' . $rowNumber, htmlspecialchars($fill['sku']));
    $sheet->setCellValue('D' . $rowNumber, htmlspecialchars($fill['nama']));
    $sheet->setCellValue('E' . $rowNumber, htmlspecialchars($fill['brand']));
    $sheet->setCellValue('F' . $rowNumber, htmlspecialchars($fill['jenis']));
    $sheet->setCellValue('G' . $rowNumber, htmlspecialchars($fill['sisa']));
    $sheet->setCellValue('H' . $rowNumber, htmlspecialchars($fill['stokmin']));
    $sheet->setCellValue('I' . $rowNumber, htmlspecialchars($fill['keterangan']));
    $rowNumber++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'Aset_ME_' . date('d-m-Y') . '.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. $filename .'"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
?>
