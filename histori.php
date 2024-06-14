<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="page/images/icons/astra.ico"/>
    <title>History Aset Transaksi</title>
    <!-- Include jsPDF, SheetJS, and html2canvas libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
etc();encryption();session();connect();head();body();timing();
pagination();

if (!login_check()) {
    echo '<meta http-equiv="refresh" content="0; url=logout" />';
    exit(0);
}

echo '<div class="wrapper">';
theader();
menu();

$decimal = "0";
$a_decimal = ",";
$thousand = ".";

echo '<div class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">';

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = "";
$dataapa = "Transaksi Aset";
$tabeldatabase = "transaksiaset";
$chmod = $chmenu4;
$forward = mysqli_real_escape_string($conn, $tabeldatabase);
$forwardpage = mysqli_real_escape_string($conn, $halaman);
$search = $_POST['search'];

$query = "SELECT * FROM $tabeldatabase";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Gagal menjalankan query: " . mysqli_error($conn);
    exit;
}

echo '<ol class="breadcrumb">
        <li><a href="' . $_SESSION['baseurl'] . '">Dashboard</a></li>
        <li><a href="' . $halaman . '">' . $dataapa . '</a></li>
      </ol>';

if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'user' || $_SESSION['jabatan'] == 'pic') {
    $sqla = "SELECT no, COUNT(*) AS totaldata FROM $forward";
    $hasila = mysqli_query($conn, $sqla);
    $rowa = mysqli_fetch_assoc($hasila);
    $totaldata = $rowa['totaldata'];

    echo '<div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="glyphicon glyphicon-th"></i> ' . $dataapa . ' <span class="label label-default">' . $totaldata . '</span></h3>
            </div>
            <div class="box-body">
             <p>
    <button id="export-pdf" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Export PDF</button>
    <button id="export-excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Excel</button>
</p>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="example2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Brand</th>
                                <th>Jenis</th>
                                <th>Aset Masuk</th>
                                <th>Aset Keluar</th>
                                <th>Sisa Spare</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>';

$no_urut = 0;
while ($fill = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>' . ++$no_urut . '</td>
            <td>' . htmlspecialchars($fill['nama_lengkap']) . '</td>
            <td>' . htmlspecialchars($fill['nama_barang']) . '</td>
            <td>' . htmlspecialchars($fill['kategori']) . '</td>
            <td>' . htmlspecialchars($fill['brand']) . '</td>
            <td>' . htmlspecialchars($fill['jenis']) . '</td>
            <td>' . htmlspecialchars(number_format($fill['asetmasuk'], $decimal, $a_decimal, $thousand)) . '</td>
            <td>' . htmlspecialchars(number_format($fill['asetkeluar'], $decimal, $a_decimal, $thousand)) . '</td>
            <td>' . htmlspecialchars(number_format($fill['sisa'], $decimal, $a_decimal, $thousand)) . '</td>
            <td>' . htmlspecialchars($fill['timestamp']) . '</td>
        </tr>';
}

echo '              </tbody>
                    </table>
                </div>
            </div>
        </div>';
} else {
    echo '<div class="callout callout-danger">
            <h4>Info</h4>
            <b>Hanya user tertentu yang dapat mengakses halaman ' . $dataapa . ' ini.</b>
          </div>';
}

echo '  </div>
        <div class="control-sidebar-bg"></div>
      </div>';

footer();

?>

<!-- Letakkan di bagian bawah halaman sebelum tag </body> -->
<script>
    function getFormattedDate() {
        const date = new Date();
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }

    document.getElementById('export-pdf').addEventListener('click', function() {
        html2canvas(document.querySelector("#example2")).then(canvas => {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('p', 'pt', 'a4');
            const imgData = canvas.toDataURL('image/png');

            // Calculate the width and height of the image in the PDF
            const imgWidth = 595.28;
            const pageHeight = 841.89;
            const imgHeight = canvas.height * imgWidth / canvas.width;
            let heightLeft = imgHeight;

            let position = 0;

            // Add the image to the PDF
            doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            // Add new pages if the content is taller than a single page
            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }

            const fileName = `Transaksi Stok Aset ${getFormattedDate()}.pdf`;
            doc.save(fileName);
        });
    });

    document.getElementById('export-excel').addEventListener('click', function() {
        const table = document.querySelector("#example2");
        const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet JS" });
        const fileName = `Transaksi Stok Aset ${getFormattedDate()}.xlsx`;
        XLSX.writeFile(wb, fileName);
    });
</script>

<!-- Include necessary JS files -->
<script src="dist/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="dist/plugins/jQuery/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<script src="dist/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="dist/plugins/morris/morris.min.js"></script>
<script src="dist/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="dist/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="dist/plugins/daterangepicker/daterangepicker.js"></script>
<script src="dist/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/plugins/fastclick/fastclick.js"></script>
<script src="dist/plugins/select2/select2.full.min.js"></script>
<script src="dist/plugins/input-mask/jquery.inputmask.js"></script>
<script src="dist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="dist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="dist/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="dist/plugins/iCheck/icheck.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(function () {
        $("#DataTable").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
</body>
</html>
