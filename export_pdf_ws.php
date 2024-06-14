<?php
require 'vendor/tecnickcom/tcpdf/tcpdf.php';
include "configuration/config_include.php";
connect();

$pdf = new TCPDF();
$pdf->AddPage();

$html = '<h1>Data Aset Workshop</h1>';
$html .= '<table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Kode Aset</th>
                    <th>Nama Aset</th>
                    <th>Merek</th>
                    <th>Jenis</th>
                    <th>Sisa Spare</th>
                    <th>Minimal Stok</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>';

$sql = "SELECT * FROM barang WHERE kategori LIKE 'WS%' ORDER BY no";
$result = mysqli_query($conn, $sql);
$no_urut = 0;
while ($fill = mysqli_fetch_assoc($result)) {
    $no_urut++;
    $html .= '<tr>
                <td>'.$no_urut.'</td>
                <td>'.htmlspecialchars($fill['kategori']).'</td>
                <td>'.htmlspecialchars($fill['sku']).'</td>
                <td>'.htmlspecialchars($fill['nama']).'</td>
                <td>'.htmlspecialchars($fill['brand']).'</td>
                <td>'.htmlspecialchars($fill['jenis']).'</td>
                <td>'.htmlspecialchars($fill['sisa']).'</td>
                <td>'.htmlspecialchars($fill['stokmin']).'</td>
                <td>'.htmlspecialchars($fill['keterangan']).'</td>
            </tr>';
}

$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

$filename = 'Aset_WS_' . date('d-m-Y') . '.pdf';
$pdf->Output($filename, 'D');
?>
