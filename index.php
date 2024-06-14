<!DOCTYPE html>
<html>
    <head> 

    <style> 
/* Tambahkan di dalam file CSS Anda atau di dalam tag <style> di <head> */
.glow-card-link {
    text-decoration: none;
}

.glow-card {
    position: relative;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 2px;
}

.glow-card.bg-aqua:hover {
    box-shadow: 0 0 30px rgba(0, 255, 255, 0.7);
}

.glow-card.bg-yellow:hover {
    box-shadow: 0 0 30px rgba(255, 255, 0, 0.7);
}

.glow-card.bg-green:hover {
    box-shadow: 0 0 30px rgba(0, 255, 0, 0.7);
}


.glow-card:after {
    content: "\f0a6"; /* Icon tangan dari FontAwesome */
    font-family: FontAwesome;
    position: absolute;
    bottom: -10px;
    right: -10px;
    font-size: 80px;
    color: rgba(255, 255, 255, 0.2);
    transition: all 0.3s;
}

.glow-card:hover:after {
    bottom: 10px;
    right: 10px;
    color: rgba(255, 255, 255, 0.5);
}

.glow-card .inner {
    padding: 20px;
}

.glow-card .icon {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 50px;
    color: white; /* Sesuaikan warna icon sesuai kebutuhan */
}


    </style>
    </head>
    <link rel="icon" type="image/png" href="page/images/icons/astra.ico"/>
     <link rel="stylesheet" href="page/css/loading.css">
<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
include "configuration/config_alltotal.php";
etc();encryption();session();connect();head();body();timing();
//alltotal();
pagination();
?>

<?php
if (!login_check()) {
?>
<meta http-equiv="refresh" content="0; url=logout" />
<?php
exit(0);
}
?>
<div class="wrapper">
<?php
theader();
menu();
?>

<?php
$decimal ="0";
$a_decimal =",";
$thousand =".";
?>
            <div class="content-wrapper">
                <section class="content-header">
</section>
                <section class="content">
                    <div class="row">
                         <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <a href="barang_me.php" class="glow-card-link">
        <div class="small-box bg-aqua glow-card">
            <div class="inner">
                <h3><sup style="font-size: 20px"></sup><?php echo number_format($datame, $decimal, $a_decimal, $thousand).' '; ?>Pcs</h3>
                <p>Total Stok Aset ME</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </a>
</div>

                                   <!-- ./col -->
                                   <div class="col-lg-3 col-xs-6">
                                     <a href="barang_it.php" class="glow-card-link"> 
                                       <!-- small box -->
                                       <div class="small-box bg-yellow glow-card">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px"></sup><?php echo number_format($datait, $decimal, $a_decimal, $thousand).' '; ?>Pcs</h3>
                                               <p>Total Stok Aset IT</p>
                                           </div>
                                           <div class="icon">
                                              <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
</a>
                                   </div>
                                   <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <a href="barang_ws.php"  class="glow-card-link"> 
                                       <!-- small box -->
                                       <div class="small-box bg-green glow-card">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px"></sup><?php echo number_format($dataws, $decimal, $a_decimal, $thousand).' '; ?>Pcs</h3>
                                               <p>Total Stok Aset WS</p>
                                           </div>
                                           <div class="icon">
                                               <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   </a>
                                   <!-- ./col -->
                  </div>
<!-- SETTING START-->

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = ""; // halaman
$dataapa = "Dashboard"; // data
$tabeldatabase = "barang"; // tabel database
$chmod = $chmenu4; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
$search = $_POST['search'];

$query = "SELECT * FROM $tabeldatabase WHERE nama LIKE '%$search%'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Gagal menjalankan query: " . mysqli_error($conn);
    exit;
}

?>

<!-- SETTING STOP -->
<?php
$decimal ="0";
$a_decimal =",";
$thousand =".";
?>

<!-- BREADCRUMB -->

<ol class="breadcrumb ">
<li><a href="<?php echo $_SESSION['baseurl']; ?>">Dashboard </a></li>
</ol>

<!-- BREADCRUMB -->

<!-- BOX HAPUS BERHASIL -->

         <script>
 window.setTimeout(function() {
    $("#myAlert").fadeTo(500, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 5000);
</script>

   <div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
</div>

     <script>
function confirmDeletion(no) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Tampilkan overlay loading
            document.getElementById('loadingOverlay').style.display = 'flex';

            // Lakukan penghapusan data
            setTimeout(() => {
                window.location.href = `component/delete/delete_master?no=${no}&forward=<?php echo $forward; ?>&forwardpage=barang_it&chmod=<?php echo $chmod; ?>`;
                // Sembunyikan overlay loading
                document.getElementById('loadingOverlay').style.display = 'none';
            }, 2000); // Delay 2 detik sebelum redirect
        }
    });
}
</script>

                           
       <!-- BOX INFORMASI -->
    <?php
if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'user'  || $_SESSION['jabatan'] == 'pic') {?>





<?php

        $sqla="SELECT no, COUNT( * ) AS totaldata FROM $forward";
        $hasila=mysqli_query($conn,$sqla);
        $rowa=mysqli_fetch_assoc($hasila);
        $totaldata=$rowa['totaldata'];

?>
                           <div class="box">
            <div class="box-header">
                <?php
    // Query untuk menghitung total data dengan kategori yang diawali 'IT'
    $sqla = "SELECT COUNT(*) AS totaldata FROM $forward WHERE kategori LIKE 'IT%'";
    $hasila = mysqli_query($conn, $sqla);
    $rowa = mysqli_fetch_assoc($hasila);
    $totaldata = $rowa['totaldata'];
?>
            <h3 class="box-title"><i class="glyphicon glyphicon-th"></i> <?php echo $dataapa ?>  <span class="label label-default"><?php echo $totaldata; ?></span>
                    </h3> 

    </div>



<div class="box-body">


   <script>
        document.getElementById('importBtn').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            document.getElementById('importForm').submit();
        });
    </script>
<br>
       

      <script>
// Ambil elemen tabel
var table = document.getElementById('example2');

// Hapus semua baris kecuali header
while (table.rows.length > 1) {
    table.deleteRow(1);
}

// Tambahkan data baru ke dalam tabel
data.forEach(function(rowData) {
    var row = table.insertRow();
    rowData.forEach(function(cellData) {
        var cell = row.insertCell();
        cell.textContent = cellData;
    });
});
</script>
                                <!-- /.box-header -->
                                  <!-- /.Paginasi -->
                            <div class="table-responsive">
                                       <table class="table table-bordered table-hover" id="example2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width:10px">No</th>
                                                <th style="width:10%">Kategori</th>
                                                <th>Kode Aset</th>
                                                <th>Nama Aset </th>
                                                <th>Merek</th>
                                                <th>Jenis</th>
                                                <th>Sisa Spare </th>
                                                <th>Minimal Stok </th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                      <tbody>



<?php 
$no_urut="0";
while($fill=mysqli_fetch_assoc($result)) {
?>

                        <tr>
                      <td><?php echo ++$no_urut;?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['kategori']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['sku']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['nama']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['brand']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['jenis']); ?></td>
             <td><?php  echo mysqli_real_escape_string($conn, number_format($fill['sisa'], $decimal, $a_decimal, $thousand).''); ?></td>
             <td><?php  echo mysqli_real_escape_string($conn, number_format($fill['stokmin'], $decimal, $a_decimal, $thousand).''); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['keterangan']); ?></td>
          </tr>
           
   <?php     }       ?>
                  </tbody></table>
                 
                                  

                               </div>
                                <!-- /.box-body -->
                            </div>

                          
                        </div>

<?php } else {?>
   <div class="callout callout-danger">
    <h4>Info</h4>
    <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa;?> ini .</b>
    </div>
    <?php } ?>
                 


                        <!-- ./col -->
      
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                    </div>
                    <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
           <?php footer();?>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
  
        <!-- Letakkan di bagian bawah halaman sebelum tag </body> -->


<script src="dist/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="dist/plugins/jQuery/jquery-ui.min.js"></script>

        <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
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
