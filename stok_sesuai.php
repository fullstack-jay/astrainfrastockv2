<!DOCTYPE html>

 <style>
       img {
            display: block;
            margin: 10px;
            border: 1px solid black;
        }
  </style>

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
$halaman = "stok_sesuai"; // halaman
$dataapa = "Penyesuaian Stok Aset"; // data
$tabeldatabase = "barang"; // tabel database
$chmod = $chmenu8; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
$search = $_POST['search'];
$insert = $_POST['insert'];

 function autoNumber(){
  global $forward;
  $query = "SELECT MAX(RIGHT(kode, 4)) as max_id FROM $forward ORDER BY kode";
  $result = mysql_query($query);
  $data = mysql_fetch_array($result);
  $id_max = $data['max_id'];
  $sort_num = (int) substr($id_max, 1, 4);
  $sort_num++;
  $new_code = sprintf("%04s", $sort_num);
  return $new_code;
 }
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


       <!-- BOX INFORMASI -->
    <?php
  if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'pic') {
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

    $kode=$nama=$asetkeluar=$asetmasuk=$sisa="";
    $no = $_GET["no"];
    $insert = '1';



    if(($no != null || $no != "") && ($chmod >= 3 || $_SESSION['jabatan'] == 'admin')){

         $sql="select * from $tabeldatabase where no='$no'";
                  $hasil2 = mysqli_query($conn,$sql);


                  while ($fill = mysqli_fetch_assoc($hasil2)){


          $kode = $fill["kode"];
          $nama = $fill["nama"];
          $asetkeluar = $fill["asetkeluar"];
          $asetmasuk= $fill["asetmasuk"];
          $sisa = $fill["sisa"];
          $insert = '3';
    }
    }
    ?>

  <div id="main">
   <div class="container-fluid">

                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="Myform">
              <div class="box-body">

              <div class="row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="kode" class="col-sm-3 control-label">Pilih Aset:</label>
        <div class="col-sm-9">
            <select class="form-control select2" style="width: 100%;" name="kode" id="kode">
                <option></option>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM barang");
                while ($row = mysqli_fetch_assoc($sql)) {
                    $selected = ($kode == $row['kode']) ? 'selected' : '';
                    echo "<option value='" . $row['kode'] . "' nama='" . $row['nama'] . "' asetkeluar='" . $row['asetkeluar'] . "' asetmasuk='" . $row['asetmasuk'] . "' sisa='" . $row['sisa'] . "' sku='" . $row['sku'] . "' $selected>" . $row['sku'] . " | " . $row['nama'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>

        <div class="row">
           <div class="form-group col-md-6 col-xs-12" >
                  <label for="nama" class="col-sm-3 control-label">Nama Aset:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" maxlength="100" readonly>
                  </div>
                </div>
        </div>

      <div class="row">
    <div class="form-group col-md-6 col-xs-12">
        <label for="jumlah_aset" class="col-sm-3 control-label">Jumlah Aset:</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="jumlah_aset" name="jumlah_aset" value="<?php echo $jumlah_aset; ?>" placeholder="Masukan Jumlah Aset" maxlength="50" onkeyup="sum();">
        </div>
    </div>
</div>

        <div class="row">
           <div class="form-group col-md-6 col-xs-12" >
                  <label for="sisa" class="col-sm-3 control-label">Sisa Aset :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="sisa" name="sisa" value="<?php echo $sisa; ?>" maxlength="50" readonly>
                  </div>
                </div>
        </div>

     <div class="row">
            <div class="form-group col-md-6 col-xs-12">
                <label for="upload" class="col-sm-3 control-label">Gambar Aset:</label>
                <div class="col-sm-9">
                    <input type="file" id="upload" name="image_data" accept="image/*">
                    <br>
                    <img id="preview" src="#" alt="Preview Gambar" style="display: none; max-width: 100%; height: auto; margin-top: 10px;">
                </div>
            </div>
        </div>

        <!-- Input tersembunyi untuk menyimpan path file yang diunggah -->
    <input type="hidden" id="uploaded_image_path" name="uploaded_image_path">
    <script>
         $("#kode").on("change", function() {
          var sisa = $("#kode option:selected").attr("sisa");

          $("#sisa").val(sisa);
      });

      $(document).ready(function() {
    $("#kode").on("change", function() {
        var nama = $("#kode option:selected").attr("nama");
        $("#nama").val(nama);
    });
});
    function sum() {
        var asetmasuk= parseFloat(document.getElementById('asetmasuk').value) || 0;
        var asetkeluar = parseFloat(document.getElementById('asetkeluar').value) || 0;
        var sisaAwal = parseFloat(document.getElementById('sisa').value) || 0;

        var sisaBaru = sisaAwal + asetmasuk - asetkeluar;
        document.getElementById('sisa').value = sisaBaru;
    }
</script>     

 <script>
    document.getElementById('upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.src = e.target.result;
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    const maxWidth = 800;
                    const maxHeight = 800;
                    let width = img.width;
                    let height = img.height;

                    if (width > height) {
                        if (width > maxWidth) {
                            height = Math.round((height * maxWidth) / width);
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            width = Math.round((width * maxHeight) / height);
                            height = maxHeight;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob(function(blob) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const preview = document.getElementById('preview');
                            preview.src = event.target.result;
                            preview.style.display = 'block';

                            const formData = new FormData();
                            formData.append('image_data', blob, 'image.jpg');

                            // Upload the image to the server
                            fetch('upload.php', {
                                method: 'POST',
                                body: formData
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('uploaded_image_path').value = data.file_path;
                                    alert('Gambar berhasil diunggah');
                                } else {
                                    alert('Gagal mengunggah gambar');
                                }
                            });
                        };
                        reader.readAsDataURL(blob);
                    }, 'image/jpeg', 0.8);
                };
            };
            reader.readAsDataURL(file);
        }
    });
</script>

      <input type="hidden" class="form-control" id="insert" name="insert" value="<?php echo $insert;?>" maxlength="1" >
              </div>
              <!-- /.box-body -->
<div class="box-footer" style="margin-top: 10px;">
    <button type="submit" class="btn btn-success btn-flat" name="masuk" onclick="document.getElementById('Myform').submit();" style="margin-right: 10px;"><span class="glyphicon glyphicon-log-in"></span> Aset Masuk</button>
    <button type="submit" class="btn btn-danger btn-flat" name="keluar" onclick="document.getElementById('Myform').submit();" style="margin-left: 10px;"><span class="glyphicon glyphicon-log-out"></span> Aset Keluar</button>
</div>
              <!-- /.box-footer -->
 </form>
</div>


 <?php
session_start(); // Mulai sesi di awal script

// Pastikan pengguna sudah login
if (!isset($_SESSION['nama'])) {
    die("Anda harus login untuk melakukan operasi ini.");
}

$namalengkap = $_SESSION['nama'];

if(isset($_POST["masuk"])) {
    $kode = mysqli_real_escape_string($conn, $_POST["kode"]);
    $jumlahAsetBaru = mysqli_real_escape_string($conn, $_POST["jumlah_aset"]);
    $imageDataPath = mysqli_real_escape_string($conn, $_POST["uploaded_image_path"]);

    // Query untuk mendapatkan data awal dari database
    $sql = "SELECT nama, asetmasuk, asetkeluar, sisa, stokmin, kategori, brand, jenis FROM barang WHERE kode='$kode'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $asetmasukLama = $row['asetmasuk'];
        $asetkeluarLama = $row['asetkeluar'];
        $sisaAwal = $row['sisa'];
        $stokmin = $row['stokmin'];
        $kategori = $row['kategori'];
        $namabarang = $row['nama'];
        $brand = $row['brand'];
        $jenis = $row['jenis'];
        
        // Hitung sisa baru setelah penyesuaian
        $sisaBaru = $sisaAwal + $jumlahAsetBaru;

        // Periksa apakah stok baru setelah penyesuaian kurang dari stokmin
        if ($sisaBaru < $stokmin) {
            echo "<script>alert('Stok setelah penyesuaian kurang dari stok minimum!');</script>";
        } else {
            // Lanjutkan dengan proses penyimpanan data
            $sqlUpdate = "UPDATE barang SET asetmasuk=asetmasuk+'$jumlahAsetBaru', sisa='$sisaBaru' WHERE kode='$kode'";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);

            if ($resultUpdate) {
                // Masukkan ke tabel transaksiaset
                $timestamp = date('Y-m-d H:i:s');
                $sqlInsertTransaksi = "INSERT INTO transaksiaset (nama_lengkap, nama_barang, kategori, brand, jenis, asetmasuk, asetkeluar, sisa, timestamp, image_data) 
                                       VALUES ('$namalengkap', '$namabarang','$kategori', '$brand', '$jenis', '$jumlahAsetBaru', 0, '$sisaBaru','$timestamp', '$imageDataPath')";
                mysqli_query($conn, $sqlInsertTransaksi);
                echo "<script>alert('Berhasil, Data telah disimpan!');</script>";
                echo "<script>window.location = 'stok_sesuai';</script>";
            } else {
                echo "<script>alert('Gagal, Data gagal disimpan!');</script>";
            }
        }
    } else {
        echo "<script>alert('Gagal mendapatkan data stok awal dan stok minimum!');</script>";
    }
}



if(isset($_POST["keluar"])) {
    $kode = mysqli_real_escape_string($conn, $_POST["kode"]);
    $jumlahAsetBaru = mysqli_real_escape_string($conn, $_POST["jumlah_aset"]);
    $imageDataPath = mysqli_real_escape_string($conn, $_POST["uploaded_image_path"]);

    // Query untuk mendapatkan data awal dari database
    $sql = "SELECT nama, asetmasuk, asetkeluar, sisa, stokmin, kategori, brand, jenis, sisa FROM barang WHERE kode='$kode'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $asetmasukLama = $row['asetmasuk'];
        $asetkeluarLama = $row['asetkeluar'];
        $sisaAwal = $row['sisa'];
        $stokmin = $row['stokmin'];
        $kategori = $row['kategori'];
        $namabarang = $row['nama'];
        $brand = $row['brand'];
        $jenis = $row['jenis'];
        
        // Hitung sisa baru setelah penyesuaian
        $sisaBaru = $sisaAwal - $jumlahAsetBaru;

        // Periksa apakah stok baru setelah penyesuaian kurang dari stokmin
        if ($sisaBaru < $stokmin) {
            echo "<script>alert('Stok setelah penyesuaian kurang dari stok minimum!');</script>";
        } else {
            // Lanjutkan dengan proses penyimpanan data
            $sqlUpdate = "UPDATE barang SET asetkeluar=asetkeluar+'$jumlahAsetBaru', sisa='$sisaBaru' WHERE kode='$kode'";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);

             if ($resultUpdate) {
                $timestamp = date('Y-m-d H:i:s');
                $sqlInsertTransaksi = "INSERT INTO transaksiaset (nama_lengkap, nama_barang, kategori, brand, jenis, asetmasuk, asetkeluar, sisa, timestamp, image_data) 
                                       VALUES ('$namalengkap', '$namabarang','$kategori', '$brand', '$jenis', '$jumlahAsetBaru', 0, '$sisaBaru','$timestamp', '$imageDataPath')";
                mysqli_query($conn, $sqlInsertTransaksi);
                echo "<script>alert('Berhasil, Data telah disimpan!');</script>";
                echo "<script>window.location = 'stok_sesuai';</script>";
            } else {
                echo "<script>alert('Gagal, Data gagal disimpan!');</script>";
            }
        }
    } else {
        echo "<script>alert('Gagal mendapatkan data stok awal dan stok minimum!');</script>";
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
<script>
var sisaAwal = 0; // Variabel global untuk menyimpan sisa aset awal

$("#kode").on("change", function() {
    var sisa = $("#kode option:selected").attr("sisa");
     var nama = $("#kode option:selected").attr("nama");
    $("#sisa").val(sisa);
    $("#nama").val(nama);
    sisaAwal = parseFloat(sisa); // Simpan sisa aset awal ketika barang dipilih
});

function sum() {
    var asetmasuk = parseFloat(document.getElementById('asetmasuk').value) || 0;
    var asetkeluar = parseFloat(document.getElementById('asetkeluar').value) || 0;

    var sisaBaru = sisaAwal + asetmasuk - asetkeluar;
    document.getElementById('sisa').value = sisaBaru;
}
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
</body>
</html>
