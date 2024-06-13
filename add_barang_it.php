<!DOCTYPE html>
<html>
  <link rel="icon" type="image/png" href="page/images/icons/astra.ico"/>
<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
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
            <div class="content-wrapper">
                <section class="content-header">
</section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
            <div class="col-lg-12">
                        <!-- ./col -->

<!-- SETTING START-->

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = "it"; // halaman
$halamanutama = "barang_it"; // halaman
$dataapa = "Aset"; // data
$tabeldatabase = "barang"; // tabel database
$chmod = $chmenu4; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halamanutama); // halaman


function autoNumber(){
  include "configuration/config_connect.php"; // Pastikan koneksi database sesuai dengan konfigurasi Anda
  global $forward; // Asumsikan $forward berisi nama tabel
  
  // Query untuk mengambil kode terbesar dari tabel
  $query = "SELECT MAX(RIGHT(kode, 3)) as max_id FROM $forward";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_array($result);
  $id_max = $data['max_id'];
  
  // Jika tidak ada data, mulai dari 0
  if ($id_max == null) {
    $id_max = "000";
  }
  
  // Ambil angka terakhir dari kode tersebut
  $sort_num = (int) $id_max;
  
  // Tambahkan 1 pada angka terakhir
  $sort_num++;
  
  // Format kembali angka tersebut menjadi 3 digit karakter dengan leading zeros
  $new_code = sprintf("%03s", $sort_num);
  
  // Kembalikan kode baru
  return $new_code;
}


?>

<?php
// Misalkan Anda mendapatkan data barang dari database untuk di-update
$no = $_GET['no']; // asumsikan 'no' adalah parameter query yang menentukan barang yang akan di-update
$query_barang = "SELECT * FROM barang WHERE no = '$no'";
$result_barang = mysqli_query($conn, $query_barang);
$data_barang = mysqli_fetch_assoc($result_barang);
$kategori = $data_barang['kategori']; // asumsikan kolom 'kategori' menyimpan kode kategori
?>



<!-- SETTING STOP -->


<!-- BREADCRUMB -->

<ol class="breadcrumb ">
<li><a href="<?php echo $_SESSION['baseurl']; ?>">Dashboard </a></li>
<li><a href="<?php echo $halaman;?>"><?php echo $dataapa ?></a></li>
<?php

if ($search != null || $search != "") {
?>
 <li> <a href="<?php echo $halaman;?>">Data <?php echo $dataapa ?></a></li>
  <li class="active"><?php
    echo $search;
?></li>
  <?php
} else {
?>
 <li class="active">Data <?php echo $dataapa ?></li>
  <?php
}
?>
</ol>

<!-- BREADCRUMB -->

<!-- BOX INSERT BERHASIL -->

         <script>
 window.setTimeout(function() {
    $("#myAlert").fadeTo(500, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 5000);
</script>

<script>
function formatSKU(input) {
    let value = input.value.toUpperCase(); // Mengubah input menjadi huruf besar
    // Pastikan "IT-" selalu ada di awal
    if (!value.startsWith("IT-")) {
        value = "IT-" + value.replace(/[^A-Z0-9-]/ig, '').replace(/IT-/ig, '');
    }
    // Hapus semua karakter selain huruf besar, angka, dan tanda strip
    value = value.replace(/[^A-Z0-9-]/ig, '');

    // Format otomatis dengan tanda strip setelah "IT-" dan tiga karakter huruf berikutnya
    if (!/^IT-[A-Z]{3}-/.test(value)) {
        value = value.replace(/^(IT-[A-Z]{3})/ig, '$1-');
    }

    // Format otomatis dengan tanda strip setelah tiga karakter huruf dan tiga karakter angka
    if (!/^IT-[A-Z]{3}-[0-9]{3}$/.test(value)) {
        value = value.replace(/^(IT-[A-Z]{3}-[0-9]{3})/ig, '$1');
    }

    // Batasi panjang total karakter menjadi 10 untuk "IT-XXX-XXX"
    value = value.substring(0, 10);

    // Setelah format "IT-XXX-XXX" tercapai, tidak memperbolehkan karakter tambahan
    if (/^IT-[A-Z]{3}-[0-9]{3}$/.test(value)) {
        input.value = value;
    } else if (value.length < 10) {
        input.value = value; // Izinkan pengguna untuk terus mengetik sampai format terpenuhi
    }
}
</script>


       <!-- BOX INFORMASI -->
    <?php
if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') {
  ?>


  <!-- KONTEN BODY AWAL -->
                            <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Data <?php echo $dataapa;?></h3>
            </div>
                                <!-- /.box-header -->

                                <div class="box-body">
                <div class="table-responsive">
    <!----------------KONTEN------------------->
      <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $kode=$nama=$asetmasuk=$sisa=$keterangan=$kategori=$brand=$jenis="";
    $no = $_GET["no"];
    $insert = '1';



    if(($no != null || $no != "") && ($chmod >= 3 || $_SESSION['jabatan'] == 'admin')){

         $sql="select * from $tabeldatabase where no='$no'";
                  $hasil2 = mysqli_query($conn,$sql);


                  while ($fill = mysqli_fetch_assoc($hasil2)){


          $kode = $fill["kode"];
          $sku = $fill["sku"];
          $stokmin = $fill["stokmin"];
          $nama = $fill["nama"];
          $sisa = $fill["sisa"];
          $keterangan = $fill["keterangan"];
          $kategori = $fill["kategori"];
          $brand = $fill["brand"];
          $jenis = $fill["jenis"];
          $insert = '3';
    }
    }
    ?>
  <div id="main">
   <div class="container-fluid">

          <form class="form-horizontal" method="post" action="add_barang_<?php echo $halaman; ?>" id="Myform">
              <div class="box-body">


                  <?php  if($no == null || $no ==""){ ?>
  <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo autoNumber(); ?>" maxlength="10" required>
                          <?php }else{ ?>
                     <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo $kode; ?>"  maxlength="50" required readonly>
                  <?php } ?>


<div class="row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="sku" class="col-sm-3 control-label">Kode Aset:</label>
        <div class="col-sm-9">
            <?php if($no == null || $no == ""): ?>
                <input type="number" class="form-control" id="sku" name="sku" placeholder="Masukan Kode Aset" min="100" max="999" required>
            <?php else: ?>
                <input type="number" class="form-control" id="sku" name="sku" value="<?php echo $sku; ?>" required readonly>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.getElementById('sku').addEventListener('input', function(e) {
    if (this.value.length > 3) {
        this.value = this.value.slice(0, 3);
    }
});
</script>

                

        <div class="row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="nama" class="col-sm-3 control-label">Nama Barang:</label>
        <div class="col-sm-9">
            <?php if($no == null || $no == "") { ?>
                <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="Masukan Nama Barang" maxlength="50" required>
            <?php } else { ?>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Masukan Nama Barang" maxlength="50" required readonly>
            <?php } ?>
        </div>
    </div>
</div>


        <div class="row">
           <div class="form-group col-md-6 col-xs-12" >
                  <label for="nama" class="col-sm-3 control-label">Stok Aset :</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="sisa" name="sisa" placeholder="Masukan jumlah stock" value="<?php echo $sisa; ?>" maxlength="50">
                  </div>
                </div>
        </div>

        <div class="row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="kategori" class="col-sm-3 control-label">Kategori:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="kategori" value="IT" readonly>
        </div>
    </div>
</div>



         <div class="row">
          
                  <div class="form-group col-md-6 col-xs-12">
            <label for="merek" class="col-sm-3 control-label">Merek:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $brand; ?>" placeholder="Masukkan Merek" required>
            </div>
        </div>
</div>

<div class="row">
          
                  <div class="form-group col-md-6 col-xs-12">
            <label for="merek" class="col-sm-3 control-label">Jenis:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $jenis; ?>" placeholder="Masukkan Jenis" required>
            </div>
        </div>
</div>
          <div class="row">
                        <div class="form-group col-md-6 col-xs-12" >
                          <label for="kode" class="col-sm-3 control-label">Stok Minimal di Workshop :</label>
                          <div class="col-sm-9">
                           <?php  if($no == null || $no ==""){ ?>
                            <input type="text" class="form-control" name="stokmin" value="1" required>
                          <?php }else{ ?>
                     <input type="text" class="form-control" name="stokmin" value="<?php echo $minstok; ?>"  required readonly>
                  <?php } ?>
                  </div>
                        </div>
                </div>


        <div class="row">
           <div class="form-group col-md-6 col-xs-12" >
                  <label for="keterangan" class="col-sm-3 control-label">Keterangan:</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" rows="3" id="keterangan" name="keterangan" maxlength="255" placeholder="Masukan Keterangan" required><?php echo $keterangan; ?></textarea>
                   </div>
                </div>
        </div>
       


      <input type="hidden" class="form-control" id="insert" name="insert" value="<?php echo $insert;?>" maxlength="1" >


              </div>
              <!-- /.box-body -->
              <div class="box-footer" >

                  <a href="barang_it" class="btn btn-danger pull-left btn-flat" > Batal</a>
                   &nbsp;
                <button type="submit" class="btn btn-default pull-center btn-flat" name="simpan" onclick="document.getElementById('Myform').submit();" ><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>


              </div>
              <!-- /.box-footer -->


 </form>
</div>
<?php


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = mysqli_real_escape_string($conn, $_POST["kode"]);
    $sku = mysqli_real_escape_string($conn, $_POST["sku"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
    $sisa = mysqli_real_escape_string($conn, $_POST["sisa"]);
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $jenis = mysqli_real_escape_string($conn, $_POST["jenis"]);
    $min = mysqli_real_escape_string($conn, $_POST["stokmin"]);
    $kategori = mysqli_real_escape_string($conn, $_POST["kategori"]);
    $insert = ($_POST["insert"]);

    $sql = "SELECT * FROM $tabeldatabase WHERE kode='$kode'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') {
            $sql1 = "UPDATE $tabeldatabase SET sku='$sku', nama='$nama', kategori='$kategori', stokmin='$min', brand='$brand', keterangan='$keterangan', sisa='$sisa', jenis='$jenis' WHERE kode='$kode'";
            $updatean = mysqli_query($conn, $sql1);
            echo "<script>alert('Berhasil, Data barang telah diupdate!');</script>";
            echo "<script>window.location = '$forwardpage';</script>";
        } else {
            echo "<script>alert('Gagal, Data gagal diupdate!');</script>";
            echo "<script>window.location = '$forwardpage';</script>";
        }
    } else if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') {
        $sql2 = "INSERT INTO $tabeldatabase VALUES ('$kode','$sku','$nama','$keterangan','$kategori', ' ', ' ', '$sisa', ' ','$min','$brand','$jenis')";
        if (mysqli_query($conn, $sql2)) {
            echo "<script>alert('Berhasil, Data telah disimpan!');</script>";
            echo "<script>window.location = '$forwardpage';</script>";
        } else {
            echo "<script>alert('Gagal, Data gagal disimpan!');</script>";
            echo "<script>window.location = '$forwardpage';</script>";
        }
    }
}


         ?>

<script>
function myFunction() {
    document.getElementById("Myform").submit();
}
</script>

    <!-- KONTEN BODY AKHIR -->

                                </div>
                </div>

                                <!-- /.box-body -->
                            </div>
                        </div>

<?php
} else {
?>
   <div class="callout callout-danger">
    <h4>Info</h4>
    <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa;?> ini .</b>
    </div>
    <?php
}
?>
                        <!-- ./col -->
                    </div>

                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <!-- /.Left col -->
                    </div>
                    <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php  footer(); ?>
            <div class="control-sidebar-bg"></div>
        </div>
          <!-- ./wrapper -->
<script src="dist/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy/mm/dd"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("yyyy-mm-dd", {"placeholder": "yyyy/mm/dd"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Hari Ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Akhir 7 Hari': [moment().subtract(6, 'days'), moment()],
            'Akhir 30 Hari': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Akhir Bulan': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

   $('.datepicker').datepicker({
    dateFormat: 'yyyy-mm-dd'
 });

   //Date picker 2
   $('#datepicker2').datepicker('update', new Date());

    $('#datepicker2').datepicker({
      autoclose: true
    });

   $('.datepicker2').datepicker({
    dateFormat: 'yyyy-mm-dd'
 });


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script>
function formatUang(input) {
    // Hapus semua karakter selain angka dan titik
    var value = input.value.replace(/[^0-9.]/g, '');
    input.value = value;
}
</script>
</body>
</html>
