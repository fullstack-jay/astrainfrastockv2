<!DOCTYPE html>
<html>
    <link rel="icon" type="image/png" href="page/images/icons/astra.ico"/>
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
                                       <div class="small-box bg-aqua">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px"></sup><?php echo number_format($datame, $decimal, $a_decimal, $thousand).' '; ?>Pcs</h3>
                                               <p>Total Stok Aset ME</p>
                                           </div>
                                           <div class="icon">
                                             <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   <!-- ./col -->
                                   <div class="col-lg-3 col-xs-6">
                                       <!-- small box -->
                                       <div class="small-box bg-yellow">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px"></sup><?php echo number_format($datait, $decimal, $a_decimal, $thousand).' '; ?>Pcs</h3>
                                               <p>Total Stok Aset IT</p>
                                           </div>
                                           <div class="icon">
                                              <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                                       <!-- small box -->
                                       <div class="small-box bg-green">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px"></sup><?php echo number_format($dataws, $decimal, $a_decimal, $thousand).' '; ?>Pcs</h3>
                                               <p>Total Stok Aset WS</p>
                                           </div>
                                           <div class="icon">
                                               <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   <!-- ./col -->
                  </div>
                    <div class="row">
            <div class="col-lg-12">

<!-- SETTING START-->

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = "stok_barang"; // halaman
$dataapa = "Stok Barang"; // data
$tabeldatabase = "barang"; // tabel database
$chmod = $chmenu8; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
$search = $_POST['search'];

?>


<!-- BREADCRUMB -->

<ol class="breadcrumb ">
<li><a href="<?php echo $_SESSION['baseurl']; ?>">Dashboard </a></li>
<li><a href="<?php echo $halaman;?>"><?php echo $dataapa ?></a></li>

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

                            <?php
$hapusberhasil = $_POST['hapusberhasil'];

if ($hapusberhasil == 1) {
?>
    <div id="myAlert"  class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> <?php echo $dataapa;?> telah berhasil dihapus dari Data <?php echo $dataapa;?>.
</div>

<!-- BOX HAPUS BERHASIL -->
<?php
} elseif ($hapusberhasil == 2) {
?>
           <div id="myAlert" class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal!</strong> <?php echo $dataapa;?> tidak bisa dihapus dari Data <?php echo $dataapa;?> karena telah melakukan transaksi sebelumnya, gunakan menu update untuk merubah informasi <?php echo $dataapa;?> .
</div>
<?php
} elseif ($hapusberhasil == 3) {
?>
           <div id="myAlert" class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal!</strong> Hanya user tertentu yang dapat mengupdate Data <?php echo $dataapa;?> .
</div>
<?php
}

?>
       <!-- BOX INFORMASI -->
    <?php
if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin') {
} else {
?>
   <div class="callout callout-danger">
    <h4>Info</h4>
    <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa;?> ini .</b>
    </div>
    <?php
}
?>



<?php

        $sqla="SELECT no, COUNT( * ) AS totaldata FROM $forward";
    $hasila=mysqli_query($conn,$sqla);
    $rowa=mysqli_fetch_assoc($hasila);
    $totaldata=$rowa['totaldata'];

?>
                           <div class="box" id="tabel1">
            <div class="box-header">
            <h3 class="box-title">Data <?php echo $dataapa ?>  <span class="no-print label label-default" id="no-print"><?php echo $totaldata; ?></span>
                <a href="stok_barang?min=true" class="btn btn-sm bg-orange"> Stok Minimal</a>
          </h3>

           <div class="no-print" id="no-print" >
     
</div>

            </div>

                                <!-- /.box-header -->
                                  <!-- /.Paginasi -->
                              
                            <div class="box-body table-responsive">
                                   <table id="example3" class="table table-bordered" style="font-size:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:10px">No</th>
                                                <th>SKU</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Aset Keluar</th>
                                                <th>Aset Masuk</th>
                                                <th>Batas minimal</th>
                                                <th>Sisa Stok</th>
                                            </tr>
                                        </thead>


                                        <tbody>

        <?php  
        if($_GET['min'] && $_GET['min']=='true'){
         $sql = mysqli_query($conn,"SELECT * FROM barang WHERE sisa <= stokmin ORDER BY no"); 
     } else {
         $sql = mysqli_query($conn,"SELECT * FROM barang ORDER BY no"); 
     }
            

             $no_urut="0";
                while($fill=mysqli_fetch_assoc($sql)){?>
        

  <tr>
            <td><?php echo ++$no_urut;?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['sku']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['nama']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['kategori']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, number_format($fill['terjual'], $decimal, $a_decimal, $thousand).''); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, number_format($fill['terbeli'], $decimal, $a_decimal, $thousand).''); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['stokmin']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, number_format($fill['sisa'], $decimal, $a_decimal, $thousand).''); ?></td>
          
            </tr>

<?php } ?>
                                        </tbody>
                                        
                    </table>
          

                               </div>
                                <!-- /.box-body -->
                            </div>

            
                        </div>
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


    <script type="text/javascript" src="dist/plugins/datatables/add/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="dist/plugins/datatables/add/jszip.min.js"></script>
<script type="text/javascript" src="dist/plugins/datatables/add/pdfmake.min.js"></script>
<script type="text/javascript" src="dist/plugins/datatables/add/vfs_fonts.js"></script>
<script type="text/javascript" src="dist/plugins/datatables/add/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
   

    $('#example3').DataTable( {
        "paging": true,
      "lengthChange": true,
      "searching": true,
       "pageLength": 25,
      "ordering": true,
      "info": true,
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', className: 'btn-primary' },
      { extend: 'excel', className: 'btn-primary' },
    
            { extend: 'pdf', orientation:'landscape', className: 'btn-primary', customize: function(doc) {
    doc.content[1].table.widths =Array(doc.content[1].table.body[0].length + 1).join('*').split('');
    doc.defaultStyle.alignment = 'center';
    doc.styles.tableHeader.alignment = 'center';
}, }
        ]
    } );



  });
</script>


    </body>
</html>
